<?php
/**
 * Created by PhpStorm.
 * User: abanob
 * Date: 2/23/2018
 * Time: 7:00 PM
 */

namespace tajawal\Api\ServiceFactory;
/**
 * Class FactoryMethod
 * @package Src\ServiceFactory
 */
abstract class FactoryMethod
{
    /**
     * @param string $path
     * @param string $method
     * @param array $headers
     * @param $data
     * @return mixed
     */
    abstract protected function createRequest(string $path, string $method, array $headers, $data);

    /**
     * @param string $path
     * @param string $method
     * @param array $headers
     * @param $data
     * @return mixed
     */
    public function create(string $path, string $method, array $headers, $data)
    {
        $object = $this->createRequest($path, $method, $headers, $data);
        return $object;
    }

}