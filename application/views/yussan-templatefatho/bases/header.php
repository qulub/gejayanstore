<!doctype html>
<!--[if lt IE 7]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <title>
        <?php 
        if(!empty($title))
        {
            echo $title.' - Sistem Pakar Hewan Fatho';
        }else
        {
           echo 'Sistem Pakar Hewan Fatho';
        }
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="shortcut icon" href="favicon.png">
    
    <!-- Bootstrap 3.3.2 -->
    <link rel="stylesheet" href="<?php echo base_url('resource')?>/assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url('resource')?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url('resource')?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('resource')?>/assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url('resource')?>/assets/js/rs-plugin/css/settings.css">

    <link rel="stylesheet" href="<?php echo base_url('resource')?>/assets/css/styles.css">


    <script type="text/javascript" src="<?php echo base_url('resource')?>/assets/js/modernizr.custom.32033.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>