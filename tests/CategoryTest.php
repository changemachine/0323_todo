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

        protected function tearDown(){
            Task::deleteAll();
            Category::deleteAll();
        }

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

        function testGetName()
        {
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

        function testSave()
        {
            //ARRANGE
            $id = 1;
            $name = "HOUSEHOLD";
            $test_cat = new Category($id, $name);

            //ACT
            $test_cat->save();

            //ASSERT
            $result = Category::getAll();
            $this->assertEquals($test_cat, $result[0]);
        }

        function testGetAll(){
            //ARRANGE
            $id = 1;
            $name1 = "HOMEWORK";
            $category1 = new Category($id, $name1);
            $category1->save();

            $id2 = 2;
            $name2 = "Go home";
            $category2 = new Category($id, $name2);
            $category2->save();

            //ACT
            $result = Category::getAll();

            //ASSERT
            $this->assertEquals([$category1, $category2], $result);

        }

        function testDeleteAll()
        {
            //Arrange
            $name = "Delete cats";
            $id = 1;
            $test_cat = new Category($id, $name);
            $test_cat->save();

            $name2 = "We will get to add cats";
            $id2 = 2;
            $test_cat2 = new Category($id2, $name2);
            $test_cat2->save();

            //Act
            Category::deleteAll();

            //Assert
            $result = Category::getAll();
            $this->assertEquals([], $result);
        }

        function testFind(){
            //Arrange
            $id = 1;
            $name = "Groceries";
            $test_cat = new Category($id, $name);
            $test_cat->save();

            $id2 = 3;
            $name2 = "Not Groceries";
            $test_cat2 = new Category($id2, $name2);
            $test_cat2->save();

            //Act

            $result = Category::find($test_cat2->getId());

            //Assert
            $this->assertEquals($test_cat2, $result);
        }

        function testDeleteCategory(){
            //ARRANGE
            $id = 1;
            $name = "Worky Bizness";
            $cat1 = new Category($id, $name);
            $cat1->save();

            $id2 = 2;
            $name2 = "Monkey Bizness";
            $cat2 =  new Category($id2, $name2);
            $cat2->save();

            //ACT
            $cat1->deleteCategory();

            //ASSERT
            $this->assertEquals([$cat2], Category::getAll());
        }

        function testUpdate()
        {
            //ARRANGE
            $name = "this is new";
            $id = 1;
            $test_category = new Category($id, $name);
            $test_category->save();
            $new_name = "THIS is new";

            //ACT
            $test_category->update($new_name);
            //ASSERT
            $this->assertEquals("THIS is new", $test_category->getName());
        }

    }
?>
