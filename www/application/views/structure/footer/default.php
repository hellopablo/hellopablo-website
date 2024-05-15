</div>
<footer id="footer" class="text-center">
    &copy; Pablo de la Pe&ntilde;a <?=date('Y')?> &ndash; @hellopablo
</footer>
<?php

/** @var \Nails\Common\Service\View $oView */
$oView = \Nails\Factory::service('View');
$oView->load('structure/footer/blank');
