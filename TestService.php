<?php
/**
 * Created by PhpStorm.
 * User: rabot
 * Date: 10.11.2019
 * Time: 23:25
 
 */

namespace App\Services;


class TestService

{
   private $text;

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return strtoupper($this->text);
    }

}
