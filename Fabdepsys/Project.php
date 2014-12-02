<?php

namespace Fabdepsys;

class Project
{
    protected $_stage;
    protected $_previous_stage;
    protected $_next_stage;
    protected $_name;
    protected $_version;
    
    public function getName(){
        return $this->_name;
    }
    public function setName($name){
        $this->_name = $name;
    }
    
}

