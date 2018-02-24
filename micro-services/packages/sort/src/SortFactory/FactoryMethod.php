<?php

namespace tajawal\Sort\SortFactory;

abstract class FactoryMethod
{
    /**
     * @param string $type
     * @param array $data
     * @return mixed
     */
    abstract protected function createRequest(string $type, array $data);

    /**
     * @param string $type
     * @param array $data
     * @return mixed
     */
    public function create(string $type, array $data)
    {
        $objectSort = $this->createRequest($type, $data);
        return $objectSort;
    }

}