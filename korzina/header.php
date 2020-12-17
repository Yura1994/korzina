<?php
session_start();
?>

<header><a href="cart.php">Корзина
        <?
        (int)$cn=0;
        foreach ($_SESSION as $value)
        {
            /*var_dump($value);
            die();*/
            $cn=(int)$value['count']+$cn;
            echo $cn;
        }
        ?>
    </a> </header>