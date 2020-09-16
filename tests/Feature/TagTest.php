<?php

namespace Tests\Feature;

use App\Models\Tag;
use Tests\TestCase;

class TagTest extends TestCase
{

    public function testCreateTag()
    {
        $tag = Tag::factory()->create();
        $this->assertDatabaseHas('tags', [
            'name' => $tag->name,
            'slug' => $tag->slug,
        ]);
    }
}
