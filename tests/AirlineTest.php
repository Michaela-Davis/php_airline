<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/City.php";
    require_once "src/Flight.php";
    require_once "src/Airline.php";

    $server = 'mysql:host=localhost:8889;dbname=airline_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class AirlineTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
          City::deleteAll();
          Flight::deleteAll();
          Airline::deleteAll();
        }

        function test_getName()
        {
            $name = 'Alaska';
            $id = 1;
            $test_airline = new Airline($name, $id);

            //Act
            $result = $test_airline->getName();

            //Assert
            $this->assertEquals($result, $name);
        }

        function test_getId()
        {
            $name = 'Alaska';
            $id = 1;
            $test_airline = new Airline($name, $id);

            //Act
            $result = $test_airline->getId();

            //Assert
            $this->assertEquals($result, $id);
        }

        function test_save()
        {
            $name = 'Alaska';
            $id = null;
            $test_airline = new Airline($name, $id);

            //Act
            $test_airline->save();
            $result = Airline::getAll();

            //Assert
            $this->assertEquals($result, [$test_airline]);
        }

        function test_getAirlineById()
        {
            $name = 'Alaska';
            $id = null;
            $test_airline = new Airline($name, $id);

            $name2 = 'Horizon';
            $id2 = null;
            $test_airline2 = new Airline($name2, $id2);

            //Act
            $test_airline->save();
            $test_airline2->save();
            $result = Airline::getAirlineById($test_airline2->getId());

            //Assert
            $this->assertEquals($result, $test_airline2);
        }

        function test_getFlights()
        {
            $name = 'Alaska';
            $id = null;
            $test_airline = new Airline($name, $id);

            $departure_time = "2017-02-28 03:30:00";
            $departure_city_id = 1;
            $arrival_city_id = 2;
            $status_id = 1;
            $id = null;
            $test_flight = new Flight($departure_time, $departure_city_id, $arrival_city_id, $status_id, $id);

            $departure_time2 = "2017-03-28 03:30:00";
            $departure_city_id2 = 2;
            $arrival_city_id2 = 3;
            $status_id2 = 1;
            $id2 = null;
            $test_flight2 = new Flight($departure_time2, $departure_city_id2, $arrival_city_id2, $status_id2, $id2);

            $test_airline->save();
            $test_flight->save();
            $test_flight2->save();
            $test_airline->addFlight($test_flight2);
            $result = $test_airline->getFlights();

            $this->assertEquals($result, [$test_flight2]);

        }





    }
?>
