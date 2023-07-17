<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts'; //Database table name
    protected $primaryKey = 'post_id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'post_name',
        'deptt_name',
        'grand_total',
        'grand_total_rfw',
        'open_cat',
        'open_cat_rfw',
        'obc_mobc_resv',
        'obc_mobc_rfw',
        'sc_resv',
        'sc_rfw',
        'sth_resv',
        'sth_rfw',
        'stp_resv',
        'stp_rfw',
        'pwbd_resv',
        'blind_lv_resv',
        'deaf_hh_resv',
        'locomotor_resv',
        'autism_resv',
        'ex_serv_resv',
        'ews_resv',
        'appln_start_date',
        'appln_close_date',
        'fee_pay_last_date',
        'dealing_astt',
        'notes',
        'advt_id'
    ];

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
}
