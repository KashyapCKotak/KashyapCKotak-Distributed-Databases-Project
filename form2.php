<?php
    //include "dbconnect.php";

   	if(isset($_POST["submit"])){
   		$action = $_POST["action"];
   		$from = $_POST["select_field"];
   		$selected = array();
   		$selected = $_POST["what"];
   		print_r($selected);
   		print_r(count($selected));
    }
?>