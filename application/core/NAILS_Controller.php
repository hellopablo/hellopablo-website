<?php

/* load the class from the package */
require_once NAILS_COMMON_PATH . 'core/CORE_NAILS_Controller.php';

class NAILS_Controller extends CORE_NAILS_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->asset->load('styles.css');
        $this->asset->load('jquery/dist/jquery.min.js', 'BOWER');
        $this->asset->load('app.min.js');
        $this->asset->load('retina.js/dist/retina.min.js', 'BOWER');
    }
}
