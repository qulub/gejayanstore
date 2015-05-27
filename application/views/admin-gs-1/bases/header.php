<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?php
        if(empty($title))
        {
            echo $title.' - Gejayan Store';
        }else{
            echo 'Gejayan Store';
        }
        ?>
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('adminresource');?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('adminresource');?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url('adminresource');?>/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('adminresource');?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('adminresource');?>/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('adminresource');?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url('adminresource');?>/style.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url('outsource/js/angular.min.js');?>"></script>
   <script type="text/javascript" src="<?php echo base_url('outsource/js/angular-route.min.js');?>"></script>
    <script src="<?php echo base_url('adminresource');?>/bower_components/jquery/dist/jquery.min.js"></script>


</head>

<body ng-app="adminGejayan">
<script type="text/javascript">
    var app = angular.module('adminGejayan',['ngRoute']);//angular module decaration
</script>
