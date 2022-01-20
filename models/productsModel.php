<?php

require_once("helper/dbConnection.php");

function get()
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



function getById($id)
{
    $query = conn()->prepare("SELECT *
    FROM `productos`
    WHERE `productos`.`CÓDIGOARTÍCULO` = '$id';");

    try {
        $query->execute();
        $product = $query->fetch();
        return $product;
    } catch (PDOException $e) {
        return [];
    }
}

function create($product)
{
    $query = conn()->prepare("INSERT INTO productos (SECCIÓN , NOMBREARTÍCULO, PRECIO, FECHA, IMPORTADO, PAÍSDEORIGEN, CÓDIGOARTÍCULO)
    VALUES
    (?, ?, ?, ?, ?, ?,?);");



$query->bindParam(1, $product["SECCIÓN"]);
$query->bindParam(2, $product["NOMBREARTÍCULO"]);
$query->bindParam(3, $product["PRECIO"]);
$query->bindParam(4, $product["FECHA"]);
$query->bindParam(5, $product["IMPORTADO"]);
$query->bindParam(6, $product["PAÍSDEORIGEN"]);
$query->bindParam(7, $product["CÓDIGOARTÍCULO"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function update($product)
{
    $query = conn()->prepare("UPDATE productos
    SET SECCIÓN = ?, NOMBREARTÍCULO = ?, PRECIO = ?, FECHA = ?, IMPORTADO = ?, PAÍSDEORIGEN = ?
    WHERE CÓDIGOARTÍCULO = ?;");

    $query->bindParam(1, $product["SECCIÓN"]);
    $query->bindParam(2, $product["NOMBREARTÍCULO"]);
    $query->bindParam(3, $product["PRECIO"]);
    $query->bindParam(4, $product["FECHA"]);
    $query->bindParam(5, $product["IMPORTADO"]);
    $query->bindParam(6, $product["PAÍSDEORIGEN"]);
    $query->bindParam(7, $product["CÓDIGOARTÍCULO"]);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}

function delete($id)
{
    $query = conn()->prepare("DELETE FROM productos WHERE CÓDIGOARTÍCULO = ?");
    $query->bindParam(1, $id);

    try {
        $query->execute();
        return [true];
    } catch (PDOException $e) {
        return [false, $e];
    }
}