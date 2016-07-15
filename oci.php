<?php
if ($user == "rems1")
	$password = "rems1";
else if ($user == "rems2")
	$password = "rems2";
else if ($user == "rems3")
	$password = "rems3";

// Create connection to Oracle
$conn = oci_connect("$user", "$password", "//localhost/XE");

if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
?>