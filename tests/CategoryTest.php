<?php


    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    //require_once "src/Task.php";
    require_once "src/Category.php";

    $DB = new PDO('pgsql:host=localhost;dbname=to_do_test');

    class CategoryTest extends PHPUnit_Framework_TestCase
    {

        function testSetId()
        {
            //Arrange
            $id = 2;
            $name = "Keep Dog Alive";
            $test_setId = new Category($id, $name);

            //Act
            $test_setId->setId(3);
            $result = $test_setId->getId();

            //Assert
            $this->assertEquals(3, $result);
        }

        function testGetId()
        {
            //Arrange
            $id = 2;
            $name = "WashingThings";
            $test_category = new Category($id, $name);
            //Act
            $result = $test_category->getId();
            //Assert
            $this->assertEquals(2, $result);
        }

        function testGetName(){
            //Arrange
            $id = 1;
            $name = "Homework";
            $test_category = new Category($id, $name);
            //Act
            $result = $test_category->getName();
            //Assert
            $this->assertEquals("Homework", $result);
        }

        function testSetName()
        {
            //Arrange
            $id = 1;
            $name = "hello";
            $test_setName = new Category($id, $name);

            //Act
            $test_setName->setName("goodbye");
            $result = $test_setName->getName();

            //Assert
            $this->assertEquals("goodbye", $result);
        }






    }
?>
