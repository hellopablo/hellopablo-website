<?php

class Code extends NAILS_Controller
{
    public function index()
    {
    	$this->data['page']->title = 'Code';
    	$this->data['page']->icon = 'fa-code';
        $this->load->view('structure/header', $this->data);
        $this->load->view('code/index', $this->data);
        $this->load->view('structure/footer', $this->data);
    }
}
