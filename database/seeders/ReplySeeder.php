<?php

namespace Database\Seeders;

use App\Models\Reply;
use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Reply::factory(50)->create();
    }
}
