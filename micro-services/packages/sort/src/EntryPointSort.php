<?php

namespace tajawal\Sort;

use tajawal\Sort\SortFactory\SortFactory;
use tajawal\Sort\EnteryPointInterface;

class EntryPointSort implements EnteryPointInterface
{

    public function processRequest(string $type, array $data)
    {
        $requestObject = new SortFactory();
        $reslut = $requestObject->create($type, $data);
        return $reslut->sort();
    }
}
