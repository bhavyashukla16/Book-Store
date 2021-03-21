<?php

require_once("./db.php");
$con = createDB();

//create button click
if( isset($_POST["create"])){
    createData();
}
//update button click
if( isset ($_POST["update"])){
    updateData();
}
//delete button click
if( isset ($_POST["delete"])){
    deleteData();
}
//deleteAll button click
if( isset($_POST["deleteAll"])){
    deleteAll();
}



function createData(){
    $bookName = textBoxValue("book_name");
    $bookPublisher = textBoxValue("book_publisher");
    $bookPrice = textBoxValue("book_price");

    if($bookName && $bookPublisher && $bookPrice){

        $sql = "INSERT INTO books (book_name, book_publisher, book_price)
        VALUES ('$bookName', '$bookPublisher', '$bookPrice')";

       if(mysqli_query($GLOBALS['con'], $sql)){
            textNode("success", "Record Inserted Successfully!");
        }else{
            echo "Error";
        }
    }else{
        textNode("error", "Provide data in the textbox");
    }
}

function textBoxValue($value){
    $textBox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textBox)){
        return false;
    }else{
        return $textBox;
    }
}


//messages
function textNode($classname, $msg){
    echo "<p class=$classname>$msg</p>";
}

//get data from database
function getData(){
    $sql = "SELECT * FROM books";

   $result = mysqli_query($GLOBALS['con'], $sql);

   if(mysqli_num_rows($result) > 0){
            return $result;
   }
}

//Update data
function updateData(){
    $bookId = textBoxValue("book_id");
    $bookName = textBoxValue("book_name");
    $bookPublisher = textBoxValue("book_publisher");
    $bookPrice = textBoxValue("book_price");

    if($bookName && $bookPublisher && $bookPrice){

        $sql = "UPDATE books SET book_name='$bookName', book_publisher='$bookPublisher', book_price='$bookPrice' WHERE id='$bookId' ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            textNode("success", "Data Updated Successfully!");
        }else{
            textNode("error", "Error in updating data");
        }
    }else{
        textNode("error", "Provide data in textbox");
    }
}

//delete data
function deleteData(){
    $bookId = textBoxValue("book_id");

    $sql = "DELETE FROM books WHERE id='$bookId'";

    if(mysqli_query($GLOBALS['con'], $sql)){
        textNode("success", "Record Deleted Successfully!");
    }else{
        textNode("error", "Error in Deleting the record");
    }
}

function deleteAllBtn(){
    $result = getData();
    $i=0;
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
            buttonElement("deleteAll","btn-deleteAll","btn btn-danger", "<i class='fas fa-trash'></i> Delete All", "");
            return; 
            }
        }   
    }
}

function deleteAll(){
    $sql = "DROP TABLE books";

    if(mysqli_query($GLOBALS['con'], $sql)){
        textNode("success", "All Records Deleted Successfully!!");
        createDB();
    }else{
        textNode("error", "Error in Deleting All records");
    }
}

function setID(){
    $result = getData();
    $id = 0;
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}



?>