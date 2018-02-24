<?php

use tajawal\Api\Service\SearchDateService;

class DateServiceTest extends \PHPUnit\Framework\TestCase
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


    protected $dataServiceObject;

    public function setUp()
    {
        $this->dataServiceObject = new SearchDateService('22-10-2020','22-11-2020');
    }

    public function testSearchDateService()
    {
        $this->dataServiceObject->setHotels($this->data);
        $this->dataServiceObject->search();
        $this->assertEquals($this->data, $this->dataServiceObject->search());
    }


}
