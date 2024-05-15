<?php

/** @var \Nails\Common\Service\View $oView */
$oView = \Nails\Factory::service('View');
$oView->load('structure/header/blank');

?>
    <header id="header">
        <?php

        echo anchor('', img([
            'src'   => asset('img/avatar.jpg'),
            'class' => 'avatar',
            'alt'   => 'Itsa me, Pablo',
        ]));

        if (!empty($pageTitle)) {

            echo '<h1 class="text-center">';
            echo !empty($pageIcon) ? '<b class="fa ' . $pageIcon . '"></b>' : '';
            echo $pageTitle;
            echo '</h2>';
        }

        ?>
    </header>
    <nav id="main-nav">
        <div id="main-nav-desktop" class="container hidden-xs">
            <div class="col-md-12">
                <?php

                echo anchor('', img([
                    'src'   => asset('img/avatar.jpg'),
                    'class' => 'avatar',
                    'alt'   => 'Itsa me, Pablo',
                ]));

                ?>
                <ul class="list-unstyled list-inline pull-left">
                    <li>
                        <a href="<?=siteUrl('code')?>" title="Code &amp; Plugins">
                            <b class="fa fa-code fa-lg"></b>
                            Code
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/hellopablo" rel="nofollow" title="GitHub">
                            <b class="fa fa-github fa-lg"></b>
                            GitHub
                        </a>
                    </li>
                    <li>
                        <a href="<?=siteUrl('cv')?>" title="CV">
                            <b class="fa fa-file-text-o fa-lg"></b>
                            CV
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled list-inline pull-right">
                    <li>
                        <a href="mailto:pablo@hellopablo.co.uk" rel="nofollow" title="Email me!">
                            <b class="fa fa-envelope-o fa-lg"></b>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="main-nav-mobile" class="hidden-sm hidden-md hidden-lg">
            <button class="burger" type="button" id="mobile-nav-toggle">
                <span class="patty"></span>
                <span class="patty"></span>
                <span class="patty"></span>
            </button>
            <?php

            echo anchor('', img([
                'src'   => asset('img/avatar.jpg'),
                'class' => 'avatar',
                'alt'   => 'Itsa me, Pablo',
            ]));

            ?>
            <div id="mobile-nav-items">
                <ul class="list-unstyled">
                    <li>
                        <a href="<?=siteUrl('code')?>" title="Code &amp; Plugins">
                            <b class="fa fa-code fa-lg"></b>
                            Code
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/hellopablo" rel="nofollow" title="GitHub">
                            <b class="fa fa-github fa-lg"></b>
                            GitHub
                        </a>
                    </li>
                    <li>
                        <a href="<?=siteUrl('cv')?>" title="CV">
                            <b class="fa fa-file-text-o fa-lg"></b>
                            CV
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled list-inline contact-items">
                    <li class="pull-right">
                        <a href="mailto:pablo@hellopablo.co.uk" rel="nofollow" title="Email me!">
                            <b class="fa fa-envelope-o fa-lg"></b>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" id="main-body">
<?php

//  @todo (Pablo 2024-05-14) - userfeedback messages
