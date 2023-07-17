<?php

namespace App\Controllers;

use App\Models\AdvtModel;
use App\Libraries\AdvtDetails;
use App\Libraries\AdvtForm;
use App\Libraries\PostFormNames as formUtil;
use App\Models\PostModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class PostsController extends BaseController
{
    //All Liberies and Models
    protected $db;
    protected $session;
    protected $postModel;
    protected $helpers = ['form'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        //Overriding the initController
        parent::initController($request, $response, $logger);
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->postModel = new PostModel();
    }

    public function index()
    {
        echo "<center><h4>This is the Starting Page of the App.</h4></center>";
    }

    public function listDeptts()
    {
        $builder = $this->db->table('departments');
        $builder->orderBy('name', 'ASC');
        $query = $builder->get();

        return $this->response->setJSON($query->getResult('array'));
    }


    // Shows the form to insert new post details 
    public function add($advt_seg1 = "", $advt_seg2 = "")
    {
        $advt_id = $advt_seg2 ? $advt_seg1 . '/' . $advt_seg2 : $advt_seg1;

        $advtModel = new AdvtModel();
        if ($advt_details = $advtModel->find($advt_id)) {
            $viewData = [
                'title' => 'Add Post',
                'advt_no' => $advt_details[AdvtForm::getNameAdvtNo()],
                'file_ref' => $advt_details[AdvtForm::getNameFileRef()],
                'pub_date' => date('d-m-Y', strtotime($advt_details[AdvtForm::getNamePubDate()]))
            ];

            return view('advt_entry/add_post', $viewData);
        }

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Invalid Advt. No. - ' . $advt_id);
    }


    public function insert()
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

        //Set Validation rules 'field_name'=>['label'=>'LABEL', 'rules'=>]
        $validation->setRules([
            formUtil::AdvtIDName() => formUtil::ADVT_ID['validation'],
            formUtil::getNamePubDate() => formUtil::PUB_DATE['validation'],
            formUtil::getNameFileRef() => formUtil::FILE_REF['validation'],
            formUtil::postName() => formUtil::POST_NAME['validation'],
            formUtil::depttName() => formUtil::DEPTT_NAME['validation'],
            formUtil::ocName() => formUtil::OPEN_CAT['validation'],
            formUtil::ocRFWName() => formUtil::OPEN_CAT_RFW['validation'],
            formUtil::obcMobcName() => formUtil::OBC_MOBC_RESV['validation'],
            formUtil::obcMobcRFWName() => formUtil::OBC_MOBC_RFW['validation'],
            formUtil::scName() => formUtil::SC_RESV['validation'],
            formUtil::scRFWName() => formUtil::SC_RFW['validation'],
            formUtil::sthName() => formUtil::STH_RESV['validation'],
            formUtil::sthRFWName() => formUtil::STH_RFW['validation'],
            formUtil::stpName() => formUtil::STP_RESV['validation'],
            formUtil::stpRFWName() => formUtil::STP_RFW['validation'],
            formUtil::pwbdName() => formUtil::PWBD_RESV['validation'],
            formUtil::lowVisionName() => formUtil::BLIND_LV_RESV['validation'],
            formUtil::deafName() => formUtil::DEAF_HH_RESV['validation'],
            formUtil::locomotorName() => formUtil::LOCOMOTOR_RESV['validation'],
            formUtil::autismName() => formUtil::AUTISM_RESV['validation'],
            formUtil::exServiceName() => formUtil::EX_SERV_RESV['validation'],
            formUtil::ewsName() => formUtil::EWS_RESV['validation'],
            formUtil::grandTotalName() => formUtil::GRAND_TOTAL['validation'],
            formUtil::grandTotRFWName() => formUtil::GRAND_TOTAL_RFW['validation'],
            formUtil::startDateName() => formUtil::APPLN_START_DATE['validation'],
            formUtil::closingDateName() => formUtil::APPLN_CLOSE_DATE['validation'],
            formUtil::feeDateName() => formUtil::FEE_PAY_LAST_DATE['validation'],
            formUtil::dealingAsttName() => formUtil::DEALING_ASTT['validation'],
            formUtil::NoteName() => formUtil::NOTES['validation']
        ]);

        //IF validation rules FAIL redirect back to post details entry page with input data
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput();
        }

        //Validate correct counts for various reservations
        $testdata = formUtil::checkTotals($this->request->getPost());
        if (!$testdata['success']) {
            $data['_ci_validation_errors'] = $testdata['message'];
            $this->session->setFlashdata($data);
            return redirect()->back()->withInput();
        }
        //Validate application dates for correctness
        $checkDates = formUtil::checkApplnDates($this->request->getPost());
        if (!$checkDates['success']) {
            $data['_ci_validation_errors'] = $checkDates['message'];
            $this->session->setFlashdata($data);
            return redirect()->back()->withInput();
        }

        $builder = $this->db->table('posts');
        $dataFilter = [
            formUtil::postName() => $this->request->getVar(formUtil::postName()),
            formUtil::depttName() => $this->request->getVar(formUtil::depttName()),
            formUtil::AdvtIDName() => $this->request->getVar(formUtil::AdvtIDName())
        ];
        $query = $builder->where($dataFilter);

        //If the same post with same Deptt and Advt aready Existed then Report the error
        if ($query->countAllResults()) {
            return redirect()->back()->withInput()->with('error_msg', 'The Post <b>' . $this->request->getVar(formUtil::postName()) . '</b> under Deptt. of <b>' . $this->request->getVar(formUtil::depttName()) . '</b> already Exist for Advt. No. ' . $this->request->getVar(formUtil::AdvtIDName()));
        } else if ($this->postModel->insert(formUtil::getInsertArray($this->request->getPost()), false)) {  //Insert data to the database
            $sucess_data['succes_msg'] = 'Post. Name. <b>' . $this->request->getVar(formUtil::postName()) . '</b>'  . '</b> Saved Successfuly.';
            $this->session->setFlashdata($sucess_data);
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->with('error_msg', 'Failed saving Post details for <b>' . $this->request->getVar(formUtil::postName()) . '</b>');
        }
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

    //This displays list of all the posts for a particular advts
    public function getPostsListByAdvt($advt_seg1 = "", $advt_seg2 = "")
    {
        //construct the advt ID from provided segments
        $advt_id = $advt_seg2 ? $advt_seg1 . '/' . $advt_seg2 : $advt_seg1;

        $advtModel = new AdvtModel();
        //Check if the provided Advt. ID exists
        if ($advt_details = $advtModel->find($advt_id)) {
            $posts_details = $this->postModel->where(formUtil::AdvtIDName(), $advt_id)->findAll();
            $viewData = [
                'title' => 'List Post ' . $advt_id,
                'advt_no' => $advt_details[AdvtForm::getNameAdvtNo()],
                'file_ref' => $advt_details[AdvtForm::getNameFileRef()],
                'pub_date' => date('d-m-Y', strtotime($advt_details[AdvtForm::getNamePubDate()])),
                'post_details' => $posts_details
            ];
            //If exists list the posts with necessary CRUD operations
            return view('advt_view/list_posts', $viewData);
        }
        //If doesnot exists throw 404
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Invalid Advt. No. - ' . $advt_id);
    }
}
