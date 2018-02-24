<?php

use tajawal\Api\Service\SearchPriceService;

class PriceServiceTest extends \PHPUnit\Framework\TestCase
{

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


    protected $priceServiceObject;

    public function setUp()
    {
        $this->priceServiceObject = new SearchPriceService(10,100);
    }

    public function testSearchPriceService()
    {
        $this->priceServiceObject->setHotels($this->data);
        $this->priceServiceObject->search();
        $this->assertEquals($this->data, $this->priceServiceObject->search());
    }

}
