<?php

use App\Controller\Base;
use Nails\Common\Exception\FactoryException;
use Nails\Factory;

/**
 * Class Code
 */
class Code extends Base
{
    public function index(): void
    {

        $this->oMetaData->setTitles(['Code']);

        Factory::service('View')
            ->setData([
                'pageTitle' => 'Code',
                'pageIcon'  => 'fa-code',
            ])
            ->load([
                'structure/header',
                'code/index',
                'structure/footer',
            ]);
    }
}
