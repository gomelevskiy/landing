<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true);
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />

    <!-- Standard Favicon -->
<!--    <link rel="icon" type="image/x-icon" href="--><?php //bloginfo('template_directory'); ?><!--/favicon.ico" />-->
    <link href="<?php bloginfo('template_directory'); ?>/images/114x114.png" rel="apple-touch-icon-precomposed" sizes="144x144" />
    <link href="<?php bloginfo('template_directory'); ?>/images/114x114.png" rel="apple-touch-icon-precomposed" sizes="114x114" />
    <link href="<?php bloginfo('template_directory'); ?>/images/114x114.png" rel="apple-touch-icon-precomposed" sizes="72x72" />
    <link href="<?php bloginfo('template_directory'); ?>/images/114x114.png" rel="apple-touch-icon-precomposed" sizes="57x57" />
    <link href="<?php bloginfo('template_directory'); ?>/images/32x32.png" rel="icon" type="image/png" sizes="32x32" />
    <link href="<?php bloginfo('template_directory'); ?>/images/32x32.png" rel="icon" type="image/png" sizes="16x16" />

    <title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <link href="<?php bloginfo('template_directory'); ?>/lib/bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php bloginfo('template_directory'); ?>/lib/animate/animate.css" rel="stylesheet"/>
    <link href="<?php bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet"/>
    <link href="<?php bloginfo('template_directory'); ?>/css/media.css" rel="stylesheet"/>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<header id="header" class="header h">
    <div class="container">
        <div class="header_topline">
            <div class="menu-mobile-btn" data-toggle="collapse" data-target="#navigation-mobile"></div>
            <div class="logo wow fadeIn" data-wow-delay="0.30s">
                <a href="/"><?php the_field('logo',5); ?></a>
            </div>
            <div class="btn-feedback show-modal wow fadeIn" data-wow-delay="0.30s"><span>заказать продукт</span></div>
        </div>
        <h1 class="header_article wow fadeIn" data-wow-delay="0.60s"><?php the_field('h1',5); ?></h1>
        <div class="btn btn-green btn-center show-modal wow fadeInUp" data-wow-delay="1.20s"><?php the_field('btn_txt',5); ?></div>
    </div>
    <div class="header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="header_bottom-item"><?php the_field('pr_1',5); ?></div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="header_bottom-item"><?php the_field('pr_2',5); ?></div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="header_bottom-item"><?php the_field('pr_3',5); ?></div>
                </div>
            </div>
        </div>
    </div>
    <span class="scroll"><a href="#section1" class="next-btn">далее</a></span>
</header>

<div id="navigation" class="navigation scroll">
    <ul>
        <li class="navigation-item">
            <a href="#section1" data-number="1">
                <span class="dot">01</span>
            </a>
        </li>
        <li class="navigation-item">
            <a href="#section3" data-number="2">
                <span class="dot">02</span>
            </a>
        </li>
        <li class="navigation-item">
            <a href="#section5" data-number="3">
                <span class="dot">03</span>
            </a>
        </li>
        <li class="navigation-item">
            <a href="#section6" data-number="4">
                <span class="dot">04</span>
            </a>
        </li>
    </ul>
    <a href="#header" class="top-btn">наверх</a>
</div>

<div id="navigation-mobile" class="navigation-mobile">
    <ul>
        <li class="navigation-item">
            <a href="#section1" data-number="1">
                <span class="dot"><?php the_field('s1_article',5); ?></span>
            </a>
        </li>
        <li class="navigation-item">
            <a href="#section2" data-number="2">
                <span class="dot"><?php the_field('s2_article',5); ?></span>
            </a>
        </li>
        <li class="navigation-item">
            <a href="#section3" data-number="3">
                <span class="dot"><?php the_field('s3_article',5); ?></span>
            </a>
        </li>
        <li class="navigation-item">
            <a href="#section4" data-number="4">
                <span class="dot"><?php the_field('s4_article',5); ?></span>
            </a>
        </li>
        <li class="navigation-item">
            <a href="#section5" data-number="5">
                <span class="dot"><?php the_field('s5_article',5); ?></span>
            </a>
        </li>
        <li class="navigation-item">
            <a href="#section6" data-number="6">
                <span class="dot"><?php the_field('s6_article',5); ?></span>
            </a>
        </li>
        <li class="navigation-item">
            <a href="#section7" data-number="7">
                <span class="dot">контакты</span>
            </a>
        </li>
    </ul>
</div>