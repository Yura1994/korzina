<?php
session_start();
var_dump($_SESSION);
include "dbConnect.php";
include "header.php";
if (isset($_GET['id'])) {
    $str = "select * from tovar where id = {$_GET['id']}";
    echo $str;
    $res = $dbh->query($str);
    $row = $res->fetch();
} else {
    echo "<script>
location = 'index.php';
</script>";
}
?>
<style>
    * {box-sizing: border-box;}
    .product-item {
        width: 300px;
        text-align: center;
        margin: 0 auto;
        border-bottom: 2px solid #F5F5F5;
        background: white;
        font-family: "Open Sans";
        transition: .3s ease-in;
    }
    .product-item:hover {border-bottom: 2px solid #fc5a5a;}
    .product-item img {
        display: block;
        width: 100%;
    }
    .product-list {
        background: #fafafa;
        padding: 15px 0;
    }
    .product-list h3 {
        font-size: 18px;
        font-weight: 400;
        color: #444444;
        margin: 0 0 10px 0;
    }
    .price {
        font-size: 16px;
        color: #fc5a5a;
        display: block;
        margin-bottom: 12px;
    }
    .button {
        text-decoration: none;
        display: inline-block;
        padding: 0 12px;
        background: #cccccc;
        color: white;
        text-transform: uppercase;
        font-size: 12px;
        line-height: 28px;
        transition: .3s ease-in;
    }
    .product-item:hover .button {background: #fc5a5a;}
</style>

<div class="product-item">
    <?
    echo "<img src='img/{$row['img']}' alt=''>";
    ?>
    <div class="product-list">
        <form method="post" action="bin.php">
            <input type="hidden" name="id" value="<? echo $row['id']?>">


        <?
        echo "<h3>{$row['name']}</h3>";



        $str1 = "select * from tovar inner join size2tovar on tovar.id=size2tovar.idtovar
         inner join sizes on sizes.id=size2tovar.idsize  where tovar.id = {$_GET['id']} ";

        $res1 = $dbh->query($str1);
        $row1 = $res1->fetchAll();

        foreach ($row1 as $value)
        {
            echo "<input type = 'radio' required name='size' value='{$value['id']}'>{$value['namesize']}</br>";
        }
       echo" <span class='price'>€ {$row['price']}</span>";
?>

       <input type="submit" name="tocart" value="В Корзину" class="button">
        </form>
    </div>
</div>

