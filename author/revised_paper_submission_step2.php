<?php include('author_header.php') ?>
<!-- Start of prvious php form (new_paper_submission) submission -->
<?php
// jdi previous page er next page button ta click hoye thakle if condition full korbe other wise ager page e niye jabe. that means new_paper_submission er form submission chara ei page e asbe na.
if (isset($_SESSION['next_page']) && $_SESSION['next_page'] == 1) {
  $manuscript_pdf =$_SESSION['manuscript_pdf'];
  $cover_letter_pdf = $_SESSION['cover_letter_pdf'];
  $manuscript_image =  $_SESSION['manuscript_image'];
  $supplimentary_file = $_SESSION['supplimentary_file'];
  $paper_title = $_SESSION['paper_title'];
  $paper_keyword = $_SESSION['paper_keyword'];
  $paper_abstract = $_SESSION['paper_abstract'];
  $paper_type = $_SESSION['paper_type'];
  $input_field_name = $_SESSION['input_field_name'];
  $arr_name = explode(",", $input_field_name);
  foreach ($arr_name as $id => $value) {
    if($value==""){
      $input_field_name = $_SESSION['authors_name'];
    }
  else $input_field_name = $_SESSION['input_field_name'];
  }

  $input_field_affiliation = $_SESSION['input_field_affiliation'];
  $arr_affiliation = explode(",", $input_field_affiliation);
  foreach ($arr_affiliation as $id => $value) {
    if($value==""){
      $input_field_affiliation = $_SESSION['authors_affiliation'];
    }
  else $input_field_affiliation = $_SESSION['input_field_affiliation'];
  }

  $input_field_designation = $_SESSION['input_field_designation'];
  $arr_designation = explode(",", $input_field_designation);
  foreach ($arr_designation as $id => $value) {
    if($value==""){
      $input_field_designation = $_SESSION['authors_designation'];
    }
  else $input_field_designation = $_SESSION['input_field_designation'];
  }

  $input_field_email = $_SESSION['input_field_email'];
  $arr_email = explode(",", $input_field_email);
  foreach ($arr_email as $id => $value) {
    if($value==""){
      $input_field_email = $_SESSION['authors_email'];
    }
  else $input_field_email = $_SESSION['input_field_email'];
  }
}
?>
<!-- End of prvious php form (new_paper_submission) submission -->
<form action="" method="POST" enctype="multipart/form-data">
  <div class="container-fluid col-lg-10 col-12">
    <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
      <div class="card-header">
        <h3 class="text-center text-secondary fw-bold">Revised Paper Submission (<i>Step 2</i>)</h3>
      </div>
      <div class="card-body">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="mt-2">
                  <label for=""><b>Select Document For Manuscript: <span class="text-danger">*</span></b></label>
                  <p>Previous Document: <?php echo $manuscript_pdf ?></p>
                  <div class="input-group mt-2">
                    <br>
                    <input type="file" class="form-control" name="manuscript_pdf" accept="application/pdf"
                      id="manuscript_pdf" onchange="uploadManuscript()">
                  </div>
                </div>

                <!-- Start of table for manuscript -->
                <div class="col-lg-12 mt-2" style="display:none" id="table_for_manuscript">
                  <table class="table table-bordered">
                    <tr>
                      <th>Serial No:</th>
                      <td>1</td>
                    </tr>
                    <tr>
                      <th>Document Type:</th>
                      <td>Manuscript</td>
                    </tr>
                    <tr>
                      <th>File Size</th>
                      <td id="manuscript_file_size"></td>
                    </tr>
                  </table>
                </div>
                <!-- End of table for manuscript -->
                <p id="manuscript_pdf_error" class="text-warning bg-black text-center m-2 fw-bold "></p>

              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="mt-2">
                  <label for=""><b>Select Document For Cover Letter: <span class="text-danger">*</span></b></label>
                  <p>Previous Document: <?php echo $cover_letter_pdf ?></p>
                  <div class="input-group mt-2">
                    <br>
                    <input type="file" class="form-control" name="coverletter_pdf" accept="application/pdf"
                      id="coverletter_pdf" onchange="uploadCoverletter()">
                  </div>
                </div>

                <!-- Start of Cover Letter Table -->
                <div class="col-lg-12 mt-2" id="table_for_coverletter" style="display:none">
                  <table class="table table-bordered">
                    <tr>
                      <th>Serial No:</th>
                      <td>2</td>
                    </tr>
                    <tr>
                      <th>Document Type:</th>
                      <td>Cover Letter</td>
                    </tr>
                    <tr>
                      <th>File Size</th>
                      <td id="coverletter_file_size"></td>
                    </tr>
                  </table>
                </div>
                <!-- End of Cover Letter Table -->
                <p id="coverletter_pdf_error" class="text-warning bg-black text-center m-2 fw-bold ">
                </p>

              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="mt-2">
                  <label for=""><b>Select Image For Paper: </b></label>
                  <p>Previous Image: <?php echo $manuscript_image ?></p>
                  <div class="input-group mt-2">
                    <br>
                    <!-- image/* mane hocche jekono typer image select kora jabe -->
                    <input type="file" class="form-control" name="manuscript_image" accept="image/*"
                      id="manuscript_image" onchange="uploadManuscriptImage()">
                  </div>
                </div>

                <!-- table for image -->
                <div class="col-lg-12 mt-2" id="table_for_manuscript_image" style="display:none">
                  <table class="table table-bordered">
                    <tr>
                      <th>Serial No:</th>
                      <td>3</td>
                    </tr>
                    <tr>
                      <th>Document Type:</th>
                      <td>Image</td>
                    </tr>
                    <tr>
                      <th>File Size</th>
                      <td id="manuscript_image_file_size"></td>
                    </tr>
                  </table>

                </div>
                <p id="manuscript_image_error" class="text-warning bg-black text-center m-2 fw-bold ">
                </p>

                <!-- End of table for image -->
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="mt-2">
                  <label for=""><b>Select Document For Supplimentary File: <span
                        class="text-danger">*</span></b></label>
                  <p>Previous Document: <?php echo $supplimentary_file ?></p>
                  <div class="input-group mt-2">
                    <br>
                    <input type="file" class="form-control" name="supplimentary_file_pdf"
                      accept="application/pdf" id="supplimentary_file_pdf" onchange="uploadSupplimentaryFile()">
                  </div>
                </div>

                <!-- table for supplimentary Files -->
                <div class="col-lg-12 mt-2" id="table_for_supplimentary_file" style="display:none">
                  <table class="table table-bordered">
                    <tr>
                      <th>Serial No:</th>
                      <td>4</td>
                    </tr>
                    <tr>
                      <th>Document Type:</th>
                      <td>Supplimentary File</td>
                    </tr>
                    <tr>
                      <th>File Size</th>
                      <td id="supplimentaryFile_file_size"></td>
                    </tr>
                  </table>
                </div>
                <!-- End of table for supplimentary Files -->
                <p id="supplimentary_file_pdf_error" class="text-warning bg-black text-center m-2 fw-bold "></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-4 col-12">
            <div class="mt-3">
              <input type="submit" name="submit" class="form-control btn btn-success fw-bold" value="Submit Paper">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  function uploadManuscript() {
    document.getElementById("table_for_manuscript").style = "display: block";
    let file_size = document.getElementById("manuscript_pdf").files[0].size;
    document.getElementById("manuscript_file_size").innerHTML = file_size + " bytes";

  }

  function uploadCoverletter() {
    document.getElementById("table_for_coverletter").style = "display: block";
    let file_size_cover_letter = document.getElementById("coverletter_pdf").files[0].size;
    document.getElementById("coverletter_file_size").innerHTML = file_size_cover_letter + " bytes";

  }

  function uploadManuscriptImage() {
    document.getElementById("table_for_manuscript_image").style = "display: block";
    let file_size = document.getElementById("manuscript_image").files[0].size;
    document.getElementById("manuscript_image_file_size").innerHTML = file_size + " bytes";

  }

  function uploadSupplimentaryFile() {
    document.getElementById("table_for_supplimentary_file").style = "display: block";
    let file_size = document.getElementById("supplimentary_file_pdf").files[0].size;
    document.getElementById("supplimentaryFile_file_size").innerHTML = file_size + " bytes";

  }
</script>
<?php
if (isset($_POST['submit'])) {
  $manuscript_pdf_file_name = $_FILES['manuscript_pdf']['name'];
  $cover_letter_pdf_file_name = $_FILES['coverletter_pdf']['name'];
  $supplimentary_pdf_file_name = $_FILES['supplimentary_file_pdf']['name'];

  $manuscript_pdf_file_name = time() . ".pdf";
  $cover_letter_pdf_file_name = time() . ".pdf";
  $supplimentary_pdf_file_name = time() . ".pdf";

  $manuscript_pdf_file_type = $_FILES['manuscript_pdf']['type'];
  $cover_letter_pdf_file_type = $_FILES['coverletter_pdf']['type'];
  $supplimentary_pdf_file_type = $_FILES['supplimentary_file_pdf']['type'];

  // prothome empty thakbe karon jdi image select na kora hoy tkhn empty hisabe jabe.
  $manuscript_image_extn = "";

  $count_error = 0;
  if (empty($manuscript_pdf_file_name) && $manuscript_pdf_file_type != "application/pdf") {
?>
<script>
  document.getElementById("mauscript_pdf_error").innerHTML = "File Type Must Be PDF";
</script>
<?php
    $count_error++;
  }
  if (empty($cover_letter_pdf_file_name) && $cover_letter_pdf_file_type != "application/pdf") {
?>
<script>
  document.getElementById("coverletter_pdf_error").innerHTML = "File Type Must Be PDF";
</script>
<?php
    $count_error++;

  }
  if (empty($supplimentary_pdf_file_name) && $supplimentary_pdf_file_type != "application/pdf") {
?>
<script>
  document.getElementById("supplimentary_pdf_error").innerHTML = "File Type Must Be PDF";
</script>
<?php
    $count_error++;
  }

  // image validation
  // jdi empty na thake ebong file type jpeg/jpg/png hoy tahole if kaj korbe 
  // jdi prothom if file type match na korar karone fail kore tahole else if condition true hobe ebong error show korbe.
  if (!empty($_FILES['manuscript_image']['name']) && $_FILES['manuscript_image']['type'] == "image/jpeg" || $_FILES['manuscript_image']['type'] == "image/jpg" || $_FILES['manuscript_image']['type'] == "image/png") {
    $manuscript_image_file_name = $_FILES['manuscript_image']['name'];
    // from this line i get the extension
    $manuscript_image_extn = pathinfo($_FILES['manuscript_image']['name'], PATHINFO_EXTENSION);

    $manuscript_image_file_name = time() . "." . $manuscript_image_extn;
  } else if (!empty($_FILES['manuscript_image']['name'])) {
?>
<script>
  document.getElementById("manuscript_image_error").innerHTML = "Image Type Must Be jpeg/jpg/png !!";
</script>
<?php
    $count_error++;
  } else {
    $manuscript_image_file_name = "";
  }
  if ($count_error > 0) {
    exit();
  } else {
    $id = $_SESSION['id'];
    // paper_status = 1 mane hocche paper paper ta matro submit hoyse.
    $insert_qry = "UPDATE `new_paper` SET `author_id`='$_SESSION[author_id]', `paper_title`='$paper_title', `paper_abstract`='$paper_abstract', `paper_keywords`='$paper_keyword', `paper_type`='$paper_type', `authors_name`='$input_field_name', `authors_affiliation`='$input_field_affiliation', `authors_designation`='$input_field_designation', `authors_email`='$input_field_email', `manuscript_pdf`='$manuscript_pdf_file_name', `cover_letter_pdf`='$cover_letter_pdf_file_name', `manuscript_image`='$manuscript_image_file_name', `supplimentary_file`='$supplimentary_pdf_file_name', `paper_status`='10' WHERE `id`='$id'";

    $run_insert_qry = mysqli_query($conn, $insert_qry);
    if ($run_insert_qry) {
      move_uploaded_file($_FILES['manuscript_pdf']['tmp_name'], 'document_for_manuscript/' . $manuscript_pdf_file_name);
      move_uploaded_file($_FILES['coverletter_pdf']['tmp_name'], 'document_for_cover_letter/' . $cover_letter_pdf_file_name);
      move_uploaded_file($_FILES['supplimentary_file_pdf']['tmp_name'], 'document_for_supplimentary_file/' . $supplimentary_pdf_file_name);
      move_uploaded_file($_FILES['manuscript_image']['tmp_name'], 'image_for_paper/' . $manuscript_image_file_name);

       // mail sending
       require 'phpmailer/PHPMailerAutoload.php';
       $mail = new PHPMailer;
       $sender_email = 'nazruljournal@gmail.com';
       $sender_pass = 'xtvxnhzkczbybjff';

       $receiver = $_SESSION['author_email'];
       $mail->isSMTP(); // for localhost use enable this line otherwise don't use it
       $mail->Host = 'smtp.gmail.com';
       $mail->Port = 587;
       $mail->SMTPAuth = true;
       $mail->SMTPSecure = 'tls';

       $mail->Username = $sender_email; // Sender Email Id
       $mail->Password = $sender_pass; // password of gmail

       $mail->setFrom($sender_email, 'JKKNIU');

       $mail->addAddress($receiver); // Receiver Email Address
       $mail->addReplyTo($sender_email);

       $mail->isHTML(true);
       $mail->Subject = "New Paper Submission";
       $mail->Body = '<h5>Dear Sir/Madam, <br />You have successfully updated your paper. Please check your paper status. <br /> <br /> Best Regards, JKKNIU Journal Organization</h5>';
       if ($mail->send()) {
           $mail->ClearAddresses();
           $mail->clearReplyTos();
           // mail_sent = 1 kore dilam er mane mail sent hoyse.
           $mail_sent = 1;
       } else {
           echo "<h5>Mail is not sent yet</h5>";
       }
?>
<script>
  // window.alert("Your Paper Has Successfully Submitted and a Mail is successfully sent to your email");
  window.location = "paper_status.php";
</script>
<?php
    }
  }
}
?>
<?php include('author_footer.php') ?>