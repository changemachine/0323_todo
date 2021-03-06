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

        //SET & GET PROPERTIES
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


        //SAVE, GET ALL, DELETE-ALL

        function save(){
            $statement = $GLOBALS['DB']->query("INSERT INTO categories (name) VALUES ('{$this->getName()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function getAll(){
            $returned_categories = $GLOBALS['DB']->query("SELECT * FROM categories;");
            $categories = array();
            foreach($returned_categories as $category)
            {
                $name = $category['name'];
                $id = $category['id'];
                $new_category = new Category($id, $name);
                array_push($categories, $new_category);
            }
            return $categories;
        }

        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM categories *;");
        }

        //SEARCH & DELETE BY CATEGORY

        static function find ($search_id)
        {
            $found_category = null;
            $categories = Category::getAll();
            foreach ($categories as $category)
            {
                $category_id = $category->getId();
                if($category_id == $search_id)
                {
                    $found_category = $category;
                }
            }

             return $found_category;
        }

        //DELETE CATEGORY

        function deleteCategory(){
            $GLOBALS['DB']->exec("DELETE FROM categories WHERE id = {$this->getId()};");
        }

        //UPDATE
        function update($new_name){
            $GLOBALS['DB']->exec("UPDATE categories SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }





    }

?>
