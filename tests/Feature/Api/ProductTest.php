<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Product;

use App\Models\Company;
use App\Models\Category;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_products_list(): void
    {
        $products = Product::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.products.index'));

        $response->assertOk()->assertSee($products[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_product(): void
    {
        $data = Product::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.products.store'), $data);

        $this->assertDatabaseHas('products', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.products.update', $product),
            $data
        );

        $data['id'] = $product->id;

        $this->assertDatabaseHas('products', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson(route('api.products.destroy', $product));

        $this->assertSoftDeleted($product);

        $response->assertNoContent();
    }
}
