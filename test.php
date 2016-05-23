<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    //SWITCH
    if($_GET['action']=="test_user")
    {
        test_user($_GET['username'],$_GET['password'],$conn);
    }
    if($_GET['action']=="get_musics")
    {
        get_preferences($conn,"music_types");
    }
    if($_GET['action']=="get_drinks")
    {
        get_preferences($conn,"drink_types");
    }
    if($_GET['action']=="get_foods")
    {
        get_preferences($conn,"food_types");
    }
    if($_POST['action']=="set_preference" && isset($_POST['preference']))
    {
        echo $_POST['preference'];
        //set_preferences($conn,"food_types");
    }

    //FONCTIONS
    function test_user($_usr,$_pwd,$conn)
    {
        $sql = "SELECT id, username,password FROM user where username='".$_usr."' and password='".$_pwd."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo json_encode(true);
            }
        } 
        else
        {
            echo json_encode(false);
        }
        $conn->close();
    }
   
   function get_preferences($conn,$table)
    {
        $sql = "SELECT id, libelle FROM ".$table;
        $result = $conn->query($sql);
        $myArray = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $myArray[] = $row;
            }
        } 
        echo json_encode($myArray);
        $conn->close();
    }
    
    function set_preferences($conn)
    {
        
    }
?>