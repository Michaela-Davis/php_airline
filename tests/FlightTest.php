<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/City.php";
    require_once "src/Flight.php";

    $server = 'mysql:host=localhost:8889;dbname=airline_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class FlightTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
          City::deleteAll();
          Flight::deleteAll();
        }

        function testGetDepartureTime()
        {
            //Arrange
            $departure_time = "2017-2-28 03:30:00";
            $departure_city = 1;
            $arrival_city = 2;
            $status_id = 1;
            $id = 1;
            $test_flight = new Flight($departure_time, $departure_city, $arrival_city, $status_id, $id);

            //Act
            $result = $test_flight->getDepartureTime();

            //Assert
            $this->assertEquals($departure_time, $result);
        }

        function testGetDepartureCity()
        {
            //Arrange
            $departure_time = "2017-2-28 03:30:00";
            $departure_city = 1;
            $arrival_city = 2;
            $status_id = 1;
            $id = 1;
            $test_flight = new Flight($departure_time, $departure_city, $arrival_city, $status_id, $id);

            //Act
            $result = $test_flight->getDepartureCity();

            //Assert
            $this->assertEquals($departure_city, $result);
        }

        function testGetArrivalCity()
        {
            //Arrange
            $departure_time = "2017-2-28 03:30:00";
            $departure_city = 1;
            $arrival_city = 2;
            $status_id = 1;
            $id = 1;
            $test_flight = new Flight($departure_time, $departure_city, $arrival_city, $status_id, $id);

            //Act
            $result = $test_flight->getArrivalCity();

            //Assert
            $this->assertEquals($arrival_city, $result);
        }

        function testGetStatusId()
        {
            //Arrange
            $departure_time = "2017-2-28 03:30:00";
            $departure_city = 1;
            $arrival_city = 2;
            $status_id = 1;
            $id = 1;
            $test_flight = new Flight($departure_time, $departure_city, $arrival_city, $status_id, $id);

            //Act
            $result = $test_flight->getStatusId();

            //Assert
            $this->assertEquals($status_id, $result);
        }

        function testGetId()
        {
            //Arrange
            $departure_time = "2017-2-28 03:30:00";
            $departure_city = 1;
            $arrival_city = 2;
            $status_id = 1;
            $id = 1;
            $test_flight = new Flight($departure_time, $departure_city, $arrival_city, $status_id, $id);

            //Act
            $result = $test_flight->getId();

            //Assert
            $this->assertEquals($id, $result);
        }



    }
?>
