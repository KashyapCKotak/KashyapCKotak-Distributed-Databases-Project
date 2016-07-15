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
                    <li>PROPERTY VIEW</li>
                </ul>
            </div>

            <?php 
                $user = "rems1";
                include "oci.php";
                $query = 'SELECT PROP_ID, NAME, PLOT_NO, LOCATION, LAND_MARK, STREET, CITY, STATE, PINCODE, AREA, PRICE, PHOTO, ADDN_INFO FROM property ORDER BY PROP_ID DESC';
                
                $stid = oci_parse($conn, $query);
                oci_execute($stid);
            ?>

            <div class="tables clearfix">
                <table class="datatable adm-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME<span class="order"></span></th>
                            <th>LANDMARK<span class="order"></span></th>
                            <th>PINCODE<span class="order"></span></th>
                            <th>ACTIONS<span class="order"></span></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php while($row = oci_fetch_assoc($stid)){ ?>
                        <tr>
                            <td><?php echo $row["PROP_ID"];?></td>
                            <td><p><?php echo $row["NAME"];?><br><span><?php echo $row["STREET"].", ".$row["CITY"];?></span></p>
                            </td>
                            <td><?php echo $row["LAND_MARK"];?></td>
                            <td><span class="date"><?php echo $row["PINCODE"];?></span></td>
                            <td>
                                <a href="data_update.php?id=<?php echo $row['PROP_ID'];?>" class="edit"><i class="fa fa-pencil"></i></a>
                                <a href="data_delete.php?id=<?php echo $row['PROP_ID'];?>" class="delete"><i class="fa fa-times"></i></a>
                            </td>
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