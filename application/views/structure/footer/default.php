        </div>
        <footer id="footer" class="text-center">
            &copy; Pablo de la Pe&ntilde;a <?=date('Y')?> &ndash; @hellopablo
        </footer>
        <?php

            $this->asset->output('JS');
            $this->asset->output('JS-INLINE');

            if (ENVIRONMENT === 'PRODUCTION') {

                ?>
                <script>
                    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                    ga('create', 'UA-21238338-1', 'auto');
                    ga('send', 'pageview');
                </script>
                <?php

            }

        ?>
    </body>
</html>