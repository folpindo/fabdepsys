<?php

namespace Fabdepsys\Process;

class DependencyChecker
{
    protected $_project;
    protected $_stages = array(
        'build',
        'packaging',
        'staging_deployment',
        'production_deployment'
    );
    

    
    protected function evaluatePreviousStages(){}
    protected function getProjectCurrentStage(){
        $stages = array();
        return $stages;
    }
    protected function getProjectPreviousStage(){}
    protected function isProjectStageEligible(){}
    protected function loadDefaultStages(){}
    public function isStageLegible(){}
    /**
     * Check if version is available on the stage.
     * 
     * @param type $version
     * @param type $stage
     */
    public function checkVersionAvailability($version, $stage){}
    public function getProjectStage(){
        if(isset($this->_project)){
            return $this->_project->getStage();
        }else{
            return false;
        }
    }
    
    
}

