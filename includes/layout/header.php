<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $description?>">
    <meta name="keywords" content="<?php echo $keywords?>">
    <title><?php echo $title?></title>

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
    <link rel="stylesheet" href="./vendor/summernote-0.8.18-dist/summernote-bs4.css" type="text/css">
    <!-- Css Wysiwyg -->
    <link href='https://fonts.googleapis.com/css?family=Euphoria+Script' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link rel="stylesheet" href="./css/main.css?v=1.<?php echo time(); ?>" type="text/css">

</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- modal:fenetre de message d'information-->
<?php include ('./includes/tempt/modal.php'); ?>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="inner-header">
            <div class="row">
                <div class="col-sm-2 col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./index.php?page=accueil"><img src="./img/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-10 col-lg-10 col-md-10">
                    <div class="row">
                        <div class="col">
                            <nav class="main-menu mobile-menu">
                                <ul>
                                    <?php
                                    foreach ($ar_pages_var as $key=>$value ){
                                        if($ar_pages_var[$key]['PUBLIC'] ==1 ){
                                            echo '<li  ><a href="./index.php?page='.$ar_pages_var[$key]['KEY_TITLE'].'">'.$ar_pages_var[$key]['KEY_TITLE'] .' </a></li>';
                                        }
                                    }
                                    ?>
                                    <!--<li><a href="./index.php" class="<?php echo $page == 'index' ? 'active' : ''; ?>">Accueil</a></li>
                            <li><a href="./index.php?page=presentation" class="<?php echo $page == 'presentation' ? 'active' : ''; ?>">Présentation</a></li>
                            <li><a href="./index.php?page=activites" class="<?php echo $page == 'activites' ? 'active' : ''; ?>">Activite</a></li>

                            <li><a href="./index.php?page=blog" class="<?php echo $page == 'blog' ? 'active' : ''; ?>">Blog</a></li>
                            <li><a href="./index.php?page=contact" class="<?php echo $page == 'contact' ? 'active' : ''; ?>">Contact</a></li>
                            <li><a href="./index.php?page=elements" class="<?php echo $page == 'gallerie' ? 'active' : ''; ?>">Gallerie</a></li>-->
                                    <?php if($user_level == 0){ ?>
                                        <li class="<?php echo $page == 'connexion' ? 'active' : ''; ?>"><a href="./index.php?page=connexion">Connexion</a></li>
                                    <?php } ?>


                                    <li>

                                        <?php if($user_level > 0){ ?>
                                            <div class="dropdown">
                                                <button class="primary-btn signup-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <?php echo $_SESSION['PRENOM'].' '.$_SESSION['NOM'] ?>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="./index.php?page=profil&id=<?php echo $_SESSION['IDADHERENT'] ?>" class="primary-btn signup-btn">Mon profil</a>
                                                    <a class="dropdown-item" href="./index.php?page=membres">Liste des membres</a>
                                                    <?php if($user_level == 2){ ?>
                                                        <a class="dropdown-item" href="./index.php?page=informations&action=add">Ajouter news</a>
                                                    <?php } ?>
                                                    <a class="dropdown-item" href="./index.php?deconnexion=1">Deconnexion <span class="fa fa-sign-out"></span></a>
                                                </div>
                                            </div>
                                        <?php }else{ ?>
                                            <a href="./index.php?page=inscription" class="primary-btn signup-btn">Inscription</a>
                                        <?php } ?></li>
                                </ul>
                            </nav>
                            <div id="mobile-menu-wrap"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
</header>
