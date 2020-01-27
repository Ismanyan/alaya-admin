<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsentController extends CI_Controller
{
    /**
     * Default controller
     *
     */

    var $API = "";

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->logged_in_admin) {
            redirect(base_url('login'));
        }

        $this->API = getenv('APP_REST_URL');
    }

    //  Index Page
    public function index()
    {
        // Data for send to view
        $data['title'] = 'Absent | Kubi Code';

        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('pages/absent/absent');
        $this->load->view('layouts/footer');
    }

    // GET ALL Absent
    public function getAbsentAll(INT $id)
    {
        $response = request_get($this->API . '/get/admin/absent/' . $id);

        if ($response->status == true) {
            echo json_encode($response->result);
        } else {
            echo json_encode($response->status);
        }
    }

    // Detail Absent page
    public function AbsentHistoryDetail($id)
    {
        // Data for send to view
        $data['title'] = 'Absent | Kubi Code';
        $data['detailId'] = $id;

        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('pages/profile/absent_detail');
        $this->load->view('layouts/footer');
    }

    // Get my Absent history detail
    public function getAbsentHistoryDetail($id)
    {
        $response = request_get($this->API . '/get/admin/absent/detail/' . $id);
        echo json_encode($response->result);
    }
}
