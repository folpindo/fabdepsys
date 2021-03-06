<?php
namespace Fabdepsys\Process\Validator;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-11-21 at 13:31:55.
 */
class TestLoader extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Loader
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Loader;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Fabdepsys\Process\Validator\Loader::getProcessValidator
     * @todo   Implement testGetProcessValidator().
     */
    public function testGetProcessValidator()
    {
        $actual = $this->object->getProcessValidator(array('process'=>'build'));
        $this->assertInstanceOf('Fabdepsys\Process\Validator\Build', $actual);
        $actual = $this->object->getProcessValidator(array('process'=>'packaging'));
        $this->assertInstanceOf('Fabdepsys\Process\Validator\Packaging', $actual);
        $actual = $this->object->getProcessValidator(array('process'=>'staging_deployment'));
        $this->assertInstanceOf('Fabdepsys\Process\Validator\StagingDeployment', $actual);
        $actual = $this->object->getProcessValidator(array('process'=>'production_deployment'));
        $this->assertInstanceOf('Fabdepsys\Process\Validator\ProductionDeployment', $actual);
    }
}
