<?php

/**
 * Created by PhpStorm.
 * User: todary
 * Date: 11/11/17
 * Time: 03:11 م
 */

namespace tajawal\Api;

interface  EnteryPointInterface
{
    public function processRequest(string $path, string $method, array $headers, $data);

}