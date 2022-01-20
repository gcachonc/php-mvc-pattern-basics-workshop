<?php

require_once MODELS . "productsModel.php";

$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}


if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}

/* ~~~ CONTROLLER FUNCTIONS ~~~ */

function getAllProducts()
{
    $products = get();
    if (isset($products)) {
        require_once VIEWS . "/products/productsDashboard.php";
    } else {
        error("There is a database error, try again.");
    }
}

function getProduct($request)
{
    $action = $request["action"];
    $product = null;
    if (isset($request["id"])) {
        $product = getById($request["id"]);
    }
    require_once VIEWS . "/products/product.php";
}

function createProduct($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $products = get();
        $lastProduct = end($products);
        $lastProductId = $lastProduct["CÓDIGOARTÍCULO"];
        $_POST["CÓDIGOARTÍCULO"] = $lastProductId+1 ;
        $product = create($_POST);

        if ($product[0]) {
            header("Location: index.php?controller=products&action=getAllProducts");
        } else {
            echo $product[1];
        }
    } else {
        require_once VIEWS . "/products/product.php";
    }
}

function updateClient($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {

        $client = update($_POST);

        if ($client[0]) {
            header("Location: index.php?controller=clients&action=getAllClients");
        } else {
            $client = $_POST;
            $error = "The data entered is incorrect, check that there is no other client with that email.";
            require_once VIEWS . "/clients/client.php";
        }
    } else {
        require_once VIEWS . "/clients/client.php";
    }
}

function deleteProduct($request)
{
    $action = $request["action"];
    $product = null;
    echo $request["id"];
    if (isset($request["id"])) {
        $product = delete($request["id"]);
        header("Location: index.php?controller=products&action=getAllProducts");
    }
}

function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
