<?php

use App\Libraries\PostFormNames;

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="container">
        <img src="<?= base_url('header.jpg') ?>" alt="APSC Letter Head" class="w-75 mx-auto d-block shadow-sm mb-4">
        <div class="card bg-light text-dark" style="margin: auto;">
            <h5 class="card-header bg-secondary text-white text-center">List of Posts for Advt. No. <?= $advt_no ?></h5>
            <div class="card-body">
                <div class="row font-weight-bold ">
                    <div class="col-md-9">File ref. No. : <?= $file_ref ?></div>
                    <div class="col-md-3">Dated: <?= $pub_date ?></div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Post Name</th>
                            <th>Deptt. Name</th>
                            <th>Status</th>
                            <th>Dealing Asst.</th>
                            <th>Add various Notifications</th>
                        </tr>
                    </thead>
                    <tbody class="small">
                        <?php foreach ($post_details as $idx => $post) : ?>
                            <tr>
                                <td><?= $idx + 1 ?></td>
                                <td><?= $post[PostFormNames::postName()] ?></td>
                                <td><?= $post[PostFormNames::depttName()] ?></td>
                                <td data-toggle="tooltip" title="<?= 'Start: ' . $post[PostFormNames::startDateName()] . ' |  Closing: ' . $post[PostFormNames::closingDateName()] ?>"><?= $post[PostFormNames::statusName()] ?></td>
                                <td><?= $post[PostFormNames::dealingAsttName()] ?></td>
                                <td>
                                    <a href="#" class="btn btn-outline-primary btn-sm mb-1"><i class="fa fa-file-pdf-o fa-1" aria-hidden="true"></i> Syllabus</a>
                                    <a href="#" class="btn btn-outline-secondary btn-sm mb-1"><i class="fa fa-bullhorn fa-1" aria-hidden="true"></i> Notification</a>
                                    <a href="<?= base_url(['post', 'add_test', 'omr', $post[PostFormNames::PostIDName()]]) ?>" class="btn btn-outline-danger btn-sm mb-1"><i class="fa fa-pencil-square-o fa-1" aria-hidden="true"></i> OMR Test Schd.</a>
                                    <a href="<?= base_url(['post', 'add_test', 'written', $post[PostFormNames::PostIDName()]]) ?>" class="btn btn-outline-dark btn-sm mb-1"><i class="fa fa-file-text-o fa-1" aria-hidden="true"></i> Written Schd.</a>
                                    <a href="<?= base_url(['post', 'add_test', 'interview', $post[PostFormNames::PostIDName()]]) ?>" class="btn btn-outline-info btn-sm mb-1"><i class="fa fa-users fa-1" aria-hidden="true"></i> Interview Schd.</a>
                                    <a href="#" class="btn btn-outline-success btn-sm mb-1"><i class="fa fa-list-ol fa-1" aria-hidden="true"></i> Test Result</a>
                                    <a href="#" class="btn btn-outline-success btn-sm mb-1"><i class="fa fa-check-square-o fa-1" aria-hidden="true"></i> Reccomendation List</a>
                                    <a href="#" class="btn btn-outline-dark btn-sm mb-1"><i class="fa fa-gavel fa-1" aria-hidden="true"></i> Court Case</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php if (session('error_msg') !== null) : ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> <?= session('error_msg') ?>
            </div>
        <?php endif; ?>

        <?php if ($session->has('succes_msg')) : ?>
            <a href="<?= base_url('post/create/' . $session->getFlashdata('advt_no')) ?>" class="btn btn-info d-block mx-auto w-50 my-2">Add Post for Advt No. <?= $session->getFlashdata('advt_no') ?></a>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> <?= $session->getFlashdata('succes_msg') ?>
            </div>
        <?php endif; ?>

    </div> <!-- CONTAINER CLOSED -->
    <script src="" async defer></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>