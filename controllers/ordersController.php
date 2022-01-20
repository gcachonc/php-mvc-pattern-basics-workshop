<?php

require_once MODELS . "ordersModel.php";

$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}


if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}

function getOrdersById($id){

    $order = get($id["id"]);
if(sizeof($order)>0){
    require_once VIEWS."orders/order.php";
}else {
    $errorMsg = "This client has no orders jet";
    require_once VIEWS."error/error.php";
}
}


function newOrder($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $order = create($_POST);
        if ($order[0]) {
            header("Location: index.php?controller=orders&action=getOrdersById&id=".$_POST["CÓDIGOCLIENTE"]);
        } else {
            echo $order[1];
        }
    } else {
        $clients = getClients();
        $products = getProducts();
        require_once VIEWS . "/orders/newOrder.php";
    }
}

function deleteOrder($request)
{
    $action = $request["action"];
    $client = null;
    if (isset($request["id"])) {
        $client = delete($request["id"]);
        header("Location: index.php?controller=orders&action=getOrdersById&id=".$request["idCLiente"]);
    }
}