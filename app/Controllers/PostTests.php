<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\PostFormNames as postsForm;
use App\Libraries\TestForm as formUtils;
use App\Models\PostModel;
use App\Models\TestsModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class PostTests extends BaseController
{
    protected $helpers = ['form'];
    protected $postModel;
    protected $db;
    protected $session;
    private $testTypes = ['omr', 'written', 'interview'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->postModel = new PostModel();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    /**
     * function to show test notification entry form
     */
    public function testEntry($test_type = "", $post_id = "")
    {
        if (in_array($test_type, $this->testTypes) && $post_details = $this->postModel->find($post_id)) {
            $view_data = [
                'title' => strtoupper($test_type) . " | Test Details",
                'test_type' => strtoupper($test_type),
                'post_details' => $post_details
            ];
            return view('add_test', $view_data);
        }

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Invalid Service Request !!');
    }

    public function insert()
    {
        //Check if the exam detail already registered
        $testsModel = new TestsModel();
        if ($test_details = $testsModel->existTest($this->request->getVar(formUtils::test_type_name()), $this->request->getVar(formUtils::post_id_name()))) {
            return redirect()->back()->withInput()->with('error_msg', strtoupper($this->request->getVar(formUtils::test_type_name())) . " Test already registered vide Notification " . $test_details[formUtils::notif_no_name()] . ' for the post.');
        }

        //VALIDATION AND SANITIZATION OF INCOMING DATA
        $validation = service('validation');
        formUtils::set_rules_for($validation);
        //IF validation rules FAIL redirect back to Test details entry page with input data
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput();
        }

        //Check if entered test dates are valid
        $testDates = formUtils::getTestDates($this->request->getPost());
        if (!formUtils::validateTestDates($testDates)) {
            $data['_ci_validation_errors'] = ['test_date_1' => "Test date(s) field is required and format is DD-MM-YYYY"];
            $this->session->setFlashdata($data);
            return redirect()->back()->withInput();
        }

        $builder_tests = $this->db->table('tests');
        $builder_tst_dates = $this->db->table('test_dates');

        $tests_data = [
            formUtils::post_id_name() => $this->request->getPost(formUtils::post_id_name()),
            formUtils::test_type_name() => $this->request->getPost(formUtils::test_type_name()),
            formUtils::notif_link_name() => $this->request->getPost(formUtils::notif_link_name()),
            formUtils::notif_no_name() => $this->request->getPost(formUtils::notif_no_name()),
            formUtils::notif_date_name() => formUtils::getDBFormatDate($this->request->getPost(formUtils::notif_date_name())),
            formUtils::test_note_name() => $this->request->getPost(formUtils::test_note_name())
        ];

        try {
            $this->db->transException(true)->transStart();
            $builder_tests->insert($tests_data);
            $test_id = $this->db->insertID();
            foreach ($testDates as $key => $value) {
                $data = [
                    'test_date' => formUtils::getDBFormatDate($value),
                    'test_id ' => $test_id
                ];
                $this->db->transStart();
                $builder_tst_dates->insert($data);
                $this->db->transComplete();
            }
            $this->db->transComplete();
            // Check if the Transaction is rolled back
            if ($this->db->transStatus() === false) {
                return redirect()->back()->withInput()->with('error_msg', "Transaction Failed | Couldn't Save Test details.");
            }

            return redirect()->back()->with('succes_msg', $this->request->getPost(formUtils::test_type_name()) . ' test details Saved Successfully.');
        } catch (DatabaseException $e) {
            echo $e->getMessage();
        }
    }
}
