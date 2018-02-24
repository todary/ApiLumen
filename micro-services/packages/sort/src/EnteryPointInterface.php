<?php

/**
 * Created by PhpStorm.
 * User: todary
 * Date: 11/11/17
 * Time: 03:11 م
 */

namespace tajawal\Sort;

interface  EnteryPointInterface
{
    public function processRequest(string $type, array $data);

}