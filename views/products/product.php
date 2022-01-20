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
        <h1>Product page!</h1>
        </br>

        <?php
        if ($action == "getProduct" && (!isset($product) || !$product || sizeof($product) == 0)) {
            echo "<p>The product does not exists!</p>";
        } else if (isset($error)) {
            echo "<p>$error</p>";
        }
        ?>
        <form class="mb-5 needs-validation" action="index.php?controller=products&action=<?php echo isset($product['CÓDIGOARTÍCULO']) ? "updateProduct" : "createProduct" ?>" method="post">
            <input type="hidden" name="CÓDIGOARTÍCULO" value="<?php echo isset($product['CÓDIGOARTÍCULO']) ? $product['CÓDIGOARTÍCULO'] : null ?>">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="SECCIÓN">Sección</label>
                        <input required type="text" value="<?php echo isset($product['SECCIÓN']) ? $product['SECCIÓN'] : null ?>" class="form-control" id="name" name="SECCIÓN" aria-describedby="name" placeholder="Enter secction">
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="NOMBREARTÍCULO">Artículo</label>
                        <input required type="text" value="<?php echo isset($product['NOMBREARTÍCULO']) ? $product['NOMBREARTÍCULO'] : null ?>" class="form-control" id="lastName" name="NOMBREARTÍCULO" aria-describedby="lastnameHelp" placeholder="Name">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Precio</label>
                        <input required type="text" value="<?php echo isset($product['PRECIO']) ? $product['PRECIO'] : null ?>" class="form-control" id="PRECIO" name="PRECIO" aria-describedby="PRECIOHelp" placeholder="Enter Price">
                    
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fecha</label>
                        <input required type="text" value="<?php echo isset($product['FECHA']) ? $product['FECHA'] : null ?>" class="form-control" id="FECHA" name="FECHA" aria-describedby="FECHAHelp" placeholder="YYYY-MM-DD">
                    
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="city">País de origen</label>
                        <input type="text" value="<?php echo isset($product['PAÍSDEORIGEN']) ? $product['PAÍSDEORIGEN'] : null ?>" class="form-control" id="PAÍSDEORIGEN" name="PAÍSDEORIGEN" aria-describedby="PAÍSDEORIGENHelp" placeholder="Enter PAÍSDEORIGEN">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="IMPORTADO">Importado</label>
                        <select name="IMPORTADO" class="form-control" id="IMPORTADO" required>
                            <option value="">Please Select</option>
                            <option value="VERDADERO" <?php echo isset($product['IMPORTADO']) && $product['IMPORTADO']  == 'VERDADERO' ? 'selected' : null; ?>>True</option>
                            <option value="FALSO" <?php echo isset($product['IMPORTADO']) && $product['IMPORTADO']  == "FALSO" ? 'selected' : null; ?>>False</option>
                        </select>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            <a id="return" class="btn btn-secondary" href="<?php echo "?controller=products&action=getAllProducts"; ?>">Return</a>
        </form>
    </div>
</body>

</html>