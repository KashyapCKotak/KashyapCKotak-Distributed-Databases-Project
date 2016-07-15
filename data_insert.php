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

                    $target_dir = "photos/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        echo "<div class='alerts'>
                                <div class='error'><p><strong>ERROR!</strong> ONLY JPG, JPEG or PNG FILES ARE ACCEPTED </p></div>
                            </div>";
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                            echo "<div class='alerts'>
                                    <div class='error'><p><strong>ERROR!</strong> THERE WAS A PROBLEM </p></div>
                                </div>";                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            $filename = basename( $_FILES["fileToUpload"]["name"]);
                            $user = "rems1";
                            include "oci.php";
                            $query = "SELECT MAX(PROP_ID) as maximum FROM property";
                            
                            $stid = oci_parse($conn, $query);
                            oci_execute($stid);
                            $row = oci_fetch_assoc($stid);

                            $prop_id = $row["MAXIMUM"] + 1;

                            $query = "INSERT INTO property (PROP_ID, NAME, PLOT_NO, LOCATION, LAND_MARK, STREET, CITY, STATE, PINCODE, AREA, PRICE, PHOTO, ADDN_INFO) VALUES ($prop_id, '$name', '$plot_no', '$location', '$landmark', '$street', '$city', '$state', '$pincode', '$area', $price, '$filename', '$description')";

                            $stid = oci_parse($conn, $query);
                            oci_execute($stid);

                            echo "<div class='alerts'>
                                    <div class='success'><p><strong>SUCCESS!</strong>PROPERTY INSERTED SUCCESFULLY</p></div>
                                </div>";
                        } else {
                            echo "<div class='alerts'>
                                    <div class='error'><p><strong>ERROR!</strong> THERE WAS A PROBLEM </p></div>
                                </div>";
                        }
                    }
                }
            ?>

            <form id="file-upload" class="upload" method="post" action="data_insert.php" enctype="multipart/form-data">
                <h3>INSERT FORM</h3>
                <div class="inner clearfix">
                    <fieldset class="error">
                        <label for="field1">NAME</label>
                        <div class="field">
                            <input type="text" placeholder="Name of the property" name="name">
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <fieldset class="error">
                        <label for="field1">PLOT NO.</label>
                        <div class="field">
                            <input type="text" placeholder="Plot Number" name="plot_no">
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <fieldset class="error">
                        <label for="field2">Location</label>
                        <div class="field">
                            <input type="text" placeholder="Location" name="location">
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <fieldset class="error">
                        <label for="field1">LANDMARK</label>
                        <div class="field">
                            <input type="text" placeholder="Landmark" name="landmark">
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <fieldset class="error">
                        <label for="field1">STREET</label>
                        <div class="field">
                            <input type="text" placeholder="Street" name="street">
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <fieldset class="error">
                        <label for="field1">CITY</label>
                        <div class="field">
                            <select class="chosen-select" data-placeholder="City" name="city">
                                <option value="0"></option>
                                <option value="thane">THANE</option>
                                <option value="dombivli">DOMBIVLI</option>
                            </select>
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <fieldset class="error">
                        <label for="field1">STATE</label>
                        <div class="field">
                            <input type="text" placeholder="State" name="state">
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <fieldset class="error">
                        <label for="field1">PINCODE</label>
                        <div class="field">
                            <input type="text" placeholder="Pincode" name="pincode">
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <fieldset class="error">
                        <label for="field1">AREA</label>
                        <div class="field">
                            <input type="text" placeholder="Area" name="area">
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <fieldset class="error">
                        <label for="field1">PRICE</label>
                        <div class="field">
                            <input type="text" placeholder="Price" name="price">
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <fieldset>
                        <label for="field7">IMAGE</label>
                        <div class="field clearfix">
                            <div id="profile-preview">
                                <img id="uploaded" src="images/avatar.png" /><br>
                            </div>
                            <input type="file" placeholder="Select file to upload" name="fileToUpload" name="fileToUpload" onchange="readURL(this);">
                        </div>
                    </fieldset>

                    <fieldset>
                        <label for="field13">DESCRIPTION</label>
                        <div class="field">
                            <textarea placeholder="Additional details of the property" name="description"></textarea>
                            <span class="error-alert">Please enter valid value</span>
                        </div>
                    </fieldset>

                    <input type="submit" value="SUBMIT" name="submit" class="right">
                </div>
            </form>
        </div>
    </div>

    <?php include('inc/footer.php'); ?>

</body>
</html>