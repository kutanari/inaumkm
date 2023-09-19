<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('permissions')->insert([
            [
                'name' => 'view users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'create users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'update users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'delete users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'view categories',
                'guard_name' => 'web'
            ],
            [
                'name' => 'create categories',
                'guard_name' => 'web'
            ],
            [
                'name' => 'update categories',
                'guard_name' => 'web'
            ],
            [
                'name' => 'delete categories',
                'guard_name' => 'web'
            ],
            [
                'name' => 'view products',
                'guard_name' => 'web'
            ],
            [
                'name' => 'create products',
                'guard_name' => 'web'
            ],
            [
                'name' => 'update products',
                'guard_name' => 'web'
            ],
            [
                'name' => 'delete products',
                'guard_name' => 'web'
            ],
            [
                'name' => 'view trainings',
                'guard_name' => 'web'
            ],
            [
                'name' => 'create trainings',
                'guard_name' => 'web'
            ],
            [
                'name' => 'update trainings',
                'guard_name' => 'web'
            ],
            [
                'name' => 'delete trainings',
                'guard_name' => 'web'
            ],
            [
                'name' => 'view numberofemployee',
                'guard_name' => 'web'
            ],
            [
                'name' => 'create numberofemployee',
                'guard_name' => 'web'
            ],
            [
                'name' => 'update numberofemployee',
                'guard_name' => 'web'
            ],
            [
                'name' => 'delete numberofemployee',
                'guard_name' => 'web'
            ],
            [
                'name' => 'view companies',
                'guard_name' => 'web'
            ],
            [
                'name' => 'create companies',
                'guard_name' => 'web'
            ],
            [
                'name' => 'update companies',
                'guard_name' => 'web'
            ],
            [
                'name' => 'delete companies',
                'guard_name' => 'web'
            ],
            [
                'name' => 'view product_categories',
                'guard_name' => 'web'
            ],
            [
                'name' => 'create product_categories',
                'guard_name' => 'web'
            ],
            [
                'name' => 'update product_categories',
                'guard_name' => 'web'
            ],
            [
                'name' => 'delete product_categories',
                'guard_name' => 'web'
            ],
            [
                'name' => 'list product_categories',
                'guard_name' => 'web'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
