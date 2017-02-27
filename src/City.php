<?php

    class City {

        private $city;
        private $id;

        function __construct($city, $id = null) {
            $this->city = $city;
            $this->id = $id;
        }

        function getCity() {
            return $this->city;
        }

        function getId() {
            return $this->id;
        }
    }
 ?>
