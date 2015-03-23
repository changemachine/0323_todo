<?php

    class Category
    {
        private $id;
        private $name;

        function __construct($new_id, $new_name)
        {
            $this->id = $new_id;
            $this->name = $new_name;
        }

        //SET & GET ID
        function setId($new_id){
            $this->id = (int) $new_id;
        }
        function getId(){
            return $this->id;
        }

        function setName($new_name){
            $this->name = (string) $new_name;
        }

        function getName(){
            return $this->name;
        }


        //SET & GET DESC


        //SAVE


        //GET ALL, DELETE-ALL


        //SEARCH & DELETE BY CATEGORY


        //UPDATE, DELETE TASK



    }

?>
