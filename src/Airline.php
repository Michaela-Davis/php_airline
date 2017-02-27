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
