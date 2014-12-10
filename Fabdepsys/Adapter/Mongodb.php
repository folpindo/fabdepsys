<?php

namespace Fabdepsys\Adapter;

class Mongodb extends AdapterAbstract {

    protected $_params;
    protected $_client;
    protected $_mongo_collection;

    public function init() {
        $client = new \MongoClient();
        $mdb = $client->selectDb($this->_params['database']);
        $mcol = $mdb->selectCollection($this->_params['collection']);
        $this->_mongo_collection = $mcol;
    }

    public function create($data, $options = array()) {
        return $this->_mongo_collection->insert($data);
    }

    public function read($criteria, $fields = array(), $options = array()) {
        if (isset($criteria['id'])) {
            $criteria['_id'] = $this->getMongoId($criteria['id']);
            unset($criteria['id']);
        }
        
        $mongoCursor = $this->_mongo_collection->find($criteria, $fields);
        
        if(!empty($options)){
            if(isset($options['limit'])){
                $mongoCursor->limit(intval($options['limit']));
            }
            if(isset($options['skip'])){
                $mongoCursor->skip(intval($options['skip']));
            }
        }
        return $mongoCursor;
    }
    
    public function count($criteria){
        $mongoCursor = $this->read($criteria);
        return $mongoCursor->count();
    }

    public function update($criteria, $data, $options = array()) {
        if (isset($criteria['id'])) {
            $criteria['_id'] = $this->getMongoId($criteria['id']);
            unset($criteria['id']);
        }
        return $this->_mongo_collection->update($criteria, $data, $options);
    }

    public function delete($criteria, $options = array()) {     
        if (isset($criteria['id'])) {     
            $id =$this->getMongoId($criteria['id']);
            $criteria['_id'] = $id;
            unset($criteria['id']);
        }
        return $this->_mongo_collection->remove($criteria, $options);
    }

    public function setParams($params) {
        $this->_params = $params;
    }

    public function getMongoCollection() {
        return $this->_mongo_collection;
    }
    
    protected function getMongoId($id){
        $id = new \MongoId($id);
        return $id;
    }

}
