<?php

namespace tajawal\Api;


use Illuminate\Http\Request;
use tajawal\Api\ServiceFactory\ServiceFactory;
use tajawal\Sort\EntryPointSort;
class EntryPoint implements EnteryPointInterface
{

    /**
     * @param string $path
     * @param string $method
     * @param array $headers
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function processRequest(string $path, string $method, array $headers, $data)
    {
        $requestObject = new ServiceFactory();
        $result = $requestObject->create($path, $method, $headers, $data);

        $hotels = file_get_contents('https://api.myjson.com/bins/tl0bp');
//        $hotels = '{"hotels":[{"name":"Media One Hotel","price":102.2,"city":"dubai","availability":[{"from":"10-10-2020","to":"15-10-2020"},{"from":"25-10-2020","to":"15-11-2020"},{"from":"10-12-2020","to":"15-12-2020"}]},{"name":"Rotana Hotel","price":80.6,"city":"cairo","availability":[{"from":"10-10-2020","to":"12-10-2020"},{"from":"25-10-2020","to":"10-11-2020"},{"from":"05-12-2020","to":"18-12-2020"}]},{"name":"Le Meridien","price":89.6,"city":"london","availability":[{"from":"01-10-2020","to":"12-10-2020"},{"from":"05-10-2020","to":"10-11-2020"},{"from":"05-12-2020","to":"28-12-2020"}]},{"name":"Golden Tulip","price":109.6,"city":"paris","availability":[{"from":"04-10-2020","to":"17-10-2020"},{"from":"16-10-2020","to":"11-11-2020"},{"from":"01-12-2020","to":"09-12-2020"}]},{"name":"Novotel Hotel","price":111,"city":"Vienna","availability":[{"from":"20-10-2020","to":"28-10-2020"},{"from":"04-11-2020","to":"20-11-2020"},{"from":"08-12-2020","to":"24-12-2020"}]},{"name":"Concorde Hotel","price":79.4,"city":"Manila","availability":[{"from":"10-10-2020","to":"19-10-2020"},{"from":"22-10-2020","to":"22-11-2020"},{"from":"03-12-2020","to":"20-12-2020"}]}]}';
        $hotels = json_decode($hotels, true);
        $hotels = $hotels['hotels']??[];
        $result->setHotels($hotels);
        $resultHotels = $result->search();

        if (isset($data['sort']) && !empty($data['sort']))
        {
            $sortEndpoint = new EntryPointSort();
            $resultHotels = $sortEndpoint ->processRequest($data['sort'], $resultHotels, $data['order']??1);
        }
        return response()->json(array_values($resultHotels));
    }
}
