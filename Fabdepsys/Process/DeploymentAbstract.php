<?php

namespace Fabdepsys\Process;

abstract class DeploymentAbstract extends ProcessAbstract
{
    /**
     *
     * @var type 
     */
    protected $_params;
    /**
     *
     * @var type 
     */
    protected $_project_id;
    /**
     *
     * @var type 
     */
    protected $_project_version;
    /**
     *
     * @var type 
     */
    protected $_prcess;
    /**
     *
     * @var type 
     */
    protected $_target_servers = array();
    /**
     *
     * @var type 
     */
    protected $_roles  = array();
    /**
     *
     * @var type 
     */
    protected $_deployment_id;
    /**
     *
     * @var type 
     */
    protected $_project_version_sequence_number;
    
    /**
     * 
     * @return type
     */
    public function getDeploymentId(){
        return $this->_deployment_id;
    }
    /**
     * 
     * @param type $id
     */
    public function setDeploymentId($id){
        $this->_deployment_id = $id;
    }
    /**
     * 
     * @return type
     */
    public function getProjectVersionSequenceNumber(){
        return $this->_project_version_sequence_number;
    }
    /**
     * 
     * @param type $sequence
     */
    public function setProjectVersionSequenceNumber($sequence){
        $this->_project_version_sequence_number = $sequence;
    }
    /**
     * 
     * @return type
     */
    public function getParams(){
        return $this->_params;
    }
    /**
     * 
     * @param type $params
     */
    public function setParams($params){
        $this->_params = $params;
    }
    /**
     * 
     * @return type
     */
    public function getProjectId(){
        return $this->_project_id;
    }
    /**
     * 
     * @param type $id
     */
    public function setProjectId($id){
        $this->_project_id = $id;
    }
    /**
     * 
     * @return type
     */
    public function getProcess(){
        return $this->_process;
    }
    /**
     * 
     * @param type $process
     */
    public function setProcess($process){
        $this->_process = $process;
    }
    /**
     * 
     * @return type
     */
    public function getRoles(){
        return $this->_roles;
    }
    /**
     * 
     * @param type $roles
     */
    public function setRoles($roles){
        $this->_roles = $roles;
    }
    /**
     * 
     * @return type
     */
    public function getTargetServers(){
        return $this->_target_servers;
    }
    /**
     * 
     * @param type $servers
     */
    public function setTargetServers($servers){
        $this->_target_servers = $servers;
    }
    
   
}