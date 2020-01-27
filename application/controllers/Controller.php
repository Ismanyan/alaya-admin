<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_Controller
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
        $data['title'] = 'Home | Kubi Code';
        
        // Load view
        $this->load->view('layouts/header',$data);
        $this->load->view('home/index');
        $this->load->view('layouts/footer');
    }

    // STATISTIC DASHBOARD
    public function statistic()
    {
        // Data for send to view
        $data['title'] = 'Statistic | Kubi Code';

        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('home/statistic');
        $this->load->view('layouts/footer');
    }

    // Logout
    public function logout()
    {
        $logged_in = [
            'id_admin',
            'password_admin',
            'role_admin',
            'fullname_admin',
            'pin_admin',
            'token_admin',
            'logged_in_admin'
        ];
        $this->session->unset_userdata($logged_in);
        redirect(base_url('login'));
    }

    // 404 Not Found
    public function page_not_found()
    {
        $this->load->view('errors/404');
    }
}
