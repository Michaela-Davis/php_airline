<?php

    class City {

        private $city;
        private $id;

        function __construct($city, $id = null)
        {
            $this->city = $city;
            $this->id = $id;
        }

        function getCity()
        {
            return $this->city;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO cities (city) VALUES ('{$this->getCity()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_cities = $GLOBALS['DB']->query("SELECT * FROM cities;");
            $cities = [];
            foreach ($returned_cities as $city) {
                $name = $city['city'];
                $id = $city['id'];
                $new_city = new City($name, $id);
                array_push($cities, $new_city);
            }
            return $cities;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM cities;");
        }


    }
 ?>
