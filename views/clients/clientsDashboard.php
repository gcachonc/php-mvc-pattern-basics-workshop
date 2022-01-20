<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <h1>Clients Dashboard page!</h1>
    <style type="text/css">

    </style>
    
        <a id="home" class="btn btn-primary" href="?controller=clients&action=createClient">Create</a>
        <a id="home" class="btn btn-secondary" href="./">Back</a>
    <table class="table">
        <thead>
            <tr>
                <th class="tg-0pky">CÓDIGOCLIENTE</th>
                <th class="tg-0pky">EMPRESA</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($clients as $index => $client) {
                echo "<tr>";
                echo "<td class='tg-0lax'>" . $client["CÓDIGOCLIENTE"] . "</td>";
                echo "<td class='tg-0lax'>" . $client["EMPRESA"] . "</td>";
                echo "<td colspan='2' class='tg-0lax'>
                <a class='btn btn-secondary' href='?controller=orders&action=getOrdersById&id=" . $client["CÓDIGOCLIENTE"] . "'>Orders</a>
                <a class='btn btn-secondary' href='?controller=clients&action=getClient&id=" . $client["CÓDIGOCLIENTE"] . "'>Edit</a>
                <a class='btn btn-danger' href='?controller=clients&action=deleteClient&id=" . $client["CÓDIGOCLIENTE"] . "'>Delete</a>
                </td>";
                
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>