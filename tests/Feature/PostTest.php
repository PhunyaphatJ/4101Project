<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    #[Test]
    public function posts_must_be_created(): void
    {
        $this->assertDatabaseCount('posts', 10);
    }
}