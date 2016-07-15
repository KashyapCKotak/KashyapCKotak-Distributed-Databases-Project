<?php include('inc/head.php'); ?>

<body>

    <?php include('inc/header.php'); ?>

    <div id="wrapper" class="clearfix expand">

        <?php include('inc/menu.php'); ?>

        <div id="content" class="right">

            <div class="breadcrumbs clearfix">
                <ul class="breadcrumbs left">
                    <li><a href="#">DDB MINI PROJECT</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>PROPERTY UPDATE</li>
                </ul>
                <a href="#" class="btn right"><i class="fa fa-caret-square-o-left"></i>EXPORT</a>
            </div>

            <?php 
                $user = "rems1";
                include "oci.php";
                $query = "SELECT PROP_ID, NAME, PLOT_NO, LOCATION, LAND_MARK, STREET, CITY, STATE, PINCODE, AREA, PRICE, PHOTO, ADDN_INFO FROM property WHERE PROP_ID = ". $_GET["id"] ." ";
                
                $stid = oci_parse($conn, $query);
                oci_execute($stid);
                $row = oci_fetch_assoc($stid);
            ?>

            <?php
                if(isset($_POST["submit"])){
                    $name = $_POST["name"];
                    $plot_no = $_POST["plot_no"];
                    $location = $_POST["location"];
                    $landmark = $_POST["landmark"];
                    $street = $_POST["street"];
                    $city = $_POST["city"];
                    $state = $_POST["state"];
                    $pincode = $_POST["pincode"];
                    $area = $_POST["area"];
                    $price = $_POST["price"];
                    $description = $_POST["description"];

                    $user = "rems1";
                    include "oci.php";
                    $query = "SELECT MAX(PROP_ID) as maximum FROM property";
                    
                    $stid = oci_parse($conn, $query);
                    oci_execute($stid);
                    $row = oci_fetch_assoc($stid);

                    $prop_id = $_GET["id"];

                    $query = "UPDATE property set NAME ='$name', PLOT_NO = '$plot_no', LOCATION = '$location',LAND_MARK = '$landmark', STREET = '$street',CITY = '$city',STATE = '$state',PINCODE = '$pincode',AREA = '$area',PRICE = $price,ADDN_INFO = '$description' WHERE PROP_ID = '$prop_id'";

                    $stid = oci_parse($conn, $query);
                    oci_execute($stid);

                    echo "<div class='alerts'>
                            <div class='success'><p><strong>SUCCESS!</strong>PROPERTY UPDATED SUCCESFULLY</p></div>
                        </div>";
                }
            ?>
            
            <div class="tables clearfix">
                <table style="margin: auto; width: 75%;" border="1">
                    <form action="" method="post"> 
                    <tbody>
                    <tr>
                        <td colspan="2"><img src="photos/<?php echo $row["PHOTO"]; ?>" /s>
                    </tr>
                    <tr>
                        <td>NAME:
                        <td><input type="text" value="<?php echo $row["NAME"]; ?>" name="name"></input>
                    </tr>
                    <tr>
                        <td>PLOT_NO:
                        <td><input type="text" value="<?php echo $row["PLOT_NO"]; ?>" name="plot_no"></input>
                    </tr>
                    <tr>
                        <td>LOCATION:
                        <td><input type="text" value="<?php echo $row["LOCATION"]; ?>" name="location"></input>
                    </tr>
                    <tr>
                        <td>LANDMARK:
                        <td><input type="text" value="<?php echo $row["LAND_MARK"]; ?>" name="landmark"></input>
                    </tr>
                    <tr>
                        <td>STREET:
                        <td><input type="text" value="<?php echo $row["STREET"]; ?>" name="street"></input>
                    </tr>
                    <tr>
                        <td>CITY:
                        <td><input type="text" value="<?php echo $row["CITY"]; ?>" name="city"></input>
                    </tr>

                    <tr>
                        <td>STATE:
                        <td><input type="text" value="<?php echo $row["STATE"]; ?>" name="state"></input>
                    </tr>
                    <tr>
                        <td>PINCODE:
                        <td><input type="text" value="<?php echo $row["PINCODE"]; ?>" name="pincode"></input>
                    </tr>
                    <tr>
                        <td>AREA:
                        <td><input type="text" value="<?php echo $row["AREA"]; ?>" name="area"></input>
                    </tr>
                    <tr>
                        <td>PRICE:
                        <td><input type="text" value="<?php echo $row["PRICE"]; ?>" name="price"></input>
                    </tr>
                    <tr>
                        <td>DESCRIPTION:
                        <td><input type="text" value="<?php echo $row["ADDN_INFO"]; ?>" name="description"></input>
                    </tr>
                    <tr>
                        <td colspan="2"><center><input type="submit" name="submit"></input></center>
                    </tr>
                    </tbody>
                    </form>
                </table>
            </div>
        </div>
    </div>

    <?php include('inc/footer.php'); ?>

</body>
</html>