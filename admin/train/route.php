<div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text">Route</span>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        All Routes</h3>
                    <div class='float-right'>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                            Add New Route &#128645;
                        </button>
                    </div>

                    <div class="card-body">

                        <table id="example1" style="align-items: stretch;"
                            class="table table-hover w-100 table-bordered table-striped<?php //
                                                                                                                                        ?>">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $row = $conn->query("SELECT * FROM troute");
                                    if ($row->num_rows < 1) echo "No Records Yet";
                                    $sn = 0;
                                    while ($fetch = $row->fetch_assoc()) {
                                        $id = $fetch['id'];
                                    ?>
                                <tr>
                                    <td><?php echo ++$sn; ?></td>
                                    <td><?php echo $fetch['start']; ?></td>
                                    <td><?php echo $fetch['stop'];

                                            $fullname = $fetch['start'] . " to " . $fetch['stop']; ?></td>
                                    <td>
                                        <form method="POST">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#edit<?php echo $id ?>">
                                                Edit
                                            </button> -

                                            <input type="hidden" class="form-control" name="del_train"
                                                value="<?php echo $id ?>" required id="">
                                            <button type="submit" onclick="return confirm('Are you sure about this?')"
                                                class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit<?php echo $id ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Editing <?php echo $fullname;


                                                                                    ?> &#128642;</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">

                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <input type="hidden" class="form-control" name="id"
                                                        value="<?php echo $id ?>" required id="">
                                                    <p>From : <input type="text" class="form-control"
                                                            value="<?php echo $fetch['start'] ?>" name="start" required
                                                            id="">
                                                    </p>
                                                    <p> To : <input type="text" class="form-control"
                                                            value="<?php echo $fetch['stop'] ?>" name="stop" required
                                                            id="">
                                                    </p>
                                                    <p>

                                                        <input class="btn btn-info" type="submit" value="Edit Route"
                                                            name='edit'>
                                                    </p>
                                                </form>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-info"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
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
</div>



<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">



    <div class="modal-dialog modal-lg">
        <div class="modal-content" align="center">
            <div class="modal-header">
                <h4 class="modal-title">Add New Route &#128649;
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <table class="table table-bordered">

                        <tr>
                            <th>From</th>
                            <td><input type="text" class="form-control" name="start" required id=""></td>
                        </tr>
                        <tr>
                            <th>To</th>
                            <td><input type="text" class="form-control" name="stop" required id="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">

                                <input class="btn btn-info" type="submit" value="Add Route" name='submit'>
                            </td>
                        </tr>
                    </table>
                </form>



            </div>

        </div>
        <!-- /.modal-content -->
    </div>
</div>


<?php

if (isset($_POST['submit'])) {
    $start = $_POST['start'];
    $stop = $_POST['stop'];
    if (!isset($stop, $start)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();

        $ins = $conn->prepare("INSERT INTO troute (start,stop) VALUES (?,?)");
        $ins->bind_param("ss", $start, $stop);
        $ins->execute();
        alert("Route Added!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}

if (isset($_POST['edit'])) {
    $start = $_POST['start'];
    $stop = $_POST['stop'];
    $id = $_POST['id'];
    if (!isset($start, $stop)) {
        alert("Fill Form Properly!");
    } else {
        $conn = connect();
        $ins = $conn->prepare("UPDATE troute SET start = ?, stop = ? WHERE id = ?");
        $ins->bind_param("ssi", $start, $stop, $id);
        $ins->execute();
        alert("Route Modified!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}

if (isset($_POST['del_train'])) {
    $con = connect();
    $conn = $con->query("DELETE FROM troute WHERE id = '" . $_POST['del_train'] . "'");
    if ($con->affected_rows < 1) {
        alert("Route Could Not Be Deleted. This Route Has Been Tied To Another Data!");
        load($_SERVER['PHP_SELF'] . "$me");
    } else {
        alert("Route Deleted!");
        load($_SERVER['PHP_SELF'] . "$me");
    }
}
function alert($msg)
{
    echo "<script>alert('$msg')</script>";
}

function load($link)
{
    echo "<script>window.location = ('$link')</script>";
}
?>