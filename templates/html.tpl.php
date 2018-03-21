<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <?php if (drupal_is_front_page()): ?>
        <title>The Future of Libraries | Massachusetts Institute of Technology</title>
        <?php else : ?>
        <title><?php print htmlspecialchars_decode($head_title, ENT_QUOTES); ?></title>
        <?php endif; ?>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <?php print $styles; ?>
        <?php print $scripts; ?>
    </head>
    <body class="backgroundimage<?php print theme_get_setting('background_image'); ?> <?php print $classes; ?>" <?php print $attributes;?>>

        <?php print $page_top; ?>
        <?php print $page; ?>
        <?php print $page_bottom; ?>

    </body>
</html>
