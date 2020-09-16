<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()->count(10)->state(new Sequence(
            ['parent_id' => null],
            ['parent_id' => 1],
            ['parent_id' => 2]
        ))->create();
    }
}
