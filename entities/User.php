<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $homepage;
    private $userIp;
    private $browser;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getHomepage(){
        return $this->homepage;
    }

    public function setHomepage($homepage){
        $this->homepage = $homepage;
    }

    public function getUserIp(){
        return $this->userIp;
    }

    public function setUserIp($userIp){
        $this->userIp = $userIp;
    }

    public function getBrowser(){
        return $this->browser;
    }

    public function setBrowser($browser){
        $this->browser = $browser;
    }

}