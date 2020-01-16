<?php

class UsersDisplay extends Users {

    private $id;
    private $results;

    public function __construct($userId) {
        $this->id = $userId;
        $this->results = $this->checkId($this->id);
    }

    public function displayFirst() {
        echo $this->results[0]['firstname'];
    }

    public function displayLast() {
        echo $this->results[0]['lastname'];
    }

    public function displayName() {
            echo $this->results[0]['firstname'] . ' ' . $this->results[0]['lastname'];
    }

    public function displayTelephone() {
        echo $this->results[0]['telephone'];
    }

    public function displayEmail() {
        echo $this->results[0]['email'];
    }
    
    // finish later
    // student
    // worker (work at)
    // about me
    // would you like people to view my email
    // would you like people to view my telephone
}