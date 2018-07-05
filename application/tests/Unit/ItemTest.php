<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Item;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ItemTest extends TestCase
{
    public function testItemName()
    {
        $item = new Item(['name'=>'Tesla']);
        $this->assertEquals('Tesla', $item->name);
    }

    public function testSettingPrice()
    {
        $item = new Item(['name'=>'Tata', 'price' => 1]);
        $this->assertEquals(1, $item->price);
    }
}
