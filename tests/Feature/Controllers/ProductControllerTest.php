<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Product;

use App\Models\Company;
use App\Models\Category;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_products(): void
    {
        $products = Product::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('products.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.products.index')
            ->assertViewHas('products');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_product(): void
    {
        $response = $this->get(route('products.create'));

        $response->assertOk()->assertViewIs('app.products.create');
    }

    /**
     * @test
     */
    public function it_stores_the_product(): void
    {
        $data = Product::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('products.store'), $data);

        $this->assertDatabaseHas('products', $data);

        $product = Product::latest('id')->first();

        $response->assertRedirect(route('products.edit', $product));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.show', $product));

        $response
            ->assertOk()
            ->assertViewIs('app.products.show')
            ->assertViewHas('product');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.edit', $product));

        $response
            ->assertOk()
            ->assertViewIs('app.products.edit')
            ->assertViewHas('product');
    }

    /**
     * @test
     */
    public function it_updates_the_product(): void
    {
        $product = Product::factory()->create();

        $company = Company::factory()->create();
        $category = Category::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image_path' => $this->faker->text(255),
            'slug' => $this->faker->slug(),
            'company_id' => $company->id,
            'category_id' => $category->id,
        ];

        $response = $this->put(route('products.update', $product), $data);

        $data['id'] = $product->id;

        $this->assertDatabaseHas('products', $data);

        $response->assertRedirect(route('products.edit', $product));
    }

    /**
     * @test
     */
    public function it_deletes_the_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));

        $this->assertSoftDeleted($product);
    }
}
