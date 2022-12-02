<?php include('associative_editor_header.php') ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $update_qry = "UPDATE `new_paper` SET `paper_status`=3 WHERE `id`='$id'";
    $run_qry = mysqli_query($conn, $update_qry);
}
?>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="text-center text-secondary fw-bold">Assign Reviewer</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th width="50%">Paper Title</th>
                                    <th>Status</th>
                                    <th>Select</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // select paper information
                                $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = 3";
                                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                $serial_no = 1;
                                while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $serial_no; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['paper_title'] ?>
                                    </td>
                                    <td class="bg-dark text-light fw-bold">To Associative Editor</td>
                                    <td>
                                        <select class="form-control" name="select_reviewer" onchange="selectReviewer(this.value)">
                                            <option value="">Select Reviewer</option>
                                            <?php
                                    $select_qry = "SELECT `reviewer_name` FROM `reviewer_information`";
                                    $run_qry = mysqli_query($conn, $select_qry);
                                    if (mysqli_num_rows($run_qry) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($run_qry)) {
                                            ?>
                                            <option value="<?php echo $row1['reviewer_name']; ?>">
                                                <?php echo $row1['reviewer_name']; ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="paper_status.php?id=<?php echo $row['id'] ?>"
                                            class="btn btn-success text-light fw-bold">Assign</a>
                                    </td>
                                </tr>
                                <?php
                                    $serial_no++;
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
<script>
    function selectReviewer(str){
      const currentDate = new Date();
      document.cookie = `reviewer=${str}; expires=${new Date(currentDate.getTime() + (5 * 60 * 1000))}`;
  }
    </script>
    </body>
<?php include('associative_editor_footer.php') ?>