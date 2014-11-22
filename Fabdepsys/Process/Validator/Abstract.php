<?php

namespace Fabdepsys\Process\Validator;

/**
 * Abstract for process input validators.
 * 
 */
abstract class ValidatorAbstract {
    /**
     *
     * @var type 
     */
    protected $_params;
    /**
     *
     * @var type 
     */
    protected $_defaults = array(
        'project_id',
        'remote_address',
        'process',
        'status',
        'details'
    );
    /**
     *
     * @var type 
     */
    protected $_process_defaults;
    /**
     *
     * @var type 
     */
    protected $_specific;

    /**
     * 
     * @param type $params
     */
    public function setParams($params) {
        $this->_params = $params;
        if(isset($params['details'])){
            $this->_specific = $params['details'];
        }
    }
    /**
     * 
     * @param type $defaults
     */
    public function setDefaults($defaults){
        $this->_defaults = $defaults;
    }
    /**
     * 
     * @param type $processDefaults
     */
    public function setProcessDefaults($processDefaults){
        $this->_process_defaults = $processDefaults;
    }

    /**
     * 
     * @return type
     */
    public function validate() {
        return (isset($this->_params)) ? $this->_validate() : false;
    }

    /**
     * 
     * @return type
     */
    protected function _validate(){
        return ($this->_checkDefaults() && $this->_checkProcessDefaults());
    }
    /**
     * 
     * @return type
     */
    protected function _checkDefaults(){
        return $this->_fieldChecker($this->_defaults, $this->_params);
    }
    /**
     * 
     * @return boolean
     */
    protected function _checkProcessDefaults(){
        if(empty($this->_process_defaults)){
            return true;
        }
        return $this->_fieldChecker($this->_process_defaults, $this->_params);
    }
    /**
     * 
     * @param type $fields
     * @param type $params
     * @return boolean
     */
    protected function _fieldChecker($fields, $params){
        $valid  = true;
        foreach($fields as $param){
            if(!isset($params[$param])){
                $valid = false;
            }
        }
        return $valid;
    }
    
}
