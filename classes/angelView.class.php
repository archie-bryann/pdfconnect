<?php

class AngelView extends AngelContr {

    public function displayRequests() {
        return count($this->checkRequests());
    }

    public function displayUsers() {
        return count($this->showUsers());
    }

    public function displayLoggedIn() {
        return count($this->showLoggedIn());
    }

    public function displayLoggedOut() {
        return count($this->countLoggedOut());
    }


}