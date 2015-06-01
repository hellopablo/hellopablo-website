<?php

class Home extends NAILS_Controller
{
    public function index()
    {
    	$this->data['page']->title = 'Pablo de la Pe&ntilde;a';
        $this->load->view('structure/header', $this->data);
        $this->load->view('home/index', $this->data);
        $this->load->view('structure/footer', $this->data);
    }
}
