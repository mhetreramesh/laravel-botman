<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    public function testCategoryName()
    {
        $category = new Category(['name'=>'Tesla']);
        $this->assertEquals('Tesla', $category->name);
    }

    public function testSettingParentCategory()
    {
        $category = new Category(['name'=>'Tata', 'parent_id' => 1]);
        $this->assertEquals(1, $category->parent_id);
    }
}
