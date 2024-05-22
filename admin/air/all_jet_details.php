<div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text">
        <h2>All AIRCRAFTS DETAILS</h2>
    </span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="card-body">
            <div class="col-sm-12">
            <div class='float-right'>
                <a class="btn btn-primary" href="admin.php?page=allflight" role="button">Back</a>
            </div>
            <pre></pre>
                <div class="card card-success">
                    <div class="card-body">
                        <table id="example1" style="align-items: stretch;"
                            class="table table-hover w-100 table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Jet Id</th>
                                    <th>Jet Type </th>
                                    <th>Total Capacity</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql= "SELECT * FROM jet_details";
                                $res=mysqli_query($conn,$sql);
                                if ($res->num_rows < 1) echo "No Records Yet";
                                $sn = 1;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $jet_id=$row['jet_id'];
                                    $jet_type=$row['jet_type'];
                                    $total_capacity=$row['total_capacity'];
                                    $active=$row['active'];
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $jet_id ;?></td>
                                    <td><?php echo $jet_type ;?></td>
                                    <td><?php echo  $total_capacity;?></td>
                                    <td><?php echo $active ;?></td>
                                    
                                </tr>

                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>