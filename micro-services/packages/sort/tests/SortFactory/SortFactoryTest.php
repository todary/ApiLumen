<?php

use  tajawal\Sort\SortFactory\SortFactory;

use tajawal\Sort\sort\NameSort;
use tajawal\Sort\sort\PriceSort;

class SortFactoryTest extends \PHPUnit\Framework\TestCase
{
    protected $nameSortObject;
    protected $priceSortObject;

    public function setUp()
    {
        $object = new SortFactory();
        $this->nameSortObject = $object->create('name', []);
        $this->priceSortObject = $object->create('price', []);
    }

    public function providerMethod()
    {
        $object = new SortFactory();

        return [
            [
                new NameSort( [])
                , $object->create('name', [])
            ],
            [
                new PriceSort( [])
                , $object->create('price', [])
            ]
        ];
    }

    /**
     * @dataProvider providerMethod
     */

    public function testFactory($object, $objectFactory)
    {
        $this->assertEquals($object, $objectFactory);
    }

}
