
<?php
	$user = "rems3";
	include "oci.php";
	$query = 'SELECT * FROM OWNER_DOMBIVLI ORDER BY OWNER_ID DESC';
	$stid = oci_parse($conn, $query);
	oci_execute($stid);
 	print '<table border="1">';  

 	$ncols = oci_num_fields($stid);

 	echo "<tr>";
	for ($i = 1; $i <= $ncols; $i++) {
	    $column_name  = oci_field_name($stid, $i);
	    echo "<th>$column_name</th>";
	}
	echo "</tr>";

   	while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {  
  		print '<tr>';  
    	foreach ($row as $item) {  
  			print '<td>'.($item?htmlentities($item):' ').'</td>';  
    	}  
    print '</tr>';  
   	}  
   	print '</table>'; 
?>