<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    public function testItemsPageLoading()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testItemsPageContent()
    {
        $response = $this->get('/');

        $response->assertSee('Tradebyte');
    }

    public function testItemsPageJsonField()
    {
        $response = $this->get('/api/items');
        $response->assertStatus(500);
    }
}
