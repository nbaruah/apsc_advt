<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <div id="advt-table">
        <h2>List of all the Advt</h2>
        <table>
            <tr>
                <th>Post ID</th>
                <th>Advt No.</th>
                <th>Post Name</th>
                <th>Total Posts</th>
            </tr>
            <?php foreach ($advts as $advt) { ?>
                <tr>
                    <td><?= esc($advt->post_id)  ?></td>
                    <td><?= esc($advt->advt_no) ?></td>
                    <td><?= esc($advt->postname) ?></td>
                    <td><?= esc($advt->total_posts) ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>