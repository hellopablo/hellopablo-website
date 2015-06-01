<?php

class Cv extends NAILS_Controller
{
    public function index()
    {
    	$this->data['page']->title = 'CV';
    	$this->data['page']->icon = 'fa-file-text-o';
        $this->load->view('structure/header', $this->data);
        $this->load->view('cv/index', $this->data);
        $this->load->view('structure/footer', $this->data);
    }
}
