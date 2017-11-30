<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true);
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />


    <link rel="stylesheet" media="screen" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" media="screen" href="<?php bloginfo('template_directory'); ?>/css/style.css"/>

    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/scripts.js"></script>


    <style type="text/css">.fancybox-margin{margin-right:17px;}</style>

    <style>
        .screen-reader-response{
            display: none;
        }
        .wpcf7-form-control-wrap span{
            display: block;
            text-align: center;
        }
        .wpcf7-validation-errors{
            width: 307px;
        }
    </style>
    
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

</head>

<body  cz-shortcut-listen="true">