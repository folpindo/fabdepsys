<?php

namespace Fabdepsys\Adapter;

class Mongodb extends AdapterAbstract
{
    protected $_params;
    protected $_client;
    protected $_mongo_collection;

    public function init() {
        $client = new \MongoClient();
        $mdb = $client->selectDb('testing');
        $mcol = $mdb->selectCollection('testcoll');
        $this->_mongo_collection = $mcol;
    }

    public function create($data, $options = array()) {
        $this->_mongo_collection->insert($data);
    }

    public function read($criteria, $fields = array()) {
        return $this->_mongo_collection->find($criteria, $fields);
    }

    public function update($criteria, $data, $options = array()) {
        return $this->_mongo_collection->update($criteria, $data, $options);
    }

    public function delete($criteria, $options = array()) {
        return $this->_mongo_collection->remove($criteria, $options);
    }

}
