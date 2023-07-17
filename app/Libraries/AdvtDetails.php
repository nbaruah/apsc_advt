<?php
namespace App\Libraries;
use \App\Models\AdvtModel;

class AdvtDetails {
    public function getAllAdvt(){
        //Get details from model
        $advt_model = new AdvtModel();
        return $advt_model->orderBy('post_id')->findAll();
    }

    public function getAdvtById($post_id)
    {
        $advt_model = new AdvtModel();
        return $advt_model->find($post_id);
    }
}