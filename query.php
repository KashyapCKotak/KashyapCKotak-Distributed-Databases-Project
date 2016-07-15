<?php include('inc/head.php'); ?>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#uploaded')
                    .attr('src', e.target.result)
                    .width(auto)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<body>

    <?php include('inc/header.php'); ?>

    <div id="wrapper" class="clearfix expand">

        <?php include('inc/menu.php'); ?>

        <div id="content" class="right">

            <div class="breadcrumbs clearfix">
                <ul class="breadcrumbs left">
                    <li><a href="#">DISTRIBUTED DATABASE SYSTEM</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>MINI PROJECT</li>
                </ul>
            </div>

            <form id="file-upload" class="upload" method="post" action="" enctype="multipart/form-data">
                <h3>QUERY RESULT FORM</h3>
                    <fieldset class="error">
                        <label for="field1">USER</label>
                        <div class="field">
                            <select class="chosen-select" data-placeholder="USERS" name="user">
                                <option value="0"></option>
                                <option value="rems1">REMS1</option>
                                <option value="rems2">REMS2 - THANE</option>
                                <option value="rems3">REMS3 - DOMBIVLI</option>
                            </select>
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <fieldset>
                        <label for="field13">QUERY</label>
                        <div class="field">
                            <textarea placeholder="ENTER QUERY HERE" name="query" required></textarea>
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <input type="submit" value="SUBMIT" name="submit" class="right">
            </form>
            <p>
            <p>
            <center>
            <?php
                if(isset($_POST["submit"])){
                    $query = $_POST["query"];
                    $user = $_POST["user"];
                    echo "User: ". $user ."<p>Query: ".$query;
                    include "oci.php";
                    $stid = oci_parse($conn, $query);
                    oci_execute($stid);
                    print "<div class='tables clearfix'>
                            <table class='datatable' border='1'>";  

                    $ncols = oci_num_fields($stid);

                    echo "<thead>";
                    for ($i = 1; $i <= $ncols; $i++) {
                        $column_name  = oci_field_name($stid, $i);
                        echo "<td>$column_name</td>";
                    }
                    echo "</thead><tboby>";

                    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {  
                        print '<tr>';  
                        foreach ($row as $item) {  
                            print '<td>'.($item?htmlentities($item):' ').'</td>';  
                        }  
                    print '</tr>';  
                    }  
                    print '</tbody></table> </div>'; 
                }
            ?>
            </center>
        </div>
    </div>

    <?php include('inc/footer.php'); ?>

</body>
</html>