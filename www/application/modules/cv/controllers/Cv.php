<?php

use App\Controller\Base;
use Nails\Common\Exception\FactoryException;
use Nails\Factory;

/**
 * Class Cv
 */
class Cv extends Base
{
    public function index(): void
    {
        $this->oMetaData->setTitles(['CV']);

        Factory::service('View')
            ->setData([
                'pageTitle' => 'CV',
                'pageIcon'  => 'fa-file-text-o',
            ])
            ->load([
                'structure/header',
                'cv/index',
                'structure/footer',
            ]);
    }
}
