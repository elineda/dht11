<?php
/**
 * Created by PhpStorm.
 * User: elineda
 * Date: 1/31/19
 * Time: 11:15 AM
 */

namespace DHT\view;


class Tuturu
{
    public $title;
    public $body;
    public $temp;
    public $val;
    public function __construct($title)
    {
        $this->title=$title;
    }
    public function addBody($body){
        ob_start();
        include $body.'.phtml';
        $this->body=ob_get_contents();
        ob_clean();
    }
    public function showPage(){
        require 'page.phtml';
    }

    /**
     * @param mixed $temp
     */
    public function setTemp($temp)
    {
        $this->temp = $temp;

    }
    public function setVal($val){
      $this->val=$val;
    }
}
