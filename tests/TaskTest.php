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


    }

?>
