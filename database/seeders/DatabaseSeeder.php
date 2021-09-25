<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        //

        //Create Role
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'User']);
        Role::create(['name' => 'Venue Owner']);

        $this->call([
            PermissionSeeder::class,
        ]);
    }
}
