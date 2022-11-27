<?php include('main_editor_header.php') ?>
<?php
// if (isset($_POST['invite'])) {
//     //     extract($_POST);
// //     echo "<pre>";
// //     print_r($_POST);
//     $select_associative_editor = $_POST['select_associative_editor'];
//     echo $select_associative_editor;
// }
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $update_qry = "UPDATE `new_paper` SET `paper_status`=2 WHERE `id`='$id'";
    $run_qry = mysqli_query($conn, $update_qry);
}
// if ($update_qry) {
//     //mail sending
//     require 'phpmailer/PHPMailerAutoload.php';
//     $mail = new PHPMailer;
//     $sender_email = $_SESSION['main_editor_email'];
//     $sender_pass = 'ekscqyeqxszuxftq';
//     $mail->isSMTP(); // for localhost use enable this line otherwise don't use it
//     $mail->Host = 'smtp.gmail.com';
//     $mail->Port = 587;
//     $mail->SMTPAuth = true;
//     $mail->SMTPSecure = 'tls';

//     $mail->Username = $sender_email; // Sender Email Id
//     $mail->Password = $sender_pass; // password of gmail

//     $mail->setFrom($sender_email, 'MAIN EDITOR');

//     $mail->addAddress($_SESSION['associative_editor_email']);
//     $mail->addReplyTo($sender_email);

//     $mail->isHTML(true);
//     $mail->Subject = "Newly Submitted Papers";
//     $mail->Body = '<h5>Dear Sir/Madam, <br />You are requested to check our invited papers. Please check those papers. <br /> <br /> Best Regards, MAIN EDITOR</h5>';
//     if ($mail->send()) {
//         $mail->ClearAddresses();
//         $mail->clearReplyTos();
//         // mail_sent = 1 kore dilam er mane mail sent hoyse.
//         $mail_sent = 1;
//     } else {
//         echo "<h5>Mail is not sent yet</h5>";
//     }
// }
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
                                    <th>Submission Date</th>
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
                                    <td>
                                        <?php echo date('d-M-Y', strtotime($row['timestamps'])) ?>
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