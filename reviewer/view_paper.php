<?php include('reviewer_header.php') ?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET["id"];
}
?>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-11 col-12">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
          <div class="card-header">
            <h3 class="text-center text-secondary fw-bold">View Paper</h3>
          </div>
          <div class="card-body">
            <!-- <form action="paper_status.php" method="POST"> -->
            <div class="table-responsive">
              <table class="table table-bordered table-hover text-center">
                <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Paper Title</th>
                    <th>Paper Abstract</th>
                    <th>Paper Keywords </th>
                    <th>Paper Type </th>
                    <th>Authors Name </th>
                    <th>Authors Affiliation</th>
                    <th>Authors Designation</th>
                    <th>Authors Email</th>
                    <th>Manuscript PDF</th>
                    <th>Cover Letter</th>
                    <th>Manuscript Image </th>
                    <th>Supplimentary File</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // select paper information
                  $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status`=5 && `id`='$id'";
                  $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                  $serial_no = 1;
                  if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                    $row = mysqli_fetch_assoc($run_select_from_new_paper);
                  ?>
                  <tr>
                    <td>
                      <?php echo $serial_no; ?>
                    </td>
                    <td>
                      <?php echo $row['paper_title'] ?>
                    </td>
                    <td>
                      <?php echo $row['paper_abstract'] ?>
                    </td>
                    <td>
                      <?php echo $row['paper_keywords'] ?>
                    </td>
                    <td>
                      <?php echo $row['paper_type'] ?>
                    </td>
                    <td>
                      <?php echo $row['authors_name'] ?>
                    </td>
                    <td>
                      <?php echo $row['authors_affiliation'] ?>
                    </td>
                    <td>
                      <?php echo $row['authors_designation'] ?>
                    </td>
                    <td>
                      <?php echo $row['authors_email'] ?>
                    </td>
                    <td>
                      <a href="../author/document_for_manuscript/<?php echo $row['manuscript_pdf'] ?>">PDF</a>
                    </td>
                    <td>
                      <a href="../author/document_for_cover_letter/<?php echo $row['cover_letter_pdf'] ?>">PDF</a>
                    </td>
                    <td>
                      <img src="../author/image_for_paper/<?php echo $row['manuscript_image'] ?>" alt="Manuscript Image"
                        style="width: 50px">
                    </td>
                    <td>
                      <a
                        href="../author/document_for_supplimentary_file/<?php echo $row['supplimentary_file'] ?>">PDF</a>
                    </td>
                    <td class="bg-black text-light fw-bold">
                      <?php echo "Viewed Paper" ?>
                    </td>
                    <td>
                      <a href="on_review.php" class="btn btn-success text-white fw-bold">Back</a>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include('reviewer_footer.php') ?>