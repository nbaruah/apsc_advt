<?php

use App\Libraries\PostFormNames;
use App\Libraries\TestForm as formUtils;

$session = session();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= esc($title) ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ############### SWEET ALERT CDN and CSS ############### -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .swal-button {
            padding: 7px 19px;
            border-radius: 2px;
            background-color: #28a745;
            font-size: 12px;
            border: 1px solid #28a745;
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
        }
    </style>

</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="container">
        <img src="<?= base_url('header.jpg') ?>" alt="APSC Letter Head" class="w-75 mx-auto d-block shadow-sm mb-4">
        <div class="card bg-light text-dark w-75" style="margin: auto;">
            <h5 class="card-header bg-secondary text-white text-center">Register <?= esc($test_type) ?> Test Notification Details</h5>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm mb-4">
                    <tbody>
                        <tr>
                            <th>Post</th>
                            <td><?= $post_details[PostFormNames::postName()] ?></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td><?= $post_details[PostFormNames::depttName()] ?></td>
                        </tr>
                        <tr>
                            <th>Advt. No.</th>
                            <td><?= $post_details[PostFormNames::AdvtIDName()] ?></td>
                        </tr>
                        <tr>
                            <th>Dealing Assistant</th>
                            <td><?= $post_details[PostFormNames::dealingAsttName()] ?></td>
                        </tr>
                        <tr>
                            <th>Current Status</th>
                            <td><span class="bg-primary p-1 text-white rounded"><?= $post_details[PostFormNames::statusName()] ?></span></td>
                        </tr>
                    </tbody>
                </table>

                <!-- ########### TEST DETAILS FORM ################## -->
                <?= form_open("/post/create_test") ?>
                <?= csrf_field() ?>
                <input type="hidden" name="<?= formUtils::post_id_name() ?>" value="<?= $post_details[PostFormNames::PostIDName()] ?>">

                <div class="form-group">
                    <label for="test_type" class="font-weight-bold">Test type (OMR/Written/Interview) <span class="text-danger">*</span></label>
                    <input type="text" name="<?= formUtils::test_type_name() ?>" id="test_type" value="<?= esc($test_type) ?>" class="form-control form-control-sm w-50" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="notif_link" class="font-weight-bold">Notification Link from Official Website <span class="text-danger">*</span></label>
                        <input type="text" name="<?= formUtils::notif_link_name() ?>" id="notif_link" value="<?= set_value(formUtils::notif_link_name()) ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtils::notif_link_name()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="notif_no" class="font-weight-bold">Published Notification No. <span class="text-danger">*</span></label>
                        <input type="text" name="<?= formUtils::notif_no_name() ?>" id="notif_no" value="<?= set_value(formUtils::notif_no_name()) ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtils::notif_no_name()) . '</span>' ?>
                    </div>
                    <div class="form-group col">
                        <label for="publish_date" class="font-weight-bold">Notification Published Date <span class="text-danger">*</span></label>
                        <input type="text" name="<?= formUtils::notif_date_name() ?>" id="publish_date" value="<?= set_value(formUtils::notif_date_name()) ?>" class="form-control form-control-sm" placeholder="DD-MM-YYYY">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtils::notif_date_name()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="test_dates" class="font-weight-bold pb-2">Scheduled Test Date(s) <span class="text-danger">* &nbsp;</span></label>
                        <input id="add-date" class="btn btn-info btn-sm rounded-circle shadow-sm" type="button" value="+">
                        <input type="text" name="test_date_1" id="test_dates" value="<?= set_value('test_date_1') ?>" placeholder="DD-MM-YYYY" class="form-control form-control-sm w-75 mb-2 date" data-serial='1'>
                        <?= '<span class="text-danger small font-italic">' . validation_show_error('test_date_1') . '</span>' ?>
                    </div>
                    <div class="form-group col">
                        <label for="test_note" class="font-weight-bold">Important Notes</label>
                        <textarea name="<?= formUtils::test_note_name() ?>" id="test_note" cols="30" rows="10" class="form-control form-control-sm" placeholder="Type your notes here"><?= set_value(formUtils::test_note_name()) ?></textarea>
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtils::test_note_name()) . '</span>' ?>
                    </div>
                </div>
                <input type="submit" value="Save Test Details" class="btn btn-success btn-block w-50 mx-auto">
                <?= form_close() ?>
            </div>
        </div>
    </div> <!-- CONTAINER CLOSED -->

    <script>
        $(function() {
            $('#add-date').on('click', function() {
                let serial = $('.date:last').data('serial');
                serial++;
                let date = $('<input type="text" name="test_date_' + serial + '" id="" value="" placeholder="DD-MM-YYYY" class="form-control form-control-sm w-75 mb-2 date" data-serial="' + serial + '">')
                $(this).closest('div').append(date);
            });

            <?php if ($session->has('succes_msg')) : ?>
                swal({
                    title: "SUCCESS",
                    text: "<?= $session->getFlashdata('succes_msg') ?>",
                    icon: "success",
                    button: "OK"
                });
            <?php endif; ?>

            <?php if ($session->has('error_msg')) : ?>
                swal({
                    title: "ERROR",
                    text: "<?= $session->getFlashdata('error_msg') ?>",
                    icon: "error",
                    button: "OK"
                });
            <?php endif ?>
        });
    </script>
</body>

</html>