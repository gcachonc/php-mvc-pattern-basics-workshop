<?php

require_once MODELS . "clientsModel.php";

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

function getAllClients()
{
    $clients = get();
    if (isset($clients)) {
        require_once VIEWS . "/clients/clientsDashboard.php";
    } else {
        error("There is a database error, try again.");
    }
}

function getClient($request)
{
    $action = $request["action"];
    $client = null;
    if (isset($request["id"])) {
        $client = getById($request["id"]);
    }
    require_once VIEWS . "/clients/client.php";
}

function createClient($request)
{
    $action = $request["action"];
    if (sizeof($_POST) > 0) {
        $clients = get();
        $lastClient = end($clients);
        $lastClientId = $lastClient["CÓDIGOCLIENTE"];
        $_POST["CÓDIGOCLIENTE"] = $lastClientId+1;
        $client = create($_POST);

        if ($client[0]) {
            header("Location: index.php?controller=clients&action=getAllClients");
        } else {
            echo $client[1];
        }
    } else {
        require_once VIEWS . "/clients/client.php";
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

function deleteClient($request)
{
    $action = $request["action"];
    $client = null;
    if (isset($request["id"])) {
        $client = delete($request["id"]);
        header("Location: index.php?controller=clients&action=getAllClients");
    }
}

function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
