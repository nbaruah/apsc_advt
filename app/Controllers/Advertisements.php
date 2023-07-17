<?php

namespace App\Controllers;

use App\Models\AdvtModel;
use App\Libraries\AdvtDetails;
use App\Libraries\AdvtForm;
use App\Models\TestsModel;
use DateTime;

class Advertisements extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $model = new TestsModel();
        var_dump($model->existTest('OMR', '5'));
    }

    public function create()
    {
        $add_page_data = [
            'title' => "New Advt. Entry",
            'header' => "APSC Advertisements"
        ];
        return view('advt_entry/add_advt', $add_page_data);
    }

    public function add()
    {
        //First create an instance of Advt Entity
        $advt = new \App\Entities\Advt();
        //pupulate all the columns you want to save
        $advt->advt_no = $this->request->getVar('advt_no');
        $advt->postnames = $this->request->getVar('post');
        $advt->total_posts = $this->request->getVar('total_post');

        $advtModel = new AdvtModel();
        $advtModel->save($advt);

        $session = \Config\Services::session();
        $session->setFlashdata('success', 'User Data Added');
        return redirect()->to('advt/add');
    }


    public function save()
    {
        //If anyone tries to access other than POST method (If request is not POST method)
        if (!$this->request->is('post')) {
            $add_page_data = [
                'title' => "New Advt. Entry",
                'header' => "APSC Advertisements"
            ];
            return view('advt_entry/add_advt', $add_page_data);
        }

        //Validation and Sanitization
        $validation = service('validation');

        //Set Validation rules
        $validation->setRules([
            AdvtForm::getNameAdvtNo() => [
                'label' => AdvtForm::getLabelAdvtNo(),
                'rules' => AdvtForm::getRulesAdvtNo()
            ],
            AdvtForm::getNamePubDate() => [
                'label' => AdvtForm::getLabelPubDate(),
                'rules' => AdvtForm::getRulesPubDate()
            ],
            AdvtForm::getNameFileRef() => [
                'label' => AdvtForm::getLabelFileRef(),
                'rules' => AdvtForm::getRulesFileRef()
            ],
            AdvtForm::getNameDesc() => [
                'label' => AdvtForm::getLabelDesc(),
                'rules' => AdvtForm::getRulesDesc()
            ]
        ]);

        //IF validation rules FAIL redirect back to advertisement entry page with input data
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput();
        }

        //OTHERWISE Get posted values of the form and create array to insert to DB
        $mysqlDate = date('Y-m-d', strtotime($this->request->getVar(AdvtForm::getNamePubDate())));
        $new_advt = [
            AdvtForm::getNameAdvtNo() => $this->request->getVar(AdvtForm::getNameAdvtNo()),
            AdvtForm::getNamePubDate() => $mysqlDate,
            AdvtForm::getNameFileRef() => $this->request->getVar(AdvtForm::getNameFileRef()),
            AdvtForm::getNameDesc() => $this->request->getVar(AdvtForm::getNameDesc())
        ];

        //Create an instance of Advt. Model
        $advtModel = new AdvtModel();

        //If the Advt. No. aready Existed then Report the error
        if ($found = $advtModel->find($new_advt[AdvtForm::getNameAdvtNo()])) {
            return redirect()->back()->withInput()->with('error_msg', 'Advt. No. ' . $found[AdvtForm::getNameAdvtNo()] . ' dtd. ' . $found[AdvtForm::getNamePubDate()] . ' already Exists.');
        } else if ($advtModel->insert($new_advt, false)) {  //Insert data to the database
            $session = session();
            $sucess_data['succes_msg'] = 'Advt. No. ' . $advtModel->getInsertID() . ' dtd. ' . $new_advt[AdvtForm::getNamePubDate()] . ' registered.';
            $sucess_data['advt_no'] = $advtModel->getInsertID();
            $session->setFlashdata($sucess_data);
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->with('error_msg', 'Failed saving Advt. No. ' . $new_advt[AdvtForm::getNameAdvtNo()] . ' dtd. ' . $new_advt[AdvtForm::getNamePubDate()]);
        }
    }

    public function list()
    {
        $advt_details = new AdvtDetails();

        $data = [
            'title' => "Show Advertisements",
            'advts' => $advt_details->getAllAdvt()
        ];

        return view('advt_view/list_advt', $data);
    }

    public function advtById($advt_seg1 = "", $advt_seg2 = "")
    {
        $advt_id = $advt_seg2 ? $advt_seg1 . '/' . $advt_seg2 : $advt_seg1;
        $advt_details = new AdvtDetails();
        $advt_data = $advt_details->getAdvtById($advt_id);
        if (is_null($advt_data)) {
            $response_data = [
                'status' => 404,
                'msg' => "Data not found"
            ];
        } else {
            $response_data = [
                'status' => 200,
                'post_id' => $advt_data->post_id,
                'advt_no' => $advt_data->advt_no,
                'postname' => $advt_data->postname,
                'total_posts' => $advt_data->total_posts
            ];
        }
        return $this->response->setJSON($response_data);
    }

    public function test1()
    {
        $data = [
            'title' => "Advt. Details",
            'advt' => (object)['advt_no' => '08/2023', 'file_ref' => '12PSC/DR-21/5/2022-2023', 'date_published' => '30-03-2023', 'post_name' => 'Junior Manager (Electrical)', 'deptt_name' => 'Assam Power Distribution Company Limited (APDCL)', 'total_posts' => 215, 'oc' => 143, 'obc_mobc' => 50, 'sc' => 7, 'stp' => 8, 'sth' => 7, 'pwbd' => 21, 'ex_ser' => 13, 'start_date' => '10-04-2023', 'end_date' => '09-05-2023', 'total_apps' => 5000]
        ];

        return view('advt_view/advt_details', $data);
    }

    public function test()
    {
        $start_date = new DateTime('28-02-2023');
        $end_date = new DateTime('08-03-2022');
        $fee_pay_date = new DateTime('15-03-2023');

        if ($start_date >= $end_date || $start_date >= $fee_pay_date) {
            echo 'Application Start Date cannot be greater than Application End date or Fee Payment last date.';
        } elseif ($end_date >= $fee_pay_date) {
            echo 'Application End Date cannot greater than Fee Payment date';
        } else {
            echo 'All ok';
        }
    }
}
