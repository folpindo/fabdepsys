<?php

namespace Fabdepsys\Adapter;

class RestClient extends AdapterAbstract {

    protected $_params;
    protected $_base_url;
    protected $_ch;
    protected $_url;
    protected $_service_method;
    protected $_service_version;
    protected $_rest_method;
    protected $_service_name;

    /**
     * Initialize call base from the parameter set.
     * 
     */
    public function init() {
        $this->_initUrl();
        $this->_initCurl();
    }

    protected function _initUrl() {
        $params = $this->_params;
        $this->_base_url = $params['base_url'];
        $this->_service_name = $params['service_name'];
        $this->_service_method = $params['service_method'];
        $this->_service_version = $params['service_version'];
        $this->_url = $this->_base_url
                . '/' . $this->_service_version
                . '/' . $this->_service_name
                . '/' . $this->_service_method;
    }

    protected function _initData($data) {
        if (isset($data)) {
            $this->_data = $data;
        } else {
            if (isset($this->_params['data'])) {
                $this->_data = $this->_params['data'];
            }
        }
    }

    protected function _initCurl() {
        $this->_ch = curl_init();
    }

    public function post() {
        curl_setopt($this->_ch, CURLOPT_URL, $this->_url);
        curl_setopt($this->_ch, CURLOPT_POST, 1);
        $data = http_build_query($this->_data);
        curl_setopt($this->_ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($this->_ch);
//        var_dump($response);
        curl_close($this->_ch);
        return $response;
    }

    protected function _encodePostData($criteria, $fields = array()) {
        return array(
            'data' => json_encode(
                    array(
                        'criteria' => $criteria,
                        'fields' => $fields
                    )
            )
        );
    }

    public function read($criteria, $fields = array()) {
        $data = $this->_encodePostData($criteria, $fields);
        $this->_initData($data);
        $this->init();
//        var_dump($this);
        $response = $this->post();
//        var_dump($response);
        return $response;
    }

    /**
     * 
     * @param type $data
     * @param type $options
     */
    public function create($data, $options = array()) {
//        $data = $this->_encodePostData($criteria, $fields);
//        $this->_initData($data);
//        $this->init();
//        return $this->post();
    }

    public function update($criteria, $data, $options = array()) {
        
    }

    public function delete($criteria, $options = array()) {
        
    }

    public function setParams($params) {
        $this->_params = $params;
    }

    public function getParams() {
        return $this->_params;
    }

    public function setData($data) {
        $this->_data = $data;
    }

    public function getData() {
        return $this->_data;
    }

    public function setServiceVersion($version) {
        $this->_version = $version;
    }

    public function setServiceMethod($method) {
        $this->_service_method = $method;
    }

    public function setServiceName($name) {
        $this->_service_name = $name;
    }

    public function setServiceAction($action) {
        $this->_service_action = $action;
    }

    public function setBaseUrl($baseUrl) {
        $this->_base_url = $baseUrl;
    }

}
