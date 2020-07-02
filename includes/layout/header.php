<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $description?>">
    <meta name="keywords" content="<?php echo $keywords?>">
    <title><?php echo $title?>$title</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="./css/slicknav.min.css" type="text/css">
    <!-- Css Wysiwyg -->
    <link href='https://fonts.googleapis.com/css?family=Euphoria+Script' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link rel="stylesheet" href="./css/main.css" type="text/css">

</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="inner-header">
            <div class="row">
                <div class="col-sm-2 col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.php"><img src="./img/logo3.png" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-10 col-lg-10 col-md-10">

                    <nav class="main-menu mobile-menu">
                        <ul>
                            <?php
                    foreach ($ar_pages_var as $key=>$value )
                        if($ar_pages_var[$key]['PUBLIC'] ==1)
                        echo ('<li><a href="./index.php?PAGE='.$ar_pages_var[$key]['KEY_FILE'].'">'.$ar_pages_var[$key]['KEY_FILE'] .' </a></li>');

                ?>
                            <!--<li><a href="./index.php" class="<?php echo $page == 'index' ? 'active' : ''; ?>">Accueil</a></li>
                            <li><a href="./index.php?page=presentation" class="<?php echo $page == 'presentation' ? 'active' : ''; ?>">Présentation</a></li>
                            <li><a href="./index.php?page=activites" class="<?php echo $page == 'activites' ? 'active' : ''; ?>">Activite</a></li>

                            <li><a href="./index.php?page=blog" class="<?php echo $page == 'blog' ? 'active' : ''; ?>">Blog</a></li>
                            <li><a href="./index.php?page=contact" class="<?php echo $page == 'contact' ? 'active' : ''; ?>">Contact</a></li>
                            <li><a href="./index.php?page=elements" class="<?php echo $page == 'gallerie' ? 'active' : ''; ?>">Gallerie</a></li>-->


                            <li class="inscr-btn"> <a href="./index.php?PAGE=INSCRIPTION" >Inscrivez-vous</a></li>
                            <li class="search-btn search-trigger"><i class="fa fa-search"></i></li>
                        </ul>
                    </nav>
                    <div id="mobile-menu-wrap"></div>
                </div>
            </div>
        </div>
    </div>
</header>
