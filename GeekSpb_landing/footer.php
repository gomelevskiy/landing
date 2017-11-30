
<section id="footer-section">

    <div class="container">

        <div class="row">

            <div class="col-md-12 formBackFooter">
                <div class="section-title uk-scrollspy-init-inview uk-scrollspy-inview uk-animation-slide-top" data-uk-scrollspy="{cls:'uk-animation-slide-top', delay:500, repeat: true}">
                    <h1>Обратная связь</h1>
                </div>

              <div class="formBack">
                  <?php
                  $id = 32;
                  $post = get_post($id);
                  $content = $post->post_content;
                  print apply_filters('the_content', $post->post_content);
                  ?>
              </div>

            </div>

            <div class="col-md-12">

                <div class="uk-scrollspy-init-inview" data-uk-scrollspy="{cls:&#39;uk-animation-fade&#39;, delay:700, repeat: true}">

                    <div class="developer"><i>Сайт разработан Гомелевским Алексеем </i><a href="http://gomelevskij.ru/">GOMELEVSKIJ.RU</a></div>

                </div>

            </div>
        </div>
    </div>

</section>



<!-- =========================================
java script
========================================== -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.sliderTabs.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.mlens-1.3.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jflickrfeed.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/supersized.3.2.7.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/uikit.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/retina-1.1.0.js"></script>


    </body>
</html>