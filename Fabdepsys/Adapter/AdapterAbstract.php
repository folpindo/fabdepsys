<?php

namespace Fabdepsys\Adapter;

abstract class AdapterAbstract {

    abstract function init();

    abstract function create($data, $options = array());

    abstract function read($criteria, $fields = array());

    abstract function update($criteria, $data, $options = array());

    abstract function delete($criteria, $options = array());
    
}
