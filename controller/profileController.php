<?php

include_once "../model/profileModel.php";


class ProfileController extends ProfileModel {

    private $id;


    public function __construct($id)
    {
        $this->id = $id;
    }

    public function createProfileTable() {

        $this->queryCreateProfileTable();
    }

    public function createProfileUser() {

        $this->queryCreateProfileForUser($this->id);
    }

    private function  validateProfile() {

        $this->queryValidateProfile($this->id);
    }

    public function getProfile() {

        $profile =  $this->queryGetProfile($this->id);

        return $profile;
    }

    public function getOrdersForLogged() {

        $result = $this->queryGetOrdersForLoggedUser($this->id);

        return $result;

    }
}