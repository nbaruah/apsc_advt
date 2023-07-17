<?php

use App\Libraries\AdvtForm;

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
    <title><?= $title ?></title>
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
            <h5 class="card-header bg-secondary text-white text-center">Register New Advertisement</h5>
            <div class="card-body">
                <?= form_open("/advt/create") ?>
                <?= csrf_field() ?>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="advt_no" class="font-weight-bold">Advt. No. <span class="text-danger">*</span></label>
                        <input type="text" name="<?= AdvtForm::getNameAdvtNo() ?>" id="advt_no" value="<?= set_value(AdvtForm::getNameAdvtNo()) ?>" class="form-control form-control-sm" placeholder="Sl. No./Advt. Year (e.g. 10/2023)">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(AdvtForm::getNameAdvtNo()) . '</span>' ?>
                    </div>
                    <div class="form-group col">
                        <label for="pub_date" class="font-weight-bold">Date Published <span class="text-danger">*</span></label>
                        <input type="text" name="<?= AdvtForm::getNamePubDate() ?>" id="pub_date" value="<?= set_value(AdvtForm::getNamePubDate()) ?>" class="form-control form-control-sm" placeholder="DD-MM-YYYY">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(AdvtForm::getNamePubDate()) . '</span>' ?>
                    </div>
                    <div class="form-group col">
                        <label for="file_ref" class="font-weight-bold">File Ref. No. <span class="text-danger">*</span></label>
                        <input type="text" name="<?= AdvtForm::getNameFileRef() ?>" id="file_ref" value="<?= set_value(AdvtForm::getNameFileRef()) ?>" class="form-control form-control-sm" placeholder="e.g.- 34PSC/DR-78/PT-II/2023-2026">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(AdvtForm::getNameFileRef()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="advt_desc" class="font-weight-bold">Posts Description</label>
                    <textarea name="<?= AdvtForm::getNameDesc() ?>" id="advt_desc" cols="30" rows="10" class="form-control form-control-sm"><?= set_value(AdvtForm::getNameDesc()) ?></textarea>
                    <?= '<span class="text-danger small font-italic">' . validation_show_error(AdvtForm::getNameDesc()) . '</span>' ?>
                </div>
                <div class="form-row">
                    <button type="submit" class="btn btn-success col mx-4">Register Advertisement</button>
                    <button type="reset" class="btn btn-danger col mx-4">Reset Form</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>

        <?php if ($session->has('succes_msg')) : ?>
            <a href="<?= base_url('post/create/' . $session->getFlashdata('advt_no')) ?>" class="btn btn-info d-block mx-auto w-50 my-2">Add Post for Advt No. <?= $session->getFlashdata('advt_no') ?></a>
        <?php endif; ?>

    </div> <!-- CONTAINER CLOSED -->

    <!-- ################### SWEET ALERT FOR SUCCESS OR ERROR MESSAGES ################# -->
    <script>
        $(function() {
            <?php if ($session->has('succes_msg')) : ?>
                swal({
                    title: "SUCCESS",
                    text: "<?= $session->getFlashdata('succes_msg') ?>",
                    icon: "success",
                    button: "OK",
                });
            <?php endif; ?>

            <?php if ($session->has('error_msg')) : ?>
                swal({
                    title: "ERROR",
                    text: "<?= $session->getFlashdata('error_msg') ?>",
                    icon: "error",
                    button: "OK",
                });
            <?php endif; ?>
        });
    </script>

</body>

</html>