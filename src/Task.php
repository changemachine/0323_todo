<?php

    class Task{

        private $id;
        private $description;

        function __construct($initial_id, $initial_description)
        {
            $this->id = $initial_id;
            $this->description = $initial_description;
        }

        //SET & GET ID
        function setId($new_id){
            $this->id = (int) $new_id;
        }
        function getId(){
            return $this->id;
        }

        function setDescription($new_description){
            $this->description = (string) $new_description;
        }

        function getDescription(){
            return $this->description;
        }

        //SET & GET DESC


        //SAVE


        //GET ALL, DELETE-ALL


        //SEARCH & DELETE BY CATEGORY


        //UPDATE, DELETE TASK

    }



?>
