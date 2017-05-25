<?php

class Message
{
    private $id;
    private $text;
    private $pubdate;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getText(){
        return $this->text;
    }

    public function setText($text){
        $this->text = $text;
    }

    public function getPubdate(){
        return $this->pubdate;
    }

    public function setPubdate($pubdate){
        $this->pubdate = $pubdate;
    }

}