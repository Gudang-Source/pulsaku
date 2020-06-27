<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 2) {
            redirect(base_url("login"));
        }
        //  $this->load->library('Pdf');
    }
    public function index()
    {
        $data = [
            'name' => $this->session->userdata('nama'),
            'title' => 'Welcome to Kasir',
            'conten' => 'conten/home'
        ];
        $this->load->view('template/conten3', $data);
    }
}
