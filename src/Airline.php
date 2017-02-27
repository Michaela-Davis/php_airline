<?php
    class Airline {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name  = $name;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO airlines (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function addFlight($flight)
        {
            $GLOBALS['DB']->exec("INSERT INTO flights_airlines (flight_id, airline_id) VALUES ({$flight->getId()}, {$this->getId()});");
        }

        function getFlights()
        {
            $query = $GLOBALS['DB']->query("SELECT flight_id FROM flights_airlines WHERE airline_id = {$this->getId()};");
            $flight_ids = $query->fetchAll(PDO::FETCH_ASSOC);

            $flights = [];
            foreach ($flight_ids as $id) {
                $flight_id = $id['flight_id'];
                $result = $GLOBALS['DB']->query("SELECT * FROM flights WHERE id = {$flight_id};");
                $returned_flight = $result->fetchAll(PDO::FETCH_ASSOC);

                $departure_time = $returned_flight[0]['departure_time'];
                $status_id = $returned_flight[0]['status_id'];
                $id = $returned_flight[0]['id'];
                $departure_city_id = $returned_flight[0]['departure_city_id'];
                $arrival_city_id = $returned_flight[0]['arrival_city_id'];
                $new_flight = new Flight($departure_time, $departure_city_id, $arrival_city_id, $status_id, $id);
                array_push($flights, $new_flight);
            }
            return $flights;
        }

        static function getAirlineById($search_id)
        {
            $found_airline = null;
            $airlines = Airline::getAll();
            foreach($airlines as $airline) {
                if($search_id == $airline->getId()) {
                    $found_airline = $airline;
                }
            }
            return $found_airline;
        }

        static function getAll() {
            $returned_airlines = $GLOBALS['DB']->query("SELECT * FROM airlines;");
            $airlines = [];
            foreach ($returned_airlines as $airline) {
                $name = $airline['name'];
                $id = $airline['id'];
                $new_airline = new Airline($name, $id);
                array_push($airlines, $new_airline);
            }
            return $airlines;
        }

        static function deleteAll() {
            $GLOBALS['DB']->exec("DELETE FROM airlines");
        }


    }


 ?>
