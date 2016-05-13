<?php
    session_start();
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $url = 'http://localhost/Tweevent_Session/test.php?action=test_user&username='.$_POST['username'].'&password='.$_POST['password'];
        $obj = json_decode(file_get_contents($url), true);
        echo $obj;
        if(test_user($_POST['username'],$_POST['password']))
        {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['user_type']   = 'regular';
            $_SESSION['time']     = time();
            header('Location: Actualite.php'); 
        }
        else
        {
            echo "Error : user doesn't exist.";
        }
    }
    else
    {
        echo var_dump($_SESSION);
    }

    function test_user($_usr,$_pwd)
    {
        $url = 'http://localhost/Tweevent_Session/test.php?action=test_user&username='.$_POST['username'].'&password='.$_POST['password'];
        $obj = json_decode(file_get_contents($url), true);
        if($obj==1)
        {
            return true;
        }
        return false;
    }
    
?>