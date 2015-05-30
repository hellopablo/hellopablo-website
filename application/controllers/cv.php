<?php

class Cv extends NAILS_Controller
{
    public function index()
    {
        $this->load->view('structure/header', $this->data);
        $this->load->view('cv/index', $this->data);
        $this->load->view('structure/footer', $this->data);
    }
}
