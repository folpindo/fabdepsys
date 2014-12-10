<?php

namespace Fabdepsys\Process\Validator;

class Build extends ValidatorAbstract
{
    protected $_process_defaults = array(
        'url',
        'repository',
        'jenkins_project',
        'jenkins_jobname',
        'jenkins_token'
    );
}