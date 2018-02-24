<?php

use tajawal\Sort\sort\NameSort;
use tajawal\Sort\sort\PriceSort;

class SortMethodTest extends \PHPUnit\Framework\TestCase
{
    protected $nameSortObject;
    protected $priceSortObject;
    protected $data = [
        [
            'name' => 'test',
            'price' => 79,
            'city' => 'Manila',
            'availability' => [
                ['from' => '22-10-2020',
                    'to' => '22-11-2020'],
                ['from' => '22-10-2020',
                    'to' => '22-11-2020'],
                ['from' => '22-10-2020',
                    'to' => '22-11-2020']
            ]
        ]
    ];



    public function setUp()
    {
        $this->nameSortObject = new NameSort($this->data);
        $this->priceSortObject = new NameSort($this->data);
    }

    public function testNameSort()
    {
        $this->assertEquals($this->data, $this->nameSortObject->sort());
    }

    public function testPriceSort()
    {
        $this->assertEquals($this->data, $this->priceSortObject->sort());
    }
}
