<?php


use  tajawal\Api\ServiceFactory\ServiceFactory;
use tajawal\Api\Service\SearchDateService;
use tajawal\Api\Service\SearchDestinationService;
use tajawal\Api\Service\SearchNameService;
use tajawal\Api\Service\SearchPriceService;

class ServiceFactoryTest extends \PHPUnit\Framework\TestCase
{
    protected $nameServiceObject;
    protected $destinationServiceObject;
    protected $priceServiceObject;
    protected $dateServiceObject;

    public function setUp()
    {
        $object = new ServiceFactory();
        $this->nameServiceObject = $object->create('tajawal/name', '', [], ['name' => '']);
        $this->destinationServiceObject = $object->create('tajawal/destination', '', [], ['city' => '']);
        $this->priceServiceObject = $object->create('tajawal/price', '', [], ['min' => 0, 'max' => 0]);
        $this->dateServiceObject = $object->create('tajawal/date', '', [], ['from' => '10-10-2020', 'to' => '15-10-2020']);
    }

    public function providerMethod()
    {
        $object = new ServiceFactory();

        return [
            [
                new SearchNameService( '')
                , $object->create('tajawal/name', '', [], ['name' => ''])
            ],
            [
                new SearchDestinationService( '')
                , $object->create('tajawal/destination', '', [], ['city' => ''])
            ],
            [
                new SearchPriceService(0, 0)
                , $object->create('tajawal/price', '', [], ['min' => 0, 'max' => 0])
            ],
            [
                new SearchDateService( '10-10-2020', '15-10-2020')
                , $object->create('tajawal/date', '', [], ['from' => '10-10-2020', 'to' => '15-10-2020'])
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
