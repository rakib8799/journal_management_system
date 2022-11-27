<?php include('main_editor_header.php') ?>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-11 col-12">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
          <div class="card-header">
            <h3 class="text-center text-secondary fw-bold">New Submitted Papers</h3>
          </div>
          <div class="card-body">
            <form action="paper_status.php" method="POST">
              <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                  <thead>
                    <tr>
                      <th>Serial No</th>
                      <th width="42%">Paper Title</th>
                      <th>Status</th>
                      <th>Select</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // select paper information
                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status`=1";
                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                    $serial_no = 1;
                    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                      while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                    ?>
                    <tr>
                      <td>
                        <?php echo $serial_no; ?>
                      </td>
                      <td>
                        <?php echo $row['paper_title'] ?>
                      </td>
                      <td class="bg-black text-light fw-bold">
                        <?php echo "Recently Submitted" ?>
                      </td>
                      <td>
                        <select class="form-control" name="select_associative_editor">
                          <option value="">Select Associative Editors</option>
                          <?php
                        $select_qry = "SELECT * FROM `associative_editor_information`";
                        $run_qry = mysqli_query($conn, $select_qry);
                        if (mysqli_num_rows($run_qry) > 0) {
                          while ($row1 = mysqli_fetch_assoc($run_qry)) {
                          ?>
                          <option value="<?php echo $row1['associative_editor_name']; ?>">
                            <?php echo $row1['associative_editor_name']; ?>
                          </option>
                          <?php
                          }
                        }
                          ?>
                        </select>
                      </td>
                      <td>
                        <!-- <input type="submit" class="btn btn-danger text-light fw-bold" name="invite"> -->
                        <!-- <button onclick="changeSelect()" class="btn btn-danger text-light fw-bold nav-link">Invite</a> -->
                        <a href="paper_status.php?id=<?php echo $row['id'] ?>"
                          class="btn btn-danger text-light fw-bold">Invite</a>
                      </td>
                    </tr>
                    <?php
                        $serial_no++;
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include('main_editor_footer.php') ?>