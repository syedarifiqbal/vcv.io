<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::factory()->create(['name' => 'Arif Iqbal', 'email' => 'arifiqbal@outlook.com']);
        \App\Models\User::factory()->create(['name' => 'Arif Iqbal', 'email' => 'arifiqbal@outlook.com']);
        \App\Models\User::factory(20)->create();
        \App\Models\Post::factory(50)->create();
        \App\Models\Comment::factory(150)->create();
    }
}
