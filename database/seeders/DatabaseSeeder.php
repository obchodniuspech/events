<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'name' => 'Test Test',
            'email' => 'test@example.com',
            'password' => Hash::make('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1,
        ]);

        Permission::create([
            'id' => 1,
            'name' => 'Dashboard zobrazení',
            'guard_name' => 'web',
            'created_at' => '2023-11-04 12:54:58',
            'updated_at' => '2023-11-04 12:54:58',
        ]);

        Permission::create([
            'id' => 2,
            'name' => 'Správa uživatelů',
            'guard_name' => 'web',
            'created_at' => '2023-11-04 12:54:58',
            'updated_at' => '2023-11-04 12:54:58',
        ]);

        Permission::create([
            'id' => 3,
            'name' => 'Uživatelské role a oprávnění',
            'guard_name' => 'web',
            'created_at' => '2023-11-04 12:54:58',
            'updated_at' => '2023-11-04 12:54:58',
        ]);

        Permission::create([
            'id' => 4,
            'name' => 'Zobrazit Log aktivity',
            'guard_name' => 'web',
            'created_at' => '2023-05-03 12:29:58',
            'updated_at' => '2023-05-03 12:29:58',
        ]);

        Permission::create([
            'id' => 5,
            'name' => 'Vytvářet/upravovat události',
            'guard_name' => 'web',
            'created_at' => '2023-05-03 12:29:58',
            'updated_at' => '2023-05-03 12:29:58',
        ]);

        Permission::create([
            'id' => 6,
            'name' => 'Mazat události',
            'guard_name' => 'web',
            'created_at' => '2023-05-03 12:29:58',
            'updated_at' => '2023-05-03 12:29:58',
        ]);

        Permission::create([
            'id' => 7,
            'name' => 'Zobrazit události',
            'guard_name' => 'web',
            'created_at' => '2023-05-03 12:29:58',
            'updated_at' => '2023-05-03 12:29:58',
        ]);

        // user roles
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Super Admin',
            'guard_name' => 'web',
            'created_at' => '2023-05-03 12:00:53',
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Moderátor',
            'guard_name' => 'web',
            'created_at' => '2023-05-03 12:00:53',
        ]);

        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Čtenář',
            'guard_name' => 'web',
            'created_at' => '2023-05-03 12:00:53',
        ]);

        DB::table('model_has_roles')->insert([
            'model_type' => 'App\Models\User',
            'role_id' => 1,
            'model_id' => 1,
        ]);

        $this->call([
            EventsSeeder::class,
            EventsCategoriesSeeder::class
        ]);
    }
}
