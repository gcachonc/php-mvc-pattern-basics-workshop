<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="containter">
        <h1>New Order page!</h1>
        </br>

        <?php
        if ($action == "getProduct" && (!isset($product) || !$product || sizeof($product) == 0)) {
            echo "<p>The product does not exists!</p>";
        } else if (isset($error)) {
            echo "<p>$error</p>";
        }
        ?>
        <form class="mb-5 needs-validation" action="index.php?controller=orders&action=newOrder" method="post">
            <div class="form-row">
            <div class="col">
                    <div class="form-group">
                        <label for="EMPRESA">Cliente</label>
                        <select name="CÓDIGOCLIENTE" class="form-control" id="EMPRESA" required>
                            <?php 
                            foreach ($clients as $index => $client){
                                echo " <option value='".$client["CÓDIGOCLIENTE"]."'>".$client["EMPRESA"]."</option>";
                            }
                            ?>
                            
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="EMPRESA">Cliente</label>
                        <select name="CÓDIGOARTÍCULO" class="form-control" id="EMPRESA" required>
                            <?php 
                            foreach ($products as $index => $product){
                                echo " <option value='".$product["CÓDIGOARTÍCULO"]."'>".$product["NOMBREARTÍCULO"]."</option>";
                            }
                            ?>
                            
                        </select>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            <a id="return" class="btn btn-secondary" href="./index.php">Return</a>
        </form>
    </div>
</body>

</html>