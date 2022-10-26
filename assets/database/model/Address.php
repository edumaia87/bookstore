<?php
class Address {
    private $id;
    private $street;
    private $district;
    private $number;
    private $city;
    private $state;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getStreet() {
        return $this->street;
    }

    public function setStreet($street) {
        $this->street = $street;
    }

    public function getDistrict() {
        return $this->district;
    }

    public function setDistrict($district) {
        $this->district = $district;
    }

    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    public function getCity() {
        return $this->city;
    }   

    public function setCity($city) {
        $this->city = $city;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    } 
}