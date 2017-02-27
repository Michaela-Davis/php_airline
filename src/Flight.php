<?php

    class Flight {

        private $departure_time;
        private $departure_city_id;
        private $arrival_city_id;
        private $status_id;
        private $id;

        function __construct($departure_time, $departure_city_id, $arrival_city_id, $status_id, $id = null)
        {
            $this->departure_time = $departure_time;
            $this->departure_city_id = $departure_city_id;
            $this->arrival_city_id = $arrival_city_id;
            $this->status_id = $status_id;
            $this->id = $id;
        }

        function getDepartureTime()
        {
            return $this->departure_time;
        }

        function getDepartureCity()
        {
            return $this->departure_city_id;
        }

        function getArrivalCity()
        {
            return $this->arrival_city_id;
        }

        function getStatusId()
        {
            return $this->status_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO flights (departure_time, departure_city_id, arrival_city_id, status_id) VALUES ('{$this->getDepartureTime()}', {$this->getDepartureCity()}, {$this->getArrivalCity()}, {$this->getStatusId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM flights;");
        }

        static function getAll()
        {
            $returned_flights = $GLOBALS['DB']->query("SELECT * FROM flights;");
            $flights = [];
            foreach($returned_flights as $flight) {
                $departure_time = $flight['departure_time'];
                $departure_city_id = $flight['departure_city_id'];
                $arrival_city_id = $flight['arrival_city_id'];
                $status_id = $flight['status_id'];
                $id = $flight['id'];
                $new_flight = new Flight($departure_time, $departure_city_id, $arrival_city_id, $status_id, $id);
                array_push($flights, $new_flight);
            }
            return $flights;
        }



    }
 ?>
