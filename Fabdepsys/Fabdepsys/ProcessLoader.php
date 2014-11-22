<?php

namespace Fabdepsys;

use \Fabdepsys\Process\Validator\Loader as ValidatorLoader;

class ProcessLoader {

    /**
     *
     * @var type 
     */
    protected $_validator_loader;
    /**
     *
     * @var type 
     */
    protected $_process_validator;
    /**
     *
     * @var type 
     */
    protected $_params;
    /**
     *
     * @var type 
     */
    protected $_process;

    public function __construct() {
        
    }

    /**
     * 
     * @param type $params
     */
    public function setParams($params) {
        $this->_params = $params;
    }

    /**
     * 
     * @return type
     */
    public function getParams() {
        return $this->_params;
    }

    /**
     * 
     * @return type
     */
    public function getValidatorLoader() {
        return $this->_validator_loader;
    }
    
    /**
     * 
     * @param type $validatorLoader
     */
    public function setValidatorLoader($validatorLoader) {
        $this->_validator_loader = $validatorLoader;
    }

    /**
     * 
     * @return type
     */
    public function getValidator() {
        $this->_process_validator = $this->_validator_loader->getProcessValidator($this->_params);
        return $this->_process_validator;
    }

    /**
     * Load process validator.
     * 
     */
    public function initValidatorLoader() {
        $this->_validator_loader = new ValidatorLoader();
    }

    /**
     * 
     * @return type
     */
    public function isInputValid() {
        return $this->_process_validator->valid();
    }

//    public function setValidatorParams($params){
//        $this->_process_validator->setParams($params);
//    }
    
    /**
     * 
     * @return type
     */
    public function getProcess() {
        return ($this->isInputValid()) ? $this->loadProcess() : false;
    }

    /**
     * 
     * @return type
     */
    public function loadProcess() {
        if(empty($this->_process)){
            $this->_load();
        }
        return $this->_process;
    }

    /**
     * Load process
     * 
     */
    protected function _load() {
        $process = $this->_params['process'];
        $processArr = array_keys(array_flip(explode('_', $process)));
        $process = '';
        foreach ($processArr as $p) {
            $process .= ucfirst(strtolower($p));
        }
        $process = '\\Fabdepsys\\Process\\' . $process;
        $this->_process = new $process();
    }

}
