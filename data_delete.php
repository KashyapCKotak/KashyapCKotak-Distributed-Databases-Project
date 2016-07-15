<?php
	$user = "rems1";
    include "oci.php";

    $query = "DELETE FROM property where PROP_ID = ". $_GET["id"] ."";
    
    $stid = oci_parse($conn, $query);
    oci_execute($stid);

    header('Location: data_view.php');
?>