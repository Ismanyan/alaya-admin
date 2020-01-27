<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileController extends CI_Controller
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
        // Use notif
        // notif('success','Welcome to kubicode', 'This is the message from Home/index');

        // Data for send to view
        $data['title'] = 'Profile | Kubi Code';

        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('pages/profile/profile');
        $this->load->view('layouts/footer');
    }

    public function getProfile($id) {
        $response = request_get($this->API.'/get/select/user/'.$id);

        if ($response->status == true) {
            echo json_encode($response->result);
        } else {
            echo json_encode($response->status);
        }
        
    }
}
