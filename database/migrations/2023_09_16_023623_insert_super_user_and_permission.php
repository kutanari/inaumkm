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
        DB::table('users')->insert([
            [
                'name' => 'name',
                'email' => 'kutanaridesain@gmail.com',
                'password' => bcrypt(env('SUPER_ADMIN'))
            ]
        ]);

        DB::table('roles')->insert([
            [
                'name' => 'super-admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'front-user',
                'guard_name' => 'web'
            ]
        ]);

        DB::table('model_has_roles')->insert([
            [
                'role_id' => '1',
                'model_type' => 'App\Models\User',
                'model_id' => '1'
            ]
        ]);

        DB::table('permissions')->insert([
            [
                'name' => 'list users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'list categories',
                'guard_name' => 'web'
            ],
            [
                'name' => 'list products',
                'guard_name' => 'web'
            ],
            [
                'name' => 'list trainings',
                'guard_name' => 'web'
            ],
            [
                'name' => 'list numberofemployees',
                'guard_name' => 'web'
            ],
            [
                'name' => 'list companies',
                'guard_name' => 'web'
            ],
            [
                'name' => 'edit company',
                'guard_name' => 'web'
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        DB::table('model_has_roles')->where('role_id', '1')->delete();
        DB::table('roles')->where('name', 'front-user')->delete();
        DB::table('roles')->where('name', 'super-admin')->delete();
        DB::table('users')->where('email', 'kutanaridesain@gmail.com')->delete();
    }
};
