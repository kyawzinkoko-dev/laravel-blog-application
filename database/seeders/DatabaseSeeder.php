<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role ;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /** @var \App\Models\User $adminUser */
         $adminUser = User::factory()->create([
        'name'=>'Admin',
         'email'=>'admin@example.com',
             'password'=>bcrypt('password@')
         ]);
         $userRole = Role::create(['name'=>'admin']);
         $adminUser->assignRole($userRole);
         \App\Models\Post::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
