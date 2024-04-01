<?php

//
////first validation : I need to make sure that the request method is correct:
//
//
//if ($_SERVER["REQUEST_METHOD"] == "POST"){
//
//    //make sure of remaining validations and storing my variables them to  datbase
//    if (empty($_POST["password"]) || empty($_POST["username"])|| empty($_POST["age"]) || empty($_POST["additionalInfo"])) {
//        echo " All fields are required";
//    }
//
//    else{ // all the values are not empty
//    //we will validate the name
//        if(!preg_match( "/^[a-zA-Z]{3,10}$/",$_POST["username"])){
//          //first parameter I need letter from A-Z
//           echo "Username should only be characters";
//           exit();
//        }
//        else{
//            $useranme = $_POST["username"];
//
//        }
//
//        if (!preg_match("/^[a-zA-Z0-9]{3,10}$/",$_POST["password"])){
//            echo "Password should only be ch
//            aracters and numbers";
//        exit();
//        }
//        else{
//            $password =$_POST["password"];
//        }
//         if (!preg_match("/^[0-9]*$/",$_POST["age"])){
//             echo "The age should contain only numbers";
//             exit();
//         }
//         else{
//             $age = $_POST["age"];
//         }
//         if (strlen( $_POST["additionalInfo"]) < 3 || strlen($_POST["additionalInfo"]) > 25){ //now we will make sure that my additonal info from the user will be between 3 and 25 characters
//
//
//             echo "your additional info should be between 3-25 characters";
//             exit();
//
//         }
//
//         else{
//             $additionalInfo = $_POST["additionalInfo"];
//         }
//
//
////         now we send data to the database
//
//
//        $conn = new mysqli("localhost","root","","ilac_college");
//        //make sure that connection is built successfully
//        if ($conn -->mysqli_connect_error()){
//            die("Connection failed: " . $conn-->mysqli_connect_error());
//
//        }
//
//        //write a query
//        $sql = "INSERT INTO students(name,password,age,additionalInfo) VAlUES('$useranme','$password','$age','$additionalInfo')";
//        //we need to ru the query
//        //we use query function query($sql)
//
//        $results = $conn ->query($sql);
//
//        //now my query is executed
//        //now we will check if it was successfully executed
//    if($results == TRUE){
//        echo "data stored successfully";
//    }
//    else{
//        echo "you got error".$sql .$conn->error;
//
//        //connect_error : this will show me error in my connection
//        //error : this will show me error in sql
//    }
//
//    $conn ->close();
//
//
//    }
//
//
//
//}
//else{
//    //if the request method is not post
//    echo "Invalid request method";
//
//}


// First validation: Ensure the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are provided
    if (empty($_POST["username"]) ||empty(["password"]) ||  empty($_POST["age"]) || empty($_POST["additionalInfo"])) {
        echo "All fields are required";
    } else {
        // Validate username (letters only, 3-10 characters)
        if (!preg_match("/^[a-zA-Z]{3,10}$/", $_POST["username"])) {
            echo "Username should only contain letters (3-10 characters)";
            exit();
        } else {
            $username = $_POST["username"];
        }

        // Validate password (alphanumeric, 3-10 characters)
        if (!preg_match("/^[a-zA-Z0-9]{3,10}$/", $_POST["password"])) {
            echo "Password should only contain characters and numbers (3-10 characters)";
            exit();
        } else {
            $password = $_POST["password"];
        }

        // Validate age (numeric)
        if (!preg_match("/^[0-9]*$/", $_POST["age"])) {
            echo "Age should contain only numbers";
            exit();
        } else {
            $age = $_POST["age"];
        }

        // Validate additional info length (3-25 characters)
        if (strlen($_POST["additionalInfo"]) < 3 || strlen($_POST["additionalInfo"]) > 25) {
            echo "Additional info should be between 3 and 25 characters";
            exit();
        } else {
            $additionalInfo = $_POST["additionalInfo"];
        }

        // Connect to the database (update credentials accordingly)
        $conn = new mysqli("localhost", "root", "", "ilac_college");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Write the SQL query (complete the missing part)
        $sql = "INSERT INTO phpstudents (Name, Password, Age, Additional-info) VALUES ('$username','$password','$age','$additionalInfo')";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
}

