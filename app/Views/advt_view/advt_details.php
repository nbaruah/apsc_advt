<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
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
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container border">
            <div class="row">
                <div class="col">
                <h4 class="p-2 bg-info text-white rounded-sm text-center">Advertisement Details</h4>
                </div>    
            </div>
            <div class="row font-weight-bold">
                <!-- Advt No, Post Name, Ref No -->
                <div class="col-sm-10">
                    <p>Post Name: <?= esc($advt->post_name) ?></p>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary btn-sm">Detail Advt.</button>
                </div>
            </div>
            <div class="row font-weight-bold">
                <!-- Advt No, Post Name, Ref No -->
                <div class="col">
                    <p>Department Name: <?= esc($advt->deptt_name) ?></p> 
                </div>
            </div>
            <div class="row font-weight-bold">
                <!-- Advt No, Post Name, Ref No -->
                <div class="col">
                    <p>Advt. No. - <?= esc($advt->advt_no) ?></p>
                </div>
                <div class="col">
                    <p>Published Date - <?= esc($advt->date_published) ?></p>
                </div>
                <div class="col">
                    <p>File Ref. No. - <?= esc($advt->file_ref) ?></p>
                </div>
            </div>
            <div class="row font-weight-normal">
                <!-- Reservation Details -->
                <div class="col">
                    <p class="p-2 bg-secondary text-white rounded-sm text-center" > Reservation Details </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class=" table table-bordered">
                        <thead  class="thead-light">
                            <tr>
                                <th>Total Posts</th>
                                <th>Open Category</th>
                                <th>OBC/MOBC</th>
                                <th>SC</th>
                                <th>STH</th>
                                <th>STP</th>
                                <th>PwBD</th>
                                <th>Ex-Servicemen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= esc($advt->total_posts) ?></td>
                                <td><?= esc($advt->oc) ?></td>
                                <td><?= esc($advt->obc_mobc) ?></td>
                                <td><?= esc($advt->sc) ?></td>
                                <td><?= esc($advt->sth) ?></td>
                                <td><?= esc($advt->stp) ?></td>
                                <td><?= esc($advt->pwbd) ?></td>
                                <td><?= esc($advt->ex_ser) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <p>Application Start Date : <?= $advt->start_date ?></p>
                </div>
                <div class="col-sm-4">
                    <p class="text-danger">Application Closing Date: <?= $advt->end_date ?> </p>
                </div>
                <div class="col-sm-4">
                    <p>Total Applications received: <?= $advt->total_apps ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <p>Dealing Assistant : <?= $advt->start_date ?></p>
                </div>
                <div class="col-sm-4">
                    <p>Current Status: <?= $advt->end_date ?> </p>
                </div>
                <div class="col-sm-4">
                    <p>Total Applications received: <?= $advt->total_apps ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="button" class="btn btn-info btn-sm btn-block">Notifications</button>
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-info btn-sm btn-block">Syllabus</button>
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-info btn-sm btn-block">Approved list of Candidates</button>
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-info btn-sm btn-block">Court Cases</button>
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-info btn-sm btn-block">Results</button>
                </div>
            </div>
        </div>
        <script src="" async defer></script>
    </body>
</html>