        </div> <!--! end #content -->
        <? require 'sidebar.php' ?>
        <footer>
            <p id="license">
                Public Domain - 2012
            </p>

            <p id="back-top"><a href="#content">Back to top</a></p>
        </footer>
    </div> <!--! end #wrapper -->
    <? if(isset($conf['google_analytics'])): ?>
        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', '<?= $conf['google_analytics'] ?>']);
          _gaq.push(['_trackPageview']);
    
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
    <? endif; ?>
    <? if(isset($conf['disqus_shortname'])): ?>
        <script type="text/javascript">
        var disqus_shortname = '<?= $conf['disqus_shortname'] ?>';
        (function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
        </script>
    <? endif; ?>
</body>
</html>
