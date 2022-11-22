<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@app.com',
            'domain' => 'admin',
            'password' => bcrypt('password'),
        ]);
        $user->attachRole('admin');


        $tenant = Tenant::create([
            'name' => 'admin',
        ]);

        $tenant->domains()->create([
            'domain' =>'admin.localhost'
        ]);

        $user->tenants()->attach($tenant->id);

    }
}
