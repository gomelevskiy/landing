<?php
/*
Template Name: Template main page
*/
?>

<?php get_header(); ?>

    <!-- Banner Section -->
    <div id="home-banner" class="container-fluid no-padding banner-section home-banner">
        <!-- Container -->
        <div class="container">
            <div id="main-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="col-md-6 col-sm-6 no-padding">
                            <div class="banner-left">
                                <h3><?php the_field('s1_title',6); ?></h3>
                                <p><?php the_field('s1_text',6); ?></p>
                                <a href="<?php the_field('s1_link',6); ?>">Подробнее</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 no-padding">
                            <div class="banner-right">
                                <img src="<?php the_field('s1_img',6); ?>" alt="<?php bloginfo('name'); ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-6 col-sm-6 no-padding">
                            <div class="banner-left">
                                <h3><?php the_field('s2_title',6); ?></h3>
                                <p><?php the_field('s2_text',6); ?></p>
                                <a href="<?php the_field('s2_link',6); ?>">Подробнее</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 no-padding">
                            <div class="banner-right">
                                <img src="<?php the_field('s2_img',6); ?>" alt="<?php bloginfo('name'); ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Container /- -->

            <!-- Shape -->
            <div class="banner-shape container-fluid no-padding">
                <div class="col-md-6 col-sm-6 col-xs-6 shape-left no-padding">
                    <div class="left-shape-blue">
                        <svg width="100%" height="100%">
                            <clipPath id="clipPolygon2" clipPathUnits="objectBoundingBox">
                                <polygon points="0 0, 0 100, 120 100, 0 0"></polygon>
                            </clipPath>
                        </svg>
                    </div>
                    <div class="left-shape">
                        <svg width="100%" height="100%">
                            <clipPath id="clipPolygon1" clipPathUnits="objectBoundingBox">
                                <polygon points="0 0, 0 100, 100 100, 0 0"></polygon>
                            </clipPath>
                        </svg>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 shape-right no-padding">
                    <div class="right-shape-blue">
                        <svg width="100%" height="100%">
                            <clipPath id="clipPolygon3" clipPathUnits="objectBoundingBox">
                                <polygon points="1 0.2, 0 1, 0 0.835, 1 0"></polygon>
                            </clipPath>
                        </svg>
                    </div>
                    <div class="right-shape">
                        <svg width="100%" height="100%">
                            <clipPath id="clipPolygon4" clipPathUnits="objectBoundingBox">
                                <polygon points="1 0, 0 1, 100 100, 100 0"></polygon>
                            </clipPath>
                        </svg>
                    </div>
                </div>
            </div><!-- Shape /- -->
        </div><!-- Banner Section /- -->

        <!-- Message Borad -->
        <div id="message-borad" class="container-fluid no-padding message-borad">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <!-- Emargency Case -->
                    <div class="col-md-6 col-sm-6 emargency-case">
                        <div class="col-md-6 message-block no-left-padding">
                            <h3><?php the_field('block1_title',6); ?></h3>
                            <p><?php the_field('block1_text',6); ?></p>
                            <a href="<?php the_field('block1_link',6); ?>">Подробнее<i class="fa fa-caret-right"></i></a>
                        </div>
                        <div class="col-md-6 message-block no-right-padding">
                            <h3><?php the_field('block2_title',6); ?></h3>
                            <p><?php the_field('block2_text',6); ?></p>
                            <a href="<?php the_field('block2_link',6); ?>">Подробнее<i class="fa fa-caret-right"></i></a>
                        </div>
                    </div><!-- Emargency Case /- -->
                    <!-- Opening Hours -->
                    <div class="col-md-6 col-sm-6 opening-hours">
                        <div class="col-md-6 message-block no-padding">
                            <h3>Часы приёма:</h3>
                            <ul>
                                <li><?php the_field('grafic',6); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 message-block">
                            <h3><?php the_field('block3_title',6); ?></h3>
                            <p><?php the_field('block3_text',6); ?></p>
                            <a href="<?php the_field('block3_link',6); ?>">Подробнее<i class="fa fa-caret-right"></i></a>
                        </div>
                    </div><!-- Opening Hours /- -->
                </div>
            </div><!-- Container /- -->
        </div><!-- Message Borad /- -->

        <!-- Service Section -->
        <div id="service-section" class="container-fluid no-padding service-section">
            <!-- Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <!-- Service -->
                    <div class="col-md-8 col-sm-12 col-xs-12 service">
                        <div class="section-header">
                            <h3>Виды медицинских услуг</h3>
                            <p>
                                <?php
                                $my_post_obj = get_post( 12 );
                                echo $my_post_obj->post_content;
                                ?>
                            </p>
                        </div>
                        <div class="row">
                            <?php $i = 0; $id=4; $recent = new WP_Query("cat=$id&showposts=$n"); while($recent->have_posts()) : $recent->the_post(); ?>
                                <div id="usluga-<?php echo $i ?>" class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="service-block">
                                        <div class="service-block-icon">
                                            <i><img src="<?php bloginfo('template_directory'); ?>/images/heart-ic.png" alt="<?php bloginfo('name'); ?>"/></i>
                                            <i><img src="<?php bloginfo('template_directory'); ?>/images/heart-ic-white.png" alt="<?php bloginfo('name'); ?>"/></i>
                                        </div>
                                        <div class="service-block-content">
                                            <h3><?php the_title(); ?></h3>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; endwhile; ?>
                        </div>
                    </div><!-- Service /- -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <!-- Appointment Form -->
                        <div class="appoinment-form">
                            <h3><img src="<?php bloginfo('template_directory'); ?>/images/appoinment.png" alt="<?php bloginfo('name'); ?>"/>Заявка на прием</h3>
                            <style>
                                .screen-reader-response {
                                    display: none;
                                }
                                .wpcf7-response-output {
                                    display: inline-block;
                                    width: 100%;
                                    margin-top: 20px;
                                }
                                .wpcf7-not-valid {
                                    border-color: #ce5454;
                                }
                            </style>
                            <?php the_field('form2',12); ?>

                        </div><!-- Appointment Form /- -->
                    </div>
                </div>
            </div><!-- Container /- -->
        </div><!-- Service Section /- -->

        <!-- Call Out -->
        <div id="call-out" class="container-fluid no-padding call-out">
            <!-- Container -->
            <div class="container">
                <div class="call-out-content row">
                    <div class="col-md-10 col-sm-9 col-xs-12">
                        <h3>Методы лечения</h3>
                        <p>Медицинский наркологический центр "Клиника доктора Лапошина"</p>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-12">

                    </div>
                </div>
            </div><!-- Container /- -->
        </div><!-- Call Out /- -->

        <!-- What We Do Best -->
        <div id="what-we-do-best" class="container-fluid no-padding what-we-do-best">
            <!-- What We Do Best Left -->
            <div class="what-we-do-left col-md-4 no-padding">
                <img src="<?php bloginfo('template_directory'); ?>/images/bg6.jpg" alt="<?php bloginfo('name'); ?>">
            </div><!-- What We Do Best Left /- -->
            <!-- What We Do Best Right -->
            <div class="col-md-8 what-we-do-right no-padding">

                <?php $i = 0; $id=5; $recent = new WP_Query("cat=$id&showposts=$n"); while($recent->have_posts()) : $recent->the_post(); ?>
                <div id="category-<?php echo $i ?>" class="col-md-4 col-sm-4 col-xs-6 no-padding">
                    <div class="what-we-do-block">
                        <img src="<?php the_field('img_rubric'); ?>" alt="<?php bloginfo('name'); ?>"/>
                        <div class="what-we-do-block-content">
                            <h5><?php the_title(); ?></h5>
                        </div>
                    </div>
                </div>
                <?php $i++; endwhile; ?>

            </div><!-- What We Do Best Right /- -->
        </div><!-- What We Do Best /- -->

    <!-- Team Section -->
    <div id="team-section" class="container-fluid no-paddding team-section">
        <div class="container">
            <div class="section-header">
                <h3>Лицензия</h3>
                <p style="text-align: center;">
                    <?php the_field('l_text',12); ?>
                </p>
            </div>
            <div class="team-carousel" style="text-align: center;">
                <div class="col-md-12 team-type">
                    <a data-lightbox="license" href="<?php the_field('l1_img',12); ?>"><img style="max-width: 350px; border: 6px solid #2098df;" src="<?php the_field('l1_img',12); ?>" alt="<?php bloginfo('name'); ?>"/></a>
                </div>
                <div class="col-md-12 team-type">
                    <a data-lightbox="license" href="<?php the_field('l2_img',12); ?>"><img style="max-width: 350px; border: 6px solid #2098df;" src="<?php the_field('l2_img',12); ?>" alt="<?php bloginfo('name'); ?>"/></a>
                </div>
            </div>
        </div>
    </div><!-- Team Section -->

    <!-- Departments Section -->
    <div class="container-fluid no-padding department-section">
        <div class="we-are-best col-md-12 col-sm-12 no-padding">
            <div class="section-header">
                <h3>Стоимость услуг</h3><br/>
            </div>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php $i = 0; $id=3; $recent = new WP_Query("cat=$id&showposts=$n"); while($recent->have_posts()) : $recent->the_post(); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="dept-heading<?php echo $i ?>">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-parent="#accordion" aria-expanded="false">
                                    <?php the_title(); ?><i class="fa fa-plus pull-right"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="dept-type-<?php echo $i ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="dept-heading<?php echo $i ?>">
                            <div class="panel-body">
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php $i++; endwhile; ?>
            </div>
        </div>
    </div><!-- Departments Section /- -->


<?php get_footer(); ?>