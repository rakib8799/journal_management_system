<?php include('main_editor_header.php') ?>
<?php
if (isset($_GET["id"])) {
    $_SESSION['associative_editor'] = $_COOKIE['associative_editor'];
    $associative = $_SESSION['associative_editor'];
    $select_qry = "SELECT * FROM `associative_editor_information` WHERE `associative_editor_name` = '$associative'";
    $run_qry = mysqli_query($conn, $select_qry);
    if (mysqli_num_rows($run_qry) > 0) {
        $row = mysqli_fetch_assoc($run_qry);
        $_SESSION['associative_editor_email'] = $row['associative_editor_email'];
        $associative_id = $row['id'];

    $id = $_GET["id"];
    $update_qry = "UPDATE `new_paper` SET `paper_status`=2 WHERE `id`='$id'";
    mysqli_query($conn, $update_qry);

    $insert_qry = "UPDATE `new_paper` SET `associative_editor_id`='$associative_id' WHERE `id`='$id'";
    mysqli_query($conn, $insert_qry);

     // mail sending
     require 'phpmailer/PHPMailerAutoload.php';
     $mail = new PHPMailer;
     $sender_email = 'nazruljournal@gmail.com';
     $sender_pass = 'xtvxnhzkczbybjff';

     $receiver = $_SESSION['associative_editor_email'];
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
     $mail->Subject = "Paper Invitation";
     $mail->Body = '<h5>Dear Sir/Madam, <br />You have successfully invited by the main editor. Please check your paper status. <br /> <br /> Best Regards, JKKNIU Journal Organization</h5>';
     if ($mail->send()) {
         $mail->ClearAddresses();
         $mail->clearReplyTos();
         // mail_sent = 1 kore dilam er mane mail sent hoyse.
         $mail_sent = 1;
         ?>
        <script>
            window.alert("Your Paper Has Successfully sent to the specific Associative Editor's email");
        </script>
        <?php
     } else {
         echo "<h5>Mail is not sent yet</h5>";
     }
}
}
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="text-center text-secondary fw-bold">Paper Status</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th width="50%">Paper Title</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // select paper information
                                $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = 2";
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
                                    <td class="bg-black text-light fw-bold">
                                        <?php echo "Invited" ?>
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
<?php include('main_editor_footer.php') ?>