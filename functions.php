<?php

init();

function init()
{
    session_start();
    if( !isset( $_SESSION["olympics"])  ){
        $_SESSION["olympics"] = [];
        $_SESSION["id"] = 0;
    }
}

function edit(){
    foreach ($_SESSION["olympics"] as $athlete) {
        if($athlete["id"] == $_GET["id"]){
           return $athlete;
        }
     }
}

function store(){
    $athlete["id"] = $_SESSION["id"];
    $athlete["name"] = $_POST["name"];
    $athlete["surname"] = $_POST["surname"];
    $athlete["sport"] = $_POST["sport"];
    $athlete["country"] = $_POST["country"];
    $athlete["gender"] = $_POST["gender"];
    $athlete["victories"] = $_POST["victories"];

    $_SESSION["id"]++;
    
    $_SESSION["olympics"][] = $athlete;
}

function destroy(){
    foreach ($_SESSION["olympics"] as $key => $athlete) {
        if($athlete["id"] == $_POST["id"]){
         unset($_SESSION["olympics"][$key]);
         return;
        }
    }
}

function update(){
    foreach ($_SESSION["olympics"] as &$athlete) {
        if($athlete["id"] == $_POST["id"]){
         $athlete["name"] = $_POST["name"];
         $athlete["surname"] = $_POST["surname"];
         $athlete["sport"] = $_POST["sport"];
         $athlete["country"] = $_POST["country"];
         $athlete["gender"] = $_POST["gender"];
         $athlete["victories"] = $_POST["victories"];
        }  
    }
}

?>