<?php
session_start();
var_dump($_SESSION);
include 'dbConnect.php';
include "header.php";

$str = "select * from category";
$result = $dbh->query($str);
$row = $result->fetchAll();

if (isset($_GET['idcut'])) {
    $str1 = "select * from tovar where id_categ = {$_GET['idcut']}";
} else {
    $str1 = "select * from tovar";
}
$result1 = $dbh->query($str1);
$row1 = $result1->fetchAll();
?>

    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Каталог товаров</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container content">
    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                <? foreach ($row as $value) {
                    echo "<a href='index.php?idcut={$value['id']}' class='list-group-item'>{$value['name']}</a>";
                }
                ?>
            </div>
        </div>
        <div class="col-md-8 products">
            <div class="row">
                <?
                foreach ($row1 as $item) {
                    ?>
                    <div class="col-sm-4">
                        <div class="product">
                            <div class="product-img">
                                <a href="one_tovar.php?id=<?php echo $item['id']; ?>">
                                    <img src="img/<? echo $item['img']; ?>" alt=""></a>
                            </div>
                            <p class="product-title">
                                <a href="one_tovar.php?id=<?php echo $item['id']; ?>">
                                    <?php echo $item['name']; ?></a>
                            </p>
                            <p class="product-desc">Signature NYX cosmetics</p>
                            <p class="product-price">Price: €<?php echo $item['price']; ?></p>
                        </div>
                    </div>

                    <?
                } ?>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    $(function () {


    });
</script>

</body>
    </html><?php
