<?php

require_once("helper/dbConnection.php");

function get($id)
{
    $query = conn()->prepare("SELECT `productos`.`NOMBREARTÍCULO`,`pedidos`.`NUMERO_PEDIDO`, `pedidos`.`CÓDIGOCLIENTE`,`clientes`.`EMPRESA`
    FROM `productos` 
        INNER JOIN `pedidos` ON `pedidos`.`CÓDIGOARTÍCULO` = `productos`.`CÓDIGOARTÍCULO`
        INNER JOIN `clientes` ON `pedidos`.`CÓDIGOCLIENTE` = `clientes`.`CÓDIGOCLIENTE`
    WHERE `pedidos`.`CÓDIGOCLIENTE` = '$id';");

    try {
        $query->execute();
        $order = $query->fetchAll();
        return $order;
    } catch (PDOException $e) {
        return [];
    }
}

function getClients()
{
    $query = conn()->prepare("SELECT EMPRESA, CÓDIGOCLIENTE
    FROM clientes
    ORDER BY CÓDIGOCLIENTE ASC;");

    try {
        $query->execute();
        $clients = $query->fetchAll();
        return $clients;
    } catch (PDOException $e) {
        return [];
    }
}

function getProducts()
{
    $query = conn()->prepare("SELECT NOMBREARTÍCULO, CÓDIGOARTÍCULO
    FROM productos
    ORDER BY CÓDIGOARTÍCULO ASC;");

    try {
        $query->execute();
        $products = $query->fetchAll();
        return $products;
    } catch (PDOException $e) {
        return [];
    }
}

function create($order)
{
    $query = conn()->prepare("INSERT INTO `pedidos` (`CÓDIGOCLIENTE`, `CÓDIGOARTÍCULO`)
    VALUES
    (?, ?);");

    $query->bindParam(1, $order["CÓDIGOCLIENTE"]);
    $query->bindParam(2, $order["CÓDIGOARTÍCULO"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function delete($id)
{
    print_r($id);
    $query = conn()->prepare("DELETE FROM pedidos WHERE NUMERO_PEDIDO = ?");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}