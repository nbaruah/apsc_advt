<?php

namespace App\Models;

use CodeIgniter\Model;

class TestsModel extends Model
{
    protected $table = 'tests'; //Database table name
    protected $primaryKey = 'test_id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'type',
        'result_link',
        'result'
    ];

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    public function existTest(string $type = '', $post_id = ''): array|bool
    {
        $builder = $this->builder();
        $builder->where(['type' => $type, 'post_id' => $post_id]);
        $result_set = $builder->get()->getRowArray();
        return is_null($result_set) ? false : $result_set;
    }
}
