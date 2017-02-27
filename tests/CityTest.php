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


    class CityTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
        //   City::deleteAll();
        //   Flight::deleteAll();
        }

        function testGetCity()
        {
            //Arrange
            $city = "Tokyo";
            $id = 1;
            $test_city = new City($city, $id);

            //Act
            $result = $test_city->getCity();

            //Assert
            $this->assertEquals($city, $result);

        }

    }
?>
