<?php

namespace Fabdepsys\Process\Validator;

class Loader {

    public function getProcessValidator($params) {
        $process = $params['process'];
        $processArr = array_keys(array_flip(explode('_', $process)));
        $processClass = '';
        foreach ($processArr as $p) {
            $processClass .= ucfirst(strtolower($p));
        }
        $processClass = '\\Fabdepsys\\Process\\Validator\\'.$processClass;
        
        $processValidator = new $processClass();
        if(!empty($params)){
            $processValidator->setParams($params);
        }
        return $processValidator;
    }

}
