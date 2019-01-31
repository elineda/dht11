<?php
/**
 * Created by PhpStorm.
 * User: elineda
 * Date: 1/31/19
 * Time: 1:50 PM
 */

namespace DHT\model;
require __DIR__.'/../../vendor/autoload.php';

class DbtakereadTest extends \PHPUnit_Framework_TestCase
{

    private $temp;

    protected function setUp(){
        $this->temp=new Dbtakeread();
    }
    protected function tearDown(){
        $this->temp=null;
    }

    public function testTakeTemp()
    {

    }

    public function testReadTemp()
    {

        $temptest=$this->temp->readtemp();
        $this->assertEquals(1,count($temptest));
    }
}
