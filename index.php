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
                    <li>DASHBOARD</li>
                </ul>
            </div>

            <?php 
                $user = "rems1";
                include "oci.php";
                $query = 'SELECT count(prop_id) as no_of_property FROM property';
                $stid = oci_parse($conn, $query);
                oci_execute($stid);
                $row = oci_fetch_assoc($stid);
                
                $query1 = 'SELECT count(owner_id) as no_of_sellers FROM owner';
                $stid1 = oci_parse($conn, $query1);
                oci_execute($stid1);
                $row1 = oci_fetch_assoc($stid1);

                $query2 = 'SELECT count(cust_id) as no_of_buyers FROM customer';
                $stid2 = oci_parse($conn, $query2);
                oci_execute($stid2);
                $row2 = oci_fetch_assoc($stid2);
                
                $users = $row1["NO_OF_SELLERS"] + $row2["NO_OF_BUYERS"];
            ?>

            <div class="circle-stats">
                <div class="fake-table">DDB MINI PROJECT
                    <div class="fake-table-cell">
                        <div class="circle red">
                            <div class="fake-table">
                                <div class="fake-table-cell">
                                    <p class="counter"><?php echo $users; ?></p>
                                    <span>USERS</span>
                                </div>
                            </div>
                        </div>
                        <div class="circle yellow">
                            <div class="fake-table">
                                <div class="fake-table-cell">
                                    <p class="counter"><?php echo $row1["NO_OF_SELLERS"]; ?></p>
                                    <span>SELLERS</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="circle blue">
                            <div class="fake-table">
                                <div class="fake-table-cell">
                                    <p class="counter"><?php echo $row2["NO_OF_BUYERS"]; ?></p>
                                    <span>BUYERS</span>
                                </div>
                            </div>
                        </div>
                        <div class="circle green">
                            <div class="fake-table">
                                <div class="fake-table-cell">
                                    <p class="counter"><?php echo $row["NO_OF_PROPERTY"]; ?></p>
                                    <span>PROPERTIES</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcrumbs clearfix">
                <ul class="breadcrumbs left">
                    <li>USERS IN DOMBIVLI</li>
                </ul>
            </div>

            <?php 
                $user = "rems3";
                include "oci.php";
                $query = 'SELECT OWNER_ID, NAME, PINCODE, STREET, CITY, PHONE_NO, EMAIL FROM OWNER_DOMBIVLI ORDER BY OWNER_ID DESC';
                $stid = oci_parse($conn, $query);
                oci_execute($stid);
            ?>

            <div class="tables clearfix">
                <table class="datatable adm-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME<span class="order"></span></th>
                            <th>PINCODE<span class="order"></span></th>
                            <th>CONTACT<span class="order"></span></th>
                            <th>EMAIL<span class="order"></span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = oci_fetch_assoc($stid)) { ?>

                        <tr>
                            <td><?php echo $row["OWNER_ID"]; ?></td>
                            <td>
                                <p><?php echo $row["NAME"]; ?><br><span><?php echo $row["STREET"] . ", " . $row["CITY"]; ?></span></p>
                            </td>
                            <td><?php echo $row["PINCODE"]; ?></td>
                            <td><?php echo $row["PHONE_NO"]; ?></td>
                            <td><?php echo $row["EMAIL"] . "@gmail.com"; ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="breadcrumbs clearfix">
                <ul class="breadcrumbs left">
                    <li>USERS IN THANE</li>
                </ul>
            </div>

            <?php 
                $user = "rems2";
                include "oci.php";
                $query = 'SELECT OWNER_ID, NAME, PINCODE, STREET, CITY, PHONE_NO, EMAIL FROM OWNER_THANE ORDER BY OWNER_ID DESC';
                $stid = oci_parse($conn, $query);
                oci_execute($stid);
            ?>

            <div class="tables clearfix">
                <table class="datatable adm-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME<span class="order"></span></th>
                            <th>PINCODE<span class="order"></span></th>
                            <th>CONTACT<span class="order"></span></th>
                            <th>EMAIL<span class="order"></span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = oci_fetch_assoc($stid)) { ?>

                        <tr>
                            <td><?php echo $row["OWNER_ID"]; ?></td>
                            <td>
                                <p><?php echo $row["NAME"]; ?><br><span><?php echo $row["STREET"] . ", " . $row["CITY"]; ?></span></p>
                            </td>
                            <td><?php echo $row["PINCODE"]; ?></td>
                            <td><?php echo $row["PHONE_NO"]; ?></td>
                            <td><?php echo $row["EMAIL"] . "@gmail.com"; ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    <?php include('inc/footer.php'); ?>

</body>
</html>