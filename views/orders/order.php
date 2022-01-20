<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <h1>Order of <?= $order[0]["EMPRESA"] ?> Dashboard page!</h1>
    <style type="text/css">

    </style>
    
        <a id="home" class="btn btn-primary" href="?controller=orders&action=newOrder">Create</a>
        <a id="home" class="btn btn-secondary" href="./index.php">Back</a>
    <table class="table">
        <thead>
            <tr>
                <th class="tg-0pky">NOMBRE ARTÍCULO</th>
                

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($order as $index => $product) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $product["NOMBREARTÍCULO"] . "</td>";
                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-danger' href='?controller=orders&idCLiente=".$product["CÓDIGOCLIENTE"]."&action=deleteOrder&id=". $product["NUMERO_PEDIDO"] . "'>Delete</a>
                </td>";
                echo "</tr>";
                
            }
            ?>
        </tbody>
    </table>

</body>

</html>