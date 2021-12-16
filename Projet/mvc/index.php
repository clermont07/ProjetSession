<?php
session_start();

// Setting internal encoding for string functions
mb_internal_encoding("UTF-8");

// Callback for autoloading controllers and models
function autoloadFunction($class)
{
	// Ends with the string "Controller" ?
    if (preg_match('/Controller$/', $class))	
        require("controllers/" . $class . ".php");
    else
        require("models/" . $class . ".php");
}

// Registers the callback
spl_autoload_register("autoloadFunction");

function chargerClasse($classe){
	require "./Class/".$classe . '.class.php'; // On inclut la classe
}

function connexion ($bdName){

	try{ 
		$db=new PDO("mysql:host=localhost;dbname=".$bdName."","root",""); 
	} 
	catch(PDOException $e){ 
		echo $e->getMessage(); 
	} 
	return $db;
}

spl_autoload_register('chargerClasse');

// Creating the router and processing parameters from the user's URL
$router = new RouterController();

$router->process(array($_SERVER['REQUEST_URI']));

// Rendering the view
$router->renderView();

