<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            HelloPablo: Developer &amp; Interaction Engineer: Pablo de la Peña
        </title>
        <?php

            $this->asset->output('CSS');
            $this->asset->output('CSS-INLINE');

        ?>
    </head>
    <body>
        <div id="content">
            <?php

                echo anchor('', img(array(
                    'src' => 'assets/img/avatar.jpg',
                    'class' => 'avatar',
                    'alt' => 'Itsa me, Pablo'
                )));

                if ($error || $notice || $message || $success) {

                    echo '<div class="alerts">';

                        if ($error) {
                            echo '<div class="alert alert-danger">';
                                echo $error;
                            echo '</div>';
                        }

                    echo '</div>';
                }

            ?>