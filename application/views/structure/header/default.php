<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
        <?php

            if (!empty($page->title)) {

                echo $page->title . ' : ';
            }

            echo 'HelloPablo: Developer &amp; Interaction Engineer: Pablo de la Peña';

        ?>
        </title>
        <?php

            $this->asset->output('CSS');
            $this->asset->output('CSS-INLINE');

        ?>
    </head>
    <body>
        <header id="header">
        <?php

            echo anchor('', img(array(
                'src' => 'assets/img/avatar.jpg',
                'class' => 'avatar',
                'alt' => 'Itsa me, Pablo'
            )));

            if (empty($blog) && !empty($page->title)) {

                echo '<h1 class="text-center">';
                    echo !empty($page->icon) ? '<b class="fa ' . $page->icon. '"></b>' : '';
                    echo $page->title;
                echo '</h2>';
            }

        ?>
        </header>
        <nav id="main-nav">
            <div id="main-nav-desktop" class="container hidden-xs">
                <div class="col-md-12">
                <?php

                    echo anchor('', img(array(
                        'src' => 'assets/img/avatar.jpg',
                        'class' => 'avatar',
                        'alt' => 'Itsa me, Pablo'
                    )));

                    ?>
                    <ul class="list-unstyled list-inline pull-left">
                        <li>
                            <a href="<?=site_url('code')?>" title="Code &amp; Plugins">
                                <b class="fa fa-code fa-lg"></b>
                                Code
                            </a>
                        </li>
                        <li>
                            <a href="<?=site_url('blog')?>" title="Blog">
                                <b class="fa fa-book fa-lg"></b>
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/hellopablo" rel="nofollow" title="GitHub">
                                <b class="fa fa-github fa-lg"></b>
                                GitHub
                            </a>
                        </li>
                        <li>
                            <a href="<?=site_url('cv')?>" title="CV">
                                <b class="fa fa-file-text-o fa-lg"></b>
                                CV
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled list-inline pull-right">
                        <li>
                            <a href="tel:+447737398274" rel="nofollow" title="Call me!">
                                <b class="fa fa-phone fa-lg"></b>
                            </a>
                        </li>
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

                    echo anchor('', img(array(
                        'src' => 'assets/img/avatar.jpg',
                        'class' => 'avatar',
                        'alt' => 'Itsa me, Pablo'
                    )));

                ?>
                <div id="mobile-nav-items">
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?=site_url('code')?>" title="Code &amp; Plugins">
                                <b class="fa fa-code fa-lg"></b>
                                Code
                            </a>
                        </li>
                        <li>
                            <a href="<?=site_url('blog')?>" title="Blog">
                                <b class="fa fa-book fa-lg"></b>
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/hellopablo" rel="nofollow" title="GitHub">
                                <b class="fa fa-github fa-lg"></b>
                                GitHub
                            </a>
                        </li>
                        <li>
                            <a href="<?=site_url('cv')?>" title="CV">
                                <b class="fa fa-file-text-o fa-lg"></b>
                                CV
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled list-inline contact-items">
                        <li class="pull-left">
                            <a href="tel:+447737398274" rel="nofollow" title="Call me!">
                                <b class="fa fa-phone fa-lg"></b>
                            </a>
                        </li>
                        <li class="pull-right">
                            <a href="mailto:pablo@hellopablo.co.uk" rel="nofollow" title="Email me!">
                                <b class="fa fa-envelope-o fa-lg"></b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php

            $sAdditionalClasses = '';
            if (!empty($blog)) {

                $sAdditionalClasses = 'reduce-offset';
            }

        ?>
        <div class="container <?=$sAdditionalClasses?>" id="main-body">
        <?php

            if ($error || $notice || $message || $success) {

                echo '<div class="alerts">';

                    if ($error) {
                        echo '<div class="alert alert-danger">';
                            echo $error;
                        echo '</div>';
                    }

                echo '</div>';
            }