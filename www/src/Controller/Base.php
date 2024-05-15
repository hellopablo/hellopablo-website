<?php

namespace App\Controller;

use Nails\Common\Exception\FactoryException;
use Nails\Common\Exception\NailsException;
use Nails\Common\Service\Asset;
use Nails\Factory;

/**
 * Class Base
 *
 * @package App\Controller
 */
abstract class Base extends \Nails\Common\Controller\Base
{
    /**
     * Construct the controller
     * Code that is defined in here is executed before the controller which
     * is being called by the URL. It is common to load site-wide assets in
     * here, or to define site-wide variables.
     *
     * @throws FactoryException
     * @throws NailsException
     */
    public function __construct()
    {
        /**
         * It is important to call the parent constructor in order to ensure
         * expected functionality is inherited properly.
         */
        parent::__construct();

        $this->oMetaData
            ->setAppName('Pablo de la Pe&ntilde;a : HelloPablo : Developer &amp; Interaction Engineer')
            ->setTitleSeparator(' : ');

        $this
            ->loadAssets();
    }

    // --------------------------------------------------------------------------

    /**
     * Load global assets
     *
     * @return $this
     * @throws FactoryException
     */
    protected function loadAssets(): self
    {
        /** @var Asset $oAsset * */
        $oAsset = Factory::service('Asset');
        $oAsset
            ->load('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.min.css')
            ->load('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css')
            ->load('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css')
            ->load('https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.0/animate.min.css')
            ->load('app.css')
            ->load('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js')
            ->load('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js')
            ->load('https://cdnjs.cloudflare.com/ajax/libs/retina.js/1.3.0/retina.min.js')
            ->load('app.js');

        return $this;
    }
}
