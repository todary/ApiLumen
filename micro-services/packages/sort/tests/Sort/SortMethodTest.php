<?php

use tajawal\Sort\Sort\ArraySort;

class SortMethodTest extends \PHPUnit\Framework\TestCase
{
    protected $nameSortObject;
    protected $arraySortObject;
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
        $this->arraySortObject = new ArraySort;
    }

    public function testNameSort()
    {
        $this->assertEquals($this->data, $this->arraySortObject->sort('name',$this->data,1));
    }

    public function testPriceSort()
    {
        $this->assertEquals($this->data, $this->arraySortObject->sort('price',$this->data,0));
    }
}
