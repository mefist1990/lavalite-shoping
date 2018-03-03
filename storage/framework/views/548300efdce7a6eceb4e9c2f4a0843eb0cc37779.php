<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo e(Theme::getTitle()); ?></title>
        <meta name="description" content="The Lavalite Content Management System">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo url('favicon.ico'); ?>"/>       
        <link rel="apple-touch-icon" href="<?php echo e(asset('apple-touch-icon.png')); ?>">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">
        <link href="<?php echo e(theme_asset('css/vendor.css')); ?>" rel="stylesheet">

        <?php echo Theme::asset()->styles(); ?>

        <?php echo Theme::asset()->scripts(); ?>

    </head>

    <body class="home">
        <?php echo Theme::content(); ?>

        <?php echo Theme::partial('header'); ?>

        <?php echo Theme::partial('footer'); ?>

        <script src="<?php echo e(theme_asset('js/vendor.js')); ?>"></script>
        <script src="<?php echo e(theme_asset('js/main.js')); ?>"></script>
        <?php echo Theme::asset()->container('footer')->scripts(); ?>

    </body>
</html>
