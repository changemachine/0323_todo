<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Task.php";
    //require_once "src/Category.php";

    $DB = new PDO('pgsql:host=localhost;dbname=to_do_test');

    class TaskTest extends PHPUnit_Framework_TestCase
    {

            protected function tearDown(){
                Task::deleteAll();
                Category::deleteAll();
            }

            function testSetId(){
                // Arrange
                $id = 1;
                $description = "Wash the dog";
                $test_task = new Task($id, $description);

                //Act
                $test_task->setId(2);
                $result = $test_task->getId();

                //Assert
                $this->assertEquals(2, $result);

            }

            function testGetId()
            {
                //Arrange
                $id = 1;
                $description = "Wash the dog";
                $test_task = new Task($id, $description);

                //Act
                $result = $test_task->getId();

                //Assert
                $this->assertEquals(1, $result);

            }

            //SET & GET DESC

            function testSetDescription()
            {
                //Arrange
                $id = 1;
                $description = "Do dishes";
                $test_task = new Task($id, $description);

                //Act
                $test_task->setDescription("Drink Coffee");
                $result = $test_task->getDescription();

               //Assert
                $this->assertEquals("Drink Coffee", $result);
            }

            function testGetDescription(){
                //ARRANGE
                $id = 1;
                $description = "Dance with cat";
                $test_task = new Task($id, $description);

                //ACT
                $result = $test_task->getDescription();

                //ASSERT
                $this->assertEquals("Dance with cat", $result);

            }

            function testSave()
            {
                //ARRANGE
                $id = 1;
                $description = "drink coffee";
                $test_task = new Task($id, $description);

                //ACT
                $test_task->save();

                //ASSERT
                $result = Task::getAll();
                $this->assertEquals($test_task, $result[0]);
            }

            function testGetAll(){
                //ARRANGE
                $id = 1;
                $description1 = "Go to town";
                $task1 = new Task($id, $description1);
                $task1->save();

                $id2 = 2;
                $description2 = "Go home";
                $task2 = new Task($id, $description2);
                $task2->save();

                //ACT
                $result = Task::getAll();

                //ASSERT
                $this->assertEquals([$task1, $task2], $result);

            }

            function testDeleteAll()
            {
                //Arrange
                $description = "We will get to delete task";
                $id = 1;
                $test_task = new Task($id, $description);
                $test_task->save();

                $description2 = "We will get to add task";
                $id2 = 2;
                $test_task2 = new Task($id2, $description2);
                $test_task2->save();

                //Act
                Task::deleteAll();

                //Assert
                $result = Task::getAll();
                $this->assertEquals([], $result);
            }

            function testFind()
            {

                //Arrange
                $description = "dance";
                $id = 1;
                $test_task = new Task($description, $id);
                $test_task->save();

                $description2 = "Water the lawn";
                $id2 = 2;
                $test_task2 = new Task($description2, $id2);
                $test_task2->save();

                //Act
                $result = Task::find($test_task->getId());

                //Assert
                $this->assertEquals($test_task, $result);
            }
    }

?>
