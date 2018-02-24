<?php

use tajawal\Api\Service\DestinationService;

class DestinationServiceTest extends \PHPUnit\Framework\TestCase
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


    protected $destinationServiceObject;

    public function setUp()
    {
        $this->destinationServiceObject = new DestinationService('Manila');
    }

    public function testSearchDestinationService()
    {
        $this->destinationServiceObject->setHotels($this->data);
        $this->destinationServiceObject->search();
        $this->assertEquals($this->data, $this->destinationServiceObject->search());
    }

}
