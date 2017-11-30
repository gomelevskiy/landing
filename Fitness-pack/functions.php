<?php
define("THEME_DIR", get_template_directory_uri());
/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');

register_nav_menus(array(
    'main'    => 'Главное меню в шапке'
));


