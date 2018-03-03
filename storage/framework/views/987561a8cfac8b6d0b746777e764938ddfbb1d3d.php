<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo e(Theme::getTitle()); ?></title>
        <meta name="description" content="The Lavalite Content Management System">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="<?php echo e(asset('apple-touch-icon.png')); ?>">
        <link href="<?php echo e(theme_asset('css/vendor.css')); ?>" rel="stylesheet">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <?php echo Theme::asset()->styles(); ?>

        <?php echo Theme::asset()->scripts(); ?>

    </head>


    <body class="body-bg-full auth login" style="background-image: url(<?php echo e(theme_asset('img/lock.jpg')); ?>);">
    
        <?php echo Theme::partial('auth.header'); ?>

        <?php echo Theme::content(); ?>

        <?php echo Theme::partial('auth.footer'); ?>


        <script src="<?php echo e(theme_asset('js/vendor.js')); ?>"></script>
        <script src="<?php echo e(theme_asset('js/main.js')); ?>"></script>
        <?php echo Theme::asset()->container('footer')->scripts(); ?>

    </body>
</html>
