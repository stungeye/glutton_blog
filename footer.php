        </div> <!--! end #content --> 
        <aside id="sidebar">
            <section id="about">
                <h3>About</h3>
                <p><?= $conf['about_snippet'] ?> <a href="<?= $conf['site_url'] ?>/about" class="more">Find out more &raquo;</a></p>
            </section>

            <section id="latest">
                <h3>Latest Posts</h3>
                <ul>
                    <? foreach($latest_posts as $latest_post): ?>
                      <li><a href="<?= $conf['site_url'] . $latest_post['permalink'] ?>"><?= $latest_post['title'] ?></a></li>
                    <? endforeach; ?>
                </ul>
            </section>
            
            <section id="google_sidebar">
                <script type="text/javascript"><!--
                google_ad_client = "ca-pub-8119657288856342";
                /* Html5 Blog Side */
                google_ad_slot = "9504934000";
                google_ad_width = 160;
                google_ad_height = 600;
                //-->
                </script>
                <script type="text/javascript"
                src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                </script>
            </section>
        </aside>
        <footer>
            <p id="license">
                Public Domain - 2012
            </p>

            <p id="back-top"><a href="#content">Back to top</a></p>
        </footer>
    </div> <!--! end #wrapper -->
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-76943-8']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
    <script type="text/javascript">
    var disqus_shortname = 'mobilehtml5dev';
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
  </script>
</body>
</html>
