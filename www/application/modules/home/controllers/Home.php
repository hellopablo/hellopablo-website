<?php

use App\Controller\Base;
use Nails\Common\Exception\FactoryException;
use Nails\Factory;

/**
 * Class Home
 */
class Home extends Base
{
    public function index(): void
    {
        Factory::service('View')
            ->load([
                'structure/header',
                'home/index',
                'structure/footer',
            ]);
    }
}
