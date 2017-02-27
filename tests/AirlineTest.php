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

        function test_getAirlineById() {
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





    }
?>
