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
          City::deleteAll();
          Flight::deleteAll();
        }

        function testSave()
        {
            //Arrange
            $city = "Tokyo";
            $id = null;
            $test_city = new City($city, $id);

            //Act
            $test_city->save();
            $result = City::getAll();

            //Assert
            $this->assertEquals([$test_city], $result);
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

        function testGetId()
        {
            //Arrange
            $city = "Tokyo";
            $id = 1;
            $test_city = new City($city, $id);

            //Act
            $result = $test_city->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function testGetAll()
        {
            //Arrange
            $city = "Tokyo";
            $id = null;
            $test_city = new City($city, $id);

            $city2 = "Portland";
            $id2 = null;
            $test_city2 = new City($city2, $id2);

            //Act
            $test_city->save();
            $test_city2->save();
            $result = City::getAll();

            //Assert
            $this->assertEquals([$test_city, $test_city2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $city = "Tokyo";
            $id = null;
            $test_city = new City($city, $id);

            $city2 = "Portland";
            $id2 = null;
            $test_city2 = new City($city2, $id2);

            //Act
            $test_city->save();
            $test_city2->save();
            City::deleteAll();
            $result = City::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_getCityById()
        {
            //Arrange
            $city = "Tokyo";
            $id = null;
            $test_city = new City($city, $id);

            $city2 = "Portland";
            $id2 = null;
            $test_city2 = new City($city2, $id2);

            //Act
            $test_city->save();
            $test_city2->save();
            $result = City::getCityById($test_city->getId());

            //Assert
            $this->assertEquals($test_city, $result);

        }

    }
?>
