<?php
session_start();
include 'dbConnect.php';

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
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">

    <div class="container">

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Артикул</th>
                        <th>Фото</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Сумма</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="cart">
                <?
                foreach ($_SESSION as $value)
                {
                    $str1 = "select * from tovar inner join size2tovar on tovar.id=size2tovar.idtovar 
                    inner join sizes on sizes.id=size2tovar.idsize  where tovar.id = {$value ['id']} ";
                    $result1 = $dbh->query($str1);

                    $img = $row1['img'];
                    $tovarname = $row1['name'];
                    $tovarprice = $row1['price'];

                    echo "<tr><td>{$value['id']}</td><td><img src='img/{$img}'></td>
                    <td>{$tovarname}</td><td>{$tovarprice}</td></tr>";
                }
                   echo '<tr><td colspan="6"><img src="img/<? echo $item[\'img\']; ?>" alt="" /></td></tr>'
                ?>
                </tbody>
            </table>
        </div>
        <div>Итого: <span id="total-cart-summa">65000</span> руб.</div>
        <br />
        <a class="btn btn-info" href="order.php">Оформить заказ</a>
        <a class="btn btn-info" href="exit.php">Очистить корзину</a>
    </div>

    <script id="cart-template" type="text/template">
        <% _.each(goods, function(good) { %>
            <tr class="cart-item js-cart-item" data-id="<%= good.id %>">
                <td><%= good.id %></td>
                <td><%- good.name %></td>
                <td><%= good.price %> руб.</td>
                <td>
                    <span 
                        class="cart-item__btn-dec-count js-change-count" 
                        title="Уменьшить на 1" 
                        data-id="<%= good.id %>" 
                        data-delta="-1"
                    >
                        <span class="glyphicon glyphicon-minus"></span>
                    </span>
                    <span class="js-count"><%= good.count %></span>
                    <span 
                        class="cart-item__btn-inc-count js-change-count" 
                        title="Увеличить на 1" 
                        data-id="<%= good.id %>" 
                        data-delta="1"
                    >
                        <span class="glyphicon glyphicon-plus"></span>
                    </span>
                </td>
                <td><span class="js-summa"><%= good.count * good.price %></span> руб.</td>
                <td>
                    <span class="cart-item__btn-remove js-remove-from-cart" title="Удалить из корзины" data-id="<%= good.id %>">
                        <span class="glyphicon glyphicon-remove"></span>                                
                    </span>
                </td>
            </tr>
        <% }); %>
    </script>

    <script src="js/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="js/vendor/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/vendor/underscore.min.js" type="text/javascript"></script>
    <script src="js/modules/catalog.js" type="text/javascript"></script>
    <script src="js/modules/cart.js" type="text/javascript"></script>
    <script src="js/modules/compare.js" type="text/javascript"></script>
    <script src="js/modules/main.js" type="text/javascript"></script>
