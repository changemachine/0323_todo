<?php

    class Task{

        private $id;
        private $description;

        function __construct($initial_id, $initial_description)
        {
            $this->id = $initial_id;
            $this->description = $initial_description;
        }

        //SET & GET
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


        //SAVE, GET ALL, DELETE-ALL
        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO tasks (description) VALUES ('{$this->getDescription()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

        static function getAll(){
            $returned_tasks = $GLOBALS['DB']->query("SELECT * FROM tasks;");
            $tasks = array();
            foreach($returned_tasks as $task){
                $id = $task['id'];
                $description = $task['description'];
                $new_task = new Task($id, $description);
                array_push($tasks, $new_task);
            }
            return $tasks;
        }

        static function deleteAll(){
            $GLOBALS['DB']->exec("DELETE FROM tasks *;");
        }

        //FIND & DELETE BY CATEGORY
        static function find($search_id){
            $found_id = null;
            $tasks = Task::getAll();
            foreach($tasks as $task){
                $task_id = $task->getId();
                if($task_id == $search_id){
                    $found_task = $task;
                }
            }
            return $found_task;

        }

        function deleteTask()
        {
            $GLOBALS['DB']->exec("DELETE FROM tasks WHERE id = {$this->getId()};");
        }

        //UPDATE

        function update($new_description)
        {
            $GLOBALS['DB']->exec("UPDATE tasks SET description = '{$new_description}' WHERE id = {$this->getId()};");
            $this->setDescription($new_description);
        }

    }



?>
