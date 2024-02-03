<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        \App\Models\Reply::factory(50)->create();
    }
}
