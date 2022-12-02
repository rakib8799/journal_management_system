<?php include('author_header.php') ?>
<?php
$select_qry2 = "SELECT * FROM `new_paper`  WHERE `paper_status`=1";
$run_qry2 = mysqli_query($conn, $select_qry2);
if (mysqli_num_rows($run_qry2)) {
    // mail sending
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $sender_email = $_SESSION['author_email'];
    $sender_pass = 'iakuehmmdomricuc';

    $select_qry1 = "SELECT `main_editor_email` FROM `main_editor_information`";
    $run_qry1 = mysqli_query($conn, $select_qry1);
    if (mysqli_num_rows($run_qry1) > 0) {
        $row = mysqli_fetch_assoc($run_qry1);
        $_SESSION['main_editor_email'] = $row['main_editor_email'];
        $mail->addAddress($_SESSION['main_editor_email']);
    }

    $arr = [];
    $select_qry2 = "SELECT `associative_editor_email` FROM `associative_editor_information`";
    $run_qry2 = mysqli_query($conn, $select_qry2);
    if (mysqli_num_rows($run_qry2) > 0) {
        while ($row = mysqli_fetch_assoc($run_qry2)) {
            array_push($arr, $row['associative_editor_email']);
        }
        $_SESSION['associative_editor_email'] = $arr;
    }

    // $receiver = $_SESSION['main_editor_email'];
    if (count($_SESSION['associative_editor_email']) > 0) {
        $values = [];
        foreach ($_SESSION['associative_editor_email'] as $id => $value) {
            // Get data for this product
            // $values = $values . $value . ",";
            // array_push($values, $value);
            // $address = array($_SESSION['main_editor_email'], $value);
            // print_r($value);
            $mail->addAddress($value); // Receiver Email Address
        }
        // $address = array($_SESSION['main_editor_email'], $values);
        // print_r($address);
    }

    $mail->isSMTP(); // for localhost use enable this line otherwise don't use it
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = $sender_email; // Sender Email Id
    $mail->Password = $sender_pass; // password of gmail

    $mail->setFrom($sender_email, 'AUTHOR');

    // $values1 = [];
// foreach ($address as $id => $value) {
//     // array_push($values1, $value);
//     // $mail->addAddress($value);
//     // $address = array($_SESSION['main_editor_email'], $value);
//     print_r($value);
// }
// $receiver = implode(",", $values1);
// $mail->addAddress($receiver); // Multiple Receiver Email Address

    // $mail->addAddress($receiver); // Receiver Email Address
    $mail->addReplyTo($sender_email);

    $mail->isHTML(true);
    $mail->Subject = "Newly Submitted Papers";
    $mail->Body = '<h5>Dear Sir/Madam, <br />You are requested to check our newly submitted papers. Please check those papers. <br /> <br /> Best Regards, AUTHOR</h5>';
    if ($mail->send()) {
        $mail->ClearAddresses();
        $mail->clearReplyTos();
        // mail_sent = 1 kore dilam er mane mail sent hoyse.
        $mail_sent = 1;
    } else {
        echo "<h5>Mail is not sent yet</h5>";
    }
}
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="text-center text-secondary fw-bold">Paper Status</h3>
                    <!-- <p>Send newly submitted papers to all editors</p>
                    <form action="" method="post">
                        <input type="submit" value="Send" name="send_email" class="btn btn-danger text-light fw-bold">
                    </form> -->
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
                                $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `author_id` = '$_SESSION[author_id]'";
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
                                    <?php
                                    if ($row['paper_status'] == 1) {
                                    ?>
                                    <td class="bg-black text-light fw-bold">
                                        <?php echo "Submitted To Main and Associative Editor" ?>
                                    </td>
                                    <?php
                                    }
                                    else if ($row['paper_status'] == 2) {
                                        ?>
                                        <td class="bg-black text-light fw-bold">
                                            <?php echo "Invited To Associative Editor" ?>
                                        </td>
                                        <?php
                                        }
                                        else if ($row['paper_status'] == 3) {
                                            ?>
                                            <td class="bg-black text-light fw-bold">
                                                <?php echo "To Associative Editor" ?>
                                            </td>
                                            <?php
                                            }
                                            else if ($row['paper_status'] == 4) {
                                                ?>
                                                <td class="bg-black text-light fw-bold">
                                                    <?php echo "Assigned To Reviewer" ?>
                                                </td>
                                                <?php
                                                }
                                                else if ($row['paper_status'] == 5) {
                                                    ?>
                                                    <td class="bg-black text-light fw-bold">
                                                        <?php echo "Ready To Review" ?>
                                                    </td>
                                                    <?php
                                                    }
                                                    else if ($row['paper_status'] == 6) {
                                                        ?>
                                                        <td class="bg-black text-light fw-bold">
                                                            <?php echo "Completed" ?>
                                                        </td>
                                                        <?php
                                                        }
                                                        else if ($row['paper_status'] == 7) {
                                                            ?>
                                                            <td class="bg-black text-light fw-bold">
                                                                <?php echo "Rejected" ?>
                                                            </td>
                                                            <?php
                                                            }
                                                            else if ($row['paper_status'] == 8) {
                                                                ?>
                                                                <td class="bg-black text-light fw-bold">
                                                                    <?php echo "Need Changes" ?>
                                                                </td>
                                                                <?php
                                                                }
                                                                else if ($row['paper_status'] == 9) {
                                                                    ?>
                                                                    <td class="bg-black text-light fw-bold">
                                                                        <?php echo "Submitted To Author" ?>
                                                                    </td>
                                                                    <?php
                                                                    }
                                                                    else if ($row['paper_status'] == 10) {
                                                                        ?>
                                                                        <td class="bg-black text-light fw-bold">
                                                                            <?php echo "Successfully Updated" ?>
                                                                        </td>
                                                                        <?php
                                                                        }
                                    ?>
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
<?php include('author_footer.php') ?>