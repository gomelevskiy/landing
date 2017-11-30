<?php get_header();?>

    <div id="Loader" style="display: none;">
        <div id="circle"></div>
        <div id="circle1"></div>
    </div>

    <section id="home-section" style="position: relative;">
        <div class="number">
            <?php
            $id = 34;
            $post = get_post($id);
            $content = $post->post_content;
            print apply_filters('the_content', $post->post_content);
            ?>
        </div>
        <img src="<?php the_field('picture',5); ?>"/>
        <div class="collback">
            <h4>Обратная связь</h4>
            <?php
            $id = 32;
            $post = get_post($id);
            $content = $post->post_content;
            print apply_filters('the_content', $post->post_content);
            ?>
        </div>
    </section>

    <section id="feature-section">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <?php
                    $id = 10;
                    $post = get_post($id);
                    $content = $post->post_content;
                    print apply_filters('the_content', $post->post_content);
                    ?>

                </div>

                <div class="col-md-4">

                    <div class="feature-box-style-2 uk-scrollspy-init-inview" data-uk-scrollspy="{cls:&#39;uk-animation-slide-left&#39;, delay:500, repeat: true}">

                        <div class="feature-icon">
                            <i class="fa fa-clock-o"></i>
                        </div>

                        <div class="feature-title">
                            <h4><?php the_field('titleClock',10); ?></h4>
                        </div>

                        <div class="feature-desc">
                            <p><?php the_field('textClock',10); ?></p>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="feature-box-style-2 uk-scrollspy-init-inview" data-uk-scrollspy="{cls:&#39;uk-animation-fade&#39;, delay:500, repeat: true}">

                        <div class="feature-icon">
                            <i class="fa fa-bullseye"></i>
                        </div>

                        <div class="feature-title">
                            <h4><?php the_field('titleCircle',10); ?></h4>
                        </div>

                        <div class="feature-desc">
                            <p><?php the_field('textCircle',10); ?></p>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="feature-box-style-2 uk-scrollspy-init-inview" data-uk-scrollspy="{cls:&#39;uk-animation-slide-right&#39;, delay:500, repeat: true}">

                        <div class="feature-icon">
                            <i class="fa fa-inbox"></i>
                        </div>

                        <div class="feature-title">
                            <h4><?php the_field('titleBox',10); ?></h4>
                        </div>

                        <div class="feature-desc">
                            <p><?php the_field('textBox',10); ?></p>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="feature-box-style-2 uk-scrollspy-init-inview" data-uk-scrollspy="{cls:&#39;uk-animation-slide-left&#39;, delay:700, repeat: true}">

                        <div class="feature-icon">
                            <i class="fa fa-money"></i>
                        </div>

                        <div class="feature-title">
                            <h4><?php the_field('titleMoney',10); ?></h4>
                        </div>

                        <div class="feature-desc">
                            <p><?php the_field('textMoney',10); ?></p>
                        </div>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="feature-box-style-2 uk-scrollspy-init-inview" data-uk-scrollspy="{cls:&#39;uk-animation-fade&#39;, delay:700, repeat: true}">

                        <div class="feature-icon">
                            <i class="fa fa-headphones"></i>
                        </div>

                        <div class="feature-title">
                            <h4><?php the_field('titleVolume',10); ?></h4>
                        </div>

                        <div class="feature-desc">
                            <p><?php the_field('textVolume',10); ?></p>
                        </div>

                    </div>

                </div>

                <div class="col-md-4 uk-scrollspy-init-inview" data-uk-scrollspy="{cls:&#39;uk-animation-slide-right&#39;, delay:700, repeat: true}">

                    <div class="feature-box-style-2">

                        <div class="feature-icon">
                            <i class="fa fa-coffee"></i>
                        </div>

                        <div class="feature-title">
                            <h4><?php the_field('titleTea',10); ?></h4>
                        </div>

                        <div class="feature-desc">
                            <p><?php the_field('textTea',10); ?></p>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </section>

    <!-- arrows-section -->
    <section class="arrows-section">
        <a href="#works-section" title="<?php the_field('titleColl',17); ?>" class="scrollto">
            <i class="fa fa-angle-down"></i>
        </a>
        <a href="#home-section" title="Добро пожаловать!" class="scrollto">
            <i class="fa fa-angle-up"></i>
        </a>
    </section>
    <!-- /arrows-section -->

    <section id="works-section">

        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <?php
                    $id = 17;
                    $post = get_post($id);
                    $content = $post->post_content;
                    print apply_filters('the_content', $post->post_content);
                    ?>

                </div>

                <div class="col-md-12">

                    <div class="ui-slider-tabs" id="WorksTabs">

                        <ul>

                            <li style="height: 32px;">
                                <a style="height: 32px;" href="#application" title="Заявка">Заявка</a>
                            </li>

                            <li class="" style="height: 32px;">
                                <a style="height: 32px;" href="#decision" title="Решение">Решение</a>
                            </li>

                            <li class="" style="height: 32px;">
                                <a style="height: 32px;" href="#testing" title="Тестирование">Тестирование</a>
                            </li>

                            <li class="" style="height: 32px;">
                                <a style="height: 32px;" href="#payment" title="Оплата">Оплата</a>
                            </li>

                        </ul>

                        <div id="application">
                            <div class="col-md-6 no-pad-left">
                                <div class="section-short-title">
                                    <h1><?php the_field('titleColl',17); ?></h1>
                                </div>
                                <div class="section-short-desc">
                                    <p>
                                        <?php the_field('textColl',17); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 no-pad-right">
                                <div class="feature-image">
                                    <img style="width: 58%; margin-left: 122px;" src="<?php the_field('picColl',17); ?>" title="<?php the_field('titleColl',17); ?>"/>
                                </div>
                            </div>
                        </div>
                        <div id="testing">
                            <div class="col-md-6 no-pad-left">
                                <div class="section-short-title">
                                    <h1><?php the_field('titleTest',17); ?></h1>
                                </div>
                                <div class="section-short-desc">
                                    <p>
                                        <?php the_field('textTest',17); ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 no-pad-right">
                                <div class="feature-image">
                                    <img src="<?php the_field('picTest',17); ?>" alt="<?php the_field('titleTest',17); ?>"/>
                                </div>
                            </div>
                        </div>
                        <div id="decision">
                            <div class="col-md-6 no-pad-left">
                                <div class="feature-image">
                                    <img src="<?php the_field('picWork',17); ?>" alt="<?php the_field('titleWork',17); ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6 no-pad-right">
                                <div class="section-short-title">
                                    <h1><?php the_field('titleWork',17); ?></h1>
                                </div>
                                <div class="section-short-desc">
                                    <p>
                                        <?php the_field('textWork',17); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="payment">
                            <div class="col-md-6 no-pad-left">
                                <div class="section-short-title">
                                    <h1><?php the_field('titlePay',17); ?></h1>
                                </div>
                                <div class="section-short-desc">
                                    <p>
                                        <?php the_field('textPay',17); ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 no-pad-right">
                                <div class="feature-image">
                                    <img src="<?php the_field('picPay',17); ?>" alt="<?php the_field('titlePay',17); ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!-- /col-md-12 -->


            </div><!-- /row -->
        </div><!-- /container -->

    </section>

    <!-- arrows-section -->
    <section class="arrows-section">
        <a href="#portfolio-section" title="<?php the_field('el1',23); ?>" class="scrollto">
            <i class="fa fa-angle-down"></i>
        </a>
        <a href="#feature-section" title="<?php the_field('titlePay',17); ?>" class="scrollto">
            <i class="fa fa-angle-up"></i>
        </a>
    </section>
    <!-- /arrows-section -->

    <section id="portfolio-section">

        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <?php
                    $id = 23;
                    $post = get_post($id);
                    $content = $post->post_content;
                    print apply_filters('the_content', $post->post_content);
                    ?>

                </div>

                <div class="col-md-12 no-pad-right no-pad-left">

                    <div class="owl-portfolio owl-carousel">

                        <div class="owl-item" style="width: 293px;">
                            <div class="portfolio-item">
                                <?php the_field('el1',23); ?>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 293px;">
                            <div class="portfolio-item">
                                <?php the_field('el2',23); ?>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 293px;">
                            <div class="portfolio-item">
                                <?php the_field('el3',23); ?>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 293px;">
                            <div class="portfolio-item">
                                <?php the_field('el4',23); ?>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 293px;">
                            <div class="portfolio-item">
                                <?php the_field('el5',23); ?>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 293px;">
                            <div class="portfolio-item">
                                <?php the_field('el6',23); ?>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 293px;">
                            <div class="portfolio-item">
                                <?php the_field('el7',23); ?>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 293px;">
                            <div class="portfolio-item">
                                <?php the_field('el8',23); ?>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </section>

    <!-- arrows-section -->
    <section class="arrows-section">
        <a href="#ready-section" title="<?php the_field('titleStar',27); ?>" class="scrollto">
            <i class="fa fa-angle-down"></i>
        </a>
        <a href="#works-section" title="<?php the_field('el1',23); ?>" class="scrollto">
            <i class="fa fa-angle-up"></i>
        </a>
    </section>
    <!-- /arrows-section -->

    <section id="ready-section">

        <div class="container">
            <div class="row">

                <div class="col-md-6 readyHeights">

                    <?php
                    $id = 27;
                    $post = get_post($id);
                    $content = $post->post_content;
                    print apply_filters('the_content', $post->post_content);
                    ?>

                    <div class="section-short-title uk-scrollspy-init-inview" data-uk-scrollspy="{cls:&#39;uk-animation-slide-top&#39;, delay:500, repeat: true}">
                        <h1><?php the_field('titleStar',27); ?></h1>
                    </div>

                    <div class="col-md-9 no-pad-left">

                        <ul class="mini-feature-list uk-scrollspy-init-inview" data-uk-scrollspy="{cls:&#39;uk-animation-slide-left&#39;, delay:900, repeat: true}">
                            <li><i class="fa fa-check-circle-o"></i><?php the_field('pr1',27); ?></li>
                            <li><i class="fa fa-check-circle-o"></i><?php the_field('pr2',27); ?></li>
                            <li><i class="fa fa-check-circle-o"></i><?php the_field('pr3',27); ?></li>
                            <li><i class="fa fa-check-circle-o"></i><?php the_field('pr4',27); ?></li>
                            <li><i class="fa fa-check-circle-o"></i><?php the_field('pr5',27); ?></li>
                        </ul>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="feature-image uk-scrollspy-init-inview" data-uk-scrollspy="{cls:&#39;uk-animation-slide-right&#39;, delay:1300, repeat: true}">
                        <img src="<?php the_field('picStar',27); ?>" alt="<?php the_field('titleStar',27); ?>"/>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!-- arrows-section -->
    <section class="arrows-section">
        <a href="#home-section" title="Вперед к звездам" class="scrollto"><i class="fa fa-angle-up"></i></a>
    </section>
    <!-- /arrows-section -->



<?php get_footer();?>