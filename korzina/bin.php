<?php
session_start();
include "dbConnect.php";
if (isset($_POST['id'])) {
    $name = "id".$_POST['id'];
    $name ="id".$_POST['id']."_".$_POST['size'];
    if (isset($_SESSION['name']))
    {
        $_SESSION[$name] = ["id"=>$_POST['id'],"size"=>$_POST['size'],"count"=>$_SESSION[$name]['count']+1];
    }else
    {
        $_SESSION[$name] = ["id"=>$_POST['id'],"size"=>$_POST['size'],"count"=>$_SESSION[$name]['count']+1];
    }
    //var_dump($_SESSION);
   /* if (!empty($_SESSION['id'])) {
        $_SESSION['id'] = $_SESSION['id'] . ";" . $_POST['id'];
    }else{
        $_SESSION['id'] = $_POST['id'];
    }*/
}
echo "<script>location = 'one_tovar.php?id={$_POST['id']}'</script>";
?>

