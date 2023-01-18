<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/moment.js"></script>

        <link rel="stylesheet" href="css/style.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/mystyle.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Home | Tathaastu Life</title>

        <!-- Useful meta tags -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">

        <!-- Favicon -->
        

        <!-- Style -->
        <style>
            #page-title {
                background-image: url('img/home.jpg');
            }

            #contacts .width-img {
                background-image: url('assets/img/demo/18_img.png');
            }
        </style>
    </head>
    <body class="home header-absolute-true header-fixed-true">
        <div class="loading">
            <div class="wrapper h-100">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="loading-content">
                        <div class="logo logo-primary">
                            <img class="animated zoomin" src="assets/img/logo/LogoSurround.png" alt="Logo">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .loading -->        
        
        <header id="header" class="site-header">
            <div class="wrapper">
                <div class="header-content d-flex justify-content-between">
                    <div class="header-left align-self-center">
                        <div class="header-logo">
                            <a class="logo logo-primary adv-dark transform-scale-h" title="Logo" href="index.html">
                                <img src="assets/img/logo/LogoSurround.png" alt="Logo">
                            </a>

                            <a class="logo logo-secondary adv-light transform-scale-h" title="Logo" href="index.html">
                                <img src="assets/img/logo/LogoSurround.png" alt="Logo">
                            </a>
                        </div>
                    </div>

                    <div class="header-right d-flex justify-content-end">
                        <div class="d-flex align-items-center">
                            <div class="menu">
                                <nav class="menu-primary">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a title="Services" href="#services">Services</a>
                                        </li>

                                        <li class="nav-item">
                                            <a title="About Us" href="#about-us">About Us</a>
                                        </li>

                                        <li class="nav-item">
                                            <a title="Teams" href="#team-members">Team</a>
                                        </li>

                                        <li class="nav-item">
                                            <a title="Testimonials" href="#testimonials">Testimonials</a>
                                        </li>

                                        <li class="nav-item">
                                            <a title="News" href="#news">News</a>
                                        </li>

                                        <li class="nav-item">
                                            <a title="Contacts" href="#contacts">Contacts</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                            <div class="menu-toggle adv-light mr-0">
                                <button type="button" class="btn btn-lg btn-outline-tertiary btn-round p-0 min-w-auto" data-toggle="modal" data-target="#menu-modal"><i class="fas fa-bars"></i></button>
                            </div>

                            <div class="menu-toggle adv-dark">
                                <button type="button" class="btn btn-lg btn-secondary btn-hover-main-secondary btn-round p-0 min-w-auto" data-toggle="modal" data-target="#menu-modal"><i class="fas fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- .site-header -->