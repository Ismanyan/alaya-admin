<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TreatmentController extends CI_Controller
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
        $data['title'] = 'Treatment | Kubi Code';

        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('pages/treatment/treatment');
        $this->load->view('layouts/footer');
    }

    // GET ALL TREATMENT
    public function getTreatmentAll(INT $id)
    {
        $response = request_get($this->API . '/get/admin/treatment/'.$id);

        if ($response->status == true) {
            echo json_encode($response->result);
        } else {
            echo json_encode($response->status);
        }
    }

    // Detail Treatment page
    public function treatmentHistoryDetail($id)
    {
        // Data for send to view
        $data['title'] = 'Treatment | Kubi Code';
        $data['detailId'] = $id;

        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('pages/profile/treatment_detail');
        $this->load->view('layouts/footer');
    }

    // Get my treatment history detail
    public function getTreatmentHistoryDetail($id)
    {
        $response = request_get($this->API . '/get/admin/treatment/detail/' . $id);
        echo json_encode($response->result);
    }
}
