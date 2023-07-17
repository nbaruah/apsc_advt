<?php

use App\Libraries\PostFormNames as formUtil;
use CodeIgniter\Validation\Validation;

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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="container">
        <img src="<?= base_url('header.jpg') ?>" alt="APSC Letter Head" class="w-75 mx-auto d-block shadow-sm mb-4">

        <!-- ### MESSAGES #### -->
        <?php if ($session->has('error_msg')) : ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> <?= $session->getFlashdata('error_msg') ?>
            </div>
        <?php endif; ?>

        <?php if ($session->has('succes_msg')) : ?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> <?= $session->getFlashdata('succes_msg') ?>
            </div>
        <?php endif; ?>
        <!-- ### END MESSAGES #### -->

        <div class="card bg-light text-dark" style="margin: auto;">
            <h5 class="card-header bg-secondary text-white text-center">Add Post for Advt. No. <?= $advt_no ?></h5>
            <div class="card-body">
                <?= form_open("/post/create") ?>
                <?= csrf_field() ?>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="advt_no" class="font-weight-bold">Advt. No. <span class="text-danger">*</span></label>
                        <input type="text" name="<?= formUtil::AdvtIDName() ?>" id="advt_no" value="<?= validation_errors() ? set_value(formUtil::AdvtIDName()) : $advt_no ?>" class="form-control form-control-sm" readonly>
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::AdvtIDName()) . '</span>' ?>
                    </div>
                    <div class="form-group col">
                        <label for="pub_date" class="font-weight-bold">Date Published </label>
                        <input type="text" name="<?= formUtil::getNamePubDate() ?>" id="pub_date" value="<?= validation_errors() ? set_value(formUtil::getNamePubDate()) : $pub_date ?>" class="form-control form-control-sm" readonly>
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::getNamePubDate()) . '</span>' ?>
                    </div>
                    <div class="form-group col">
                        <label for="file_ref" class="font-weight-bold">File Ref. No. </label>
                        <input type="text" name="<?= formUtil::getNameFileRef() ?>" id="file_ref" value="<?= validation_errors() ? set_value(formUtil::getNameFileRef()) : $file_ref ?>" class="form-control form-control-sm" readonly>
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::getNameFileRef()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="post_name" class="font-weight-bold">Post Name<span class="text-danger">*</span></label>
                        <input type="text" name="<?= formUtil::postName() ?>" id="post_name" value="<?= set_value(formUtil::postName()) ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::postName()) . '</span>' ?>
                    </div>
                    <div class="form-group col">
                        <label for="deptt_name" class="font-weight-bold">Department Name<span class="text-danger">*</span></label>
                        <select name="<?= formUtil::depttName() ?>" id="deptt_name" value="<?= set_value(formUtil::depttName()) ?>" class="form-control form-control-sm"></select>
                        <!-- <input type="text" name="<?= formUtil::depttName() ?>" id="deptt_name" value="<?= set_value(formUtil::depttName()) ?>" class="form-control form-control-sm"> -->
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::depttName()) . '</span>' ?>
                    </div>
                </div>
                <h5 class="text-center border-bottom border-secondary mt-2 pb-1">RESERVATION DETAILS</h5>
                <div class="form-row font-weight-bold mb-2">
                    <div class="col">
                        <center>Category</center>
                    </div>
                    <div class="col">
                        <center>Total Post(s)</center>
                    </div>
                    <div class="col">
                        <center>Reserved for Women (RFW)</center>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col col-form-label col-form-label-sm text-center">Open Category</label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::ocName() ?>" id="oc_resv" value="<?= validation_errors() ? set_value(formUtil::ocName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::ocName()) . '</span>' ?>
                    </div>
                    <div class="col">
                        <input type="text" name="<?= formUtil::ocRFWName() ?>" id="oc_rfw" value="<?= validation_errors() ? set_value(formUtil::ocRFWName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::ocRFWName()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col col-form-label col-form-label-sm text-center">OBC/MOBC Category</label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::obcMobcName() ?>" id="obc_resv" value="<?= validation_errors() ? set_value(formUtil::obcMobcName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::obcMobcName()) . '</span>' ?>
                    </div>
                    <div class="col">
                        <input type="text" name="<?= formUtil::obcMobcRFWName() ?>" id="obc_rfw" value="<?= validation_errors() ? set_value(formUtil::obcMobcRFWName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::obcMobcRFWName()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col col-form-label col-form-label-sm text-center">SC Category</label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::scName() ?>" id="sc_resv" value="<?= validation_errors() ? set_value(formUtil::scName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::scName()) . '</span>' ?>
                    </div>
                    <div class="col">
                        <input type="text" name="<?= formUtil::scRFWName() ?>" id="sc_rfw" value="<?= validation_errors() ? set_value(formUtil::scRFWName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::scRFWName()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col col-form-label col-form-label-sm text-center">STH Category</label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::sthName() ?>" id="sth_resv" value="<?= validation_errors() ? set_value(formUtil::sthName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::sthName()) . '</span>' ?>
                    </div>
                    <div class="col">
                        <input type="text" name="<?= formUtil::sthRFWName() ?>" id="sth_rfw" value="<?= validation_errors() ? set_value(formUtil::sthRFWName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::sthRFWName()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col col-form-label col-form-label-sm text-center">STP Category</label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::stpName() ?>" id="stp_resv" value="<?= validation_errors() ? set_value(formUtil::stpName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::stpName()) . '</span>' ?>
                    </div>
                    <div class="col">
                        <input type="text" name="<?= formUtil::stpRFWName() ?>" id="stp_rfw" value="<?= validation_errors() ? set_value(formUtil::stpRFWName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::stpRFWName()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-row font-weight-bold mb-2 border-top pt-2">
                    <div class="col text-center">
                        <span class="col col-form-label col-form-label-sm"> PERSON WITH BENCHMARK DISABILITY (PwBD)</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="pwbd-resv" class="d-block col-form-label col-form-label-sm text-center">Total Post(s)</label>
                        <input type="text" name="<?= formUtil::pwbdName() ?>" id="pwbd-resv" value="<?= validation_errors() ? set_value(formUtil::pwbdName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::pwbdName()) . '</span>' ?>
                    </div>
                    <div class="form-group col">
                        <label for="bl-lv-resv" class="d-block col-form-label col-form-label-sm text-center">Blind/Low Vision</label>
                        <input type="text" name="<?= formUtil::lowVisionName() ?>" id="bl-lv-resv" value="<?= validation_errors() ? set_value(formUtil::lowVisionName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::lowVisionName()) . '</span>' ?>
                    </div>
                    <div class="form-group col">
                        <label for="df-hh_resv" class="d-block col-form-label col-form-label-sm text-center">Deaf/Hard of Hearing</label>
                        <input type="text" name="<?= formUtil::deafName() ?>" id="df-hh_resv" value="<?= validation_errors() ? set_value(formUtil::deafName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::deafName()) . '</span>' ?>
                    </div>
                    <div class="form-group col">
                        <label for="loco-resv" class="d-block col-form-label col-form-label-sm text-center">Locomotor Disability</label>
                        <input type="text" name="<?= formUtil::locomotorName() ?>" id="loco-resv" value="<?= validation_errors() ? set_value(formUtil::locomotorName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::locomotorName()) . '</span>' ?>
                    </div>
                    <div class="form-group col">
                        <label for="autism-resv" class="d-block col-form-label col-form-label-sm text-center">Autism</label>
                        <input type="text" name="<?= formUtil::autismName() ?>" id="autism-resv" value="<?= validation_errors() ? set_value(formUtil::autismName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::autismName()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-group row border-top pt-3 text-center">
                    <label for="ex-serv-resv" class="col col-form-label col-form-label-sm">Ex-Servicemen</label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::exServiceName() ?>" id="ex-serv-resv" value="<?= validation_errors() ? set_value(formUtil::exServiceName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::exServiceName()) . '</span>' ?>
                    </div>
                    <label for="ews-resv" class="col col-form-label col-form-label-sm">Economically Weaker Section(EWS)</label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::ewsName() ?>" id="ews-resv" value="<?= validation_errors() ? set_value(formUtil::ewsName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::ewsName()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-row border-top border-secondary py-2">
                    <div class="col text-center font-weight-bold pb-2">GRAND TOTAL</div>
                </div>
                <div class="form-group row font-weight-bold">
                    <label for="grand-tot-resv" class="col col-form-label col-form-label-sm text-center">Total Post(s) <span class="text-danger">*</span></label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::grandTotalName() ?>" id="grand-tot-resv" value="<?= validation_errors() ? set_value(formUtil::grandTotalName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::grandTotalName()) . '</span>' ?>
                    </div>
                    <label for="grand-tot-rfw" class="col col-form-label col-form-label-sm text-center">Reserved for Women</label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::grandTotRFWName() ?>" id="grand-tot-rfw" value="<?= validation_errors() ? set_value(formUtil::grandTotRFWName()) : 0 ?>" class="form-control form-control-sm">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::grandTotRFWName()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-row border-top border-secondary py-2">
                    <div class="col text-center font-weight-bold pb-2">APPLICATION SUBMISSION DATES</div>
                </div>
                <div class="form-group row text-center">
                    <label for="start-date" class="col col-form-label col-form-label-sm">Start Date <span class="text-danger">*</span> </label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::startDateName() ?>" id="start-date" value="<?= set_value(formUtil::startDateName()) ?>" class="form-control form-control-sm" placeholder="DD-MM-YYYY">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::startDateName()) . '</span>' ?>
                    </div>
                    <label for="close-date" class="col col-form-label col-form-label-sm">Closing Date <span class="text-danger">*</span></label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::closingDateName() ?>" id="close-date" value="<?= set_value(formUtil::closingDateName()) ?>" class="form-control form-control-sm" placeholder="DD-MM-YYYY">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::closingDateName()) . '</span>' ?>
                    </div>
                    <label for="fee-end-date" class="col col-form-label col-form-label-sm">Fee Payment End Date <span class="text-danger">*</span></label>
                    <div class="col">
                        <input type="text" name="<?= formUtil::feeDateName() ?>" id="fee-end-date" value="<?= set_value(formUtil::feeDateName()) ?>" class="form-control form-control-sm" placeholder="DD-MM-YYYY">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::feeDateName()) . '</span>' ?>
                    </div>
                </div>
                <div class="form-group row text-center border-top py-3">
                    <label for="deal-astt" class="col-sm-2 col-form-label col-form-label-sm">Dealing Assistant <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" name="<?= formUtil::dealingAsttName() ?>" id="deal-astt" value="<?= set_value(formUtil::dealingAsttName()) ?>" class="form-control form-control-sm" placeholder="Name">
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::dealingAsttName()) . '</span>' ?>
                    </div>
                    <label for="notes" class="col-sm-2 col-form-label col-form-label-sm">Important Notes</label>
                    <div class="col-sm-4">
                        <textarea name="<?= formUtil::NoteName() ?>" id="notes" cols="30" rows="10" class="form-control form-control-sm"><?= set_value(formUtil::NoteName()) ?></textarea>
                        <?= '<span class="text-danger small font-italic">' . validation_show_error(formUtil::NoteName()) . '</span>' ?>
                    </div>
                </div>

                <div class="form-row py-3">
                    <button type="submit" class="btn btn-success col mx-4">Save Post Details</button>
                    <button type="reset" class="btn btn-danger col mx-4">Reset Form</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>

    </div> <!-- CONTAINER CLOSED -->
    <script src="" async defer></script>
    <script>
        $(function() {
            //alert('Document is Ready!!');
            load_deptt_names();
        });

        function load_deptt_names() {
            $.ajax({
                url: "http://localhost/apsc_advt/public/post/departments",
                dataType: "json",
                type: "GET",
                cache: false,
                success: function(data) {
                    var deptt_dropdown = $('#deptt_name');
                    $.each(data, function(i, item) {
                        deptt_dropdown.append('<option>' + item.name + '</option>');
                    });
                    let prev_deptt = deptt_dropdown.attr('value');
                    deptt_dropdown.val(prev_deptt);
                },
                error: fail_handler,
                complete: ajax_complete_handler
            });
        }

        var fail_handler = function(XmlHttpReq, status, errorThrown) {
            alert("Sorry, there was a problem! in loading Department names - " + errorThrown);
            console.log("Error: " + errorThrown);
            console.log("Status: " + status);
            console.dir(XmlHttpReq);
        }

        var ajax_complete_handler = function(XMLhttpReq, status) {
            console.log('AJAX complete');
        }
    </script>
</body>

</html>