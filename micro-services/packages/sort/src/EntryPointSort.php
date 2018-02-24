<?php

namespace tajawal\Sort;

use tajawal\Sort\Sort\ArraySort;


class EntryPointSort implements EnteryPointInterface
{

    public function processRequest(string $field, array $data, $order = 1)
    {

        $requestObject = new ArraySort();
        return $requestObject->sort($field,$data,$order);
    }
}
