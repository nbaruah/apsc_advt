<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title><?= $title ?></title>
    <!--  -->
</head>

<body>



    <?= session()->getFlashdata('error') ?>


    <div class="container">

        <h2 class="text-center mt-4 mb-4"><?= esc($header) ?></h2>

        <?php

        $validation = \Config\Services::validation();

        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">Advertisement Data Entry</div>
                    <div class="col text-right">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url("advt/create") ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Advt. No.</label>
                        <input type="text" name="advt_no" class="form-control" />
                        <?php
                        if ($validation->getError('advt_no')) {
                            echo '<div class="alert alert-danger mt-2">' . $validation->getError('advt_no') . '</div>';
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Total Posts</label>
                        <input type="text" name="total_post" class="form-control" />
                        <?php
                        if ($validation->getError('total_post')) {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            " . $validation->getError('total_post') . "
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Post Name</label>
                        <select name="post" class="form-control">
                            <option value="">Select Post Name</option>
                            <option value="cce">Combined Competitive Examination</option>
                            <option value="Water Resources Deptt">Water Resources Deptt</option>
                        </select>

                        <?php

                        if ($validation->getError('post')) {
                            echo '<div class="alert alert-danger mt-2">
                            ' . $validation->getError("post") . '
                            </div>';
                        }

                        ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>