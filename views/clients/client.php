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
        <h1>Client page!</h1>
        </br>

        <?php
        if ($action == "getClient" && (!isset($client) || !$client || sizeof($client) == 0)) {
            echo "<p>The client does not exists!</p>";
        } else if (isset($error)) {
            echo "<p>$error</p>";
        }
        ?>
        <form class="mb-5 needs-validation" action="index.php?controller=clients&action=<?php echo isset($client['CÓDIGOCLIENTE']) ? "updateClient" : "createClient" ?>" method="post">
            <input type="hidden" name="CÓDIGOCLIENTE" value="<?php echo isset($client['CÓDIGOCLIENTE']) ? $client['CÓDIGOCLIENTE'] : null ?>">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="EMPRESA">Empresa</label>
                        <input required type="text" value="<?php echo isset($client['EMPRESA']) ? $client['EMPRESA'] : null ?>" class="form-control" id="name" name="EMPRESA" aria-describedby="name" placeholder="Enter name">
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="DIRECCIÓN">Direccion</label>
                        <input required type="text" value="<?php echo isset($client['DIRECCIÓN']) ? $client['DIRECCIÓN'] : null ?>" class="form-control" id="lastName" name="DIRECCIÓN" aria-describedby="lastnameHelp" placeholder="Direction">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">POBLACIÓN</label>
                        <input required type="text" value="<?php echo isset($client['POBLACIÓN']) ? $client['POBLACIÓN'] : null ?>" class="form-control" id="POBLACIÓN" name="POBLACIÓN" aria-describedby="POBLACIÓNHelp" placeholder="Enter POBLACIÓN">
                    
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">TELÉFONO</label>
                        <input required type="text" value="<?php echo isset($client['TELÉFONO']) ? $client['TELÉFONO'] : null ?>" class="form-control" id="TELÉFONO" name="TELÉFONO" aria-describedby="TELÉFONOHelp" placeholder="Enter TELÉFONO">
                    
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="city">RESPONSABLE</label>
                        <input type="text" value="<?php echo isset($client['RESPONSABLE']) ? $client['RESPONSABLE'] : null ?>" class="form-control" id="RESPONSABLE" name="RESPONSABLE" aria-describedby="RESPONSABLEHelp" placeholder="Enter RESPONSABLE">
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
            <a id="return" class="btn btn-secondary" href="<?php echo "?controller=clients&action=getAllClients"; ?>">Return</a>
        </form>
    </div>
</body>

</html>