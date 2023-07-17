<?php

namespace App\Models;

use CodeIgniter\Model;

class AdvtModel extends Model
{
    protected $table = 'advt'; //Database table name
    protected $primaryKey = 'advt_no';

    protected $useAutoIncrement = false;
    protected $allowedFields = ['advt_no', 'pub_date', 'file_ref_no', 'desc'];

    //protected $returnType = \App\Entities\Advt::class;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
}
