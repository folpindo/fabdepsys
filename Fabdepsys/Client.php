<?php

namespace Fabdepsys;

class Client
{
    protected $_adapter;
    protected $_params;
    protected $_json = true;
    
    public function setAdapter($adapter){
        $this->_adapter = $adapter;
    }
    public function getAdapter(){
        return $this->_adapter;
    }
    
    public function create($data, $options = array()){
        return $this->_adapter->create($data, $options = array());
    }
    public function read($criteria, $fields = array()){
        $response = $this->_adapter->read($criteria, $fields);
        if(!$this->_json){
            $response = json_decode($response,true);
        }
        $this->_response =  $response;
    }
    public function update($criteria, $data, $options = array()){
        return $this->_adapter->update($criteria, $data, $options);
    }
    public function delete($criteria, $options = array()){
        return $this->_adapter->delete($criteria, $options);
    }
    
    public function setParams($params){
        $this->_params = $params;
        $this->_adapter->setParams($params);
    }
    public function setJson($cond){
        $this->_json = $cond;
    }
    
    public function getResponse(){
        return $this->_response;
    }
    
}