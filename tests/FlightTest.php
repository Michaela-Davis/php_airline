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
            $departure_time = "2017-02-28 03:30:00";
            $departure_city_id = 1;
            $arrival_city_id = 2;
            $status_id = 1;
            $id = 1;
            $test_flight = new Flight($departure_time, $departure_city_id, $arrival_city_id, $status_id, $id);

            //Act
            $result = $test_flight->getDepartureTime();

            //Assert
            $this->assertEquals($departure_time, $result);
        }

        function testGetDepartureCity()
        {
            //Arrange
            $departure_time = "2017-02-28 03:30:00";
            $departure_city_id = 1;
            $arrival_city_id = 2;
            $status_id = 1;
            $id = 1;
            $test_flight = new Flight($departure_time, $departure_city_id, $arrival_city_id, $status_id, $id);

            //Act
            $result = $test_flight->getDepartureCity();

            //Assert
            $this->assertEquals($departure_city_id, $result);
        }

        function testGetArrivalCity()
        {
            //Arrange
            $departure_time = "2017-2-28 03:30:00";
            $departure_city_id = 1;
            $arrival_city_id = 2;
            $status_id = 1;
            $id = 1;
            $test_flight = new Flight($departure_time, $departure_city_id, $arrival_city_id, $status_id, $id);

            //Act
            $result = $test_flight->getArrivalCity();

            //Assert
            $this->assertEquals($arrival_city_id, $result);
        }

        function testGetStatusId()
        {
            //Arrange
            $departure_time = "2017-02-28 03:30:00";
            $departure_city_id = 1;
            $arrival_city_id = 2;
            $status_id = 1;
            $id = 1;
            $test_flight = new Flight($departure_time, $departure_city_id, $arrival_city_id, $status_id, $id);

            //Act
            $result = $test_flight->getStatusId();

            //Assert
            $this->assertEquals($status_id, $result);
        }

        function testGetId()
        {
            //Arrange
            $departure_time = "2017-02-28 03:30:00";
            $departure_city_id = 1;
            $arrival_city_id = 2;
            $status_id = 1;
            $id = 1;
            $test_flight = new Flight($departure_time, $departure_city_id, $arrival_city_id, $status_id, $id);

            //Act
            $result = $test_flight->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function testSave()
        {
            //Arrange
            $departure_time = "2017-02-28 03:30:00";
            $departure_city_id = 1;
            $arrival_city_id = 2;
            $status_id = 1;
            $id = null;
            $test_flight = new Flight($departure_time, $departure_city_id, $arrival_city_id, $status_id, $id);

            //Act
            $test_flight->save();
            $result = Flight::getAll();

            //Assert
            $this->assertEquals([$test_flight], $result);
        }

        function getAll()
        {
            //Arrange
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

            //Act
            $test_flight->save();
            $test_flight2->save();
            $result = Flight::getAll();

            //Assert
            $this->assertEquals([$test_flight, $test_flight2], $result);
        }


    }
?>
