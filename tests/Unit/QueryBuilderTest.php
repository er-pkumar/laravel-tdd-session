<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Components\DALComponent;


class QueryBuilderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSelectAll()
    {
        $_dal = new DALComponent;
        $this->assertEquals('SELECT * from products', $_dal->select('products'));
    }
    
    public function testSelectColumn()
    {
        $_dal = new DALComponent;
        $this->assertEquals('SELECT id, name from products', $_dal->select('products', ['id', 'name']));
    }

    public function testOrderBy()
    {
        $_dal = new DALComponent;
        $this->assertEquals('SELECT id, name from products ORDER BY id desc', $_dal->select('products', ['id', 'name'], ['id', 'desc']));
    }

    public function testSelectAllOrderByColumns()
    {
        $_dal = new DALComponent;
        $this->assertEquals('SELECT id, name from products ORDER BY name asc, category asc',
            $_dal->select('products', ['id', 'name'], [['name', 'asc'], ['category', 'asc']])
        );
    }

    public function testSelectWithLimit()
    {
        $_dal = new DALComponent;
        $this->assertEquals('SELECT * from products limit 10', $_dal->select('products', [], [], 10));
    }
    
    public function testSelectWithLimitOffset()
    {
        $_dal = new DALComponent;
        $this->assertEquals('SELECT * from products limit 10 offset 1', $_dal->select('products', [], [], 10, 1));
    }
}
