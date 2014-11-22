<?php

namespace Fabdepsys\Project\Service;

/**
  {

  "server_name":<>,

  "role":<>,

  "project_id":<>,

  "project_name":<>,

  "package_name":<>,

  "process_stage":"build",

  "environment":"staging|production",

  "status":"started|completed|failed",

  "project_version":"1.0.0"

  }
 * 
 * generate-test [--bootstrap="..."] class [class-source] [test-class] [test-source]
 * ../vendor/bin/phpunit-skelgen generate-test Fabdepsys\\Project\\Service\\Api ../Fabdepsys/Project/Service/Api.php Fabdepsys\Project\Service\TestApi Fabdepsys/Project/Service/TestApi.test
  phpunit-skelgen 2.0.1 by Sebastian Bergmann.

  Wrote skeleton for "FabdepsysProjectServiceTestApi" to "Fabdepsys/Project/Service/TestApi.test".


 */
class Api {

    protected $_base_url;
    protected $_params;
    protected $_get_params;
    protected $_post_params;

    public function __construct() {
        
    }

    public function setRequest(Request $request) {
        $this->_request = $request;
    }

    public function getBaseUrl() {
        return $this->_base_url;
    }

    public function getGetParams() {
        return $this->_get_params;
    }

    public function setBaseUrl($baseurl) {
        $this->_base_url = $baseurl;
    }

    public function init() {
        
    }

    public function test() {
        $url = $this->getBaseUrl();
        $getParams = $this->getGetParams();
        $url = $url . '/' . $getParams;
        $url = "http://localhost/v1/Toolchain/dafdafdafd&test=a1";
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        if (!curl_errno($ch)) {
            $info = curl_getinfo($ch);
        }
        $res = json_decode($res, true);
        curl_close($ch);
        return $res;
    }

}
