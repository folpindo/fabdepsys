<?php

namespace Fabdepsys\Project\Service\Client;

class Client
{
    protected $_request;
    protected $_response;
    
    public function __construct() {
        
    }
    
    public function setRequest($request){
        $this->_request = $request;
    }
    public function getRequest(){
        return $this->_request;
    }
    public function setResponse($response){
        $this->_response = $response;
    }
    
    public function call($request){
        $this->setRequest($request);
        $request = $this->getRequest();
        $api = new Api();
        $api->init();
        return $api->setRequest($request);
    }
}