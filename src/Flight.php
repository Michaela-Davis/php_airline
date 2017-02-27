<?php

    class Flight {

        private $departure_time;
        private $departure_city;
        private $arrival_city;
        private $status_id;
        private $id;

        function __construct($departure_time, $departure_city, $arrival_city, $status_id, $id = null)
        {
            $this->departure_time = $departure_time;
            $this->departure_city = $departure_city;
            $this->arrival_city = $arrival_city;
            $this->status_id = $status_id;
            $this->id = $id;
        }

        function getDepartureTime()
        {
            return $this->departure_time;
        }

        function getDepartureCity()
        {
            return $this->departure_city;
        }

        function getArrivalCity()
        {
            return $this->arrival_city;
        }

        function getStatusId()
        {
            return $this->status_id;
        }

        function getId()
        {
            return $this->id;
        }


        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM flights;");
        }

    }
 ?>
