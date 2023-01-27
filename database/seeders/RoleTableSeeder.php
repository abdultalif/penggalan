<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            'admin',
            'donatur'
        ];

        collect($role)->map(function ($name) {
            Role::query()->updateOrCreate(compact('name'), compact('name'));
        });
    }
}
