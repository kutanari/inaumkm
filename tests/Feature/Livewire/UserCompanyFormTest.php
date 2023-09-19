<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\UserCompanyForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserCompanyFormTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(UserCompanyForm::class);

        $component->assertStatus(200);
    }
}
