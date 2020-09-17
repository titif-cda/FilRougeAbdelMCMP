<main>
    <?php include('./includes/tempt/entete.php'); ?>
    <section class="about-us-section spad">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-text ">
                        <div class="section-title">
                            <h2><?php echo $titleNouvelle ?></h2>
                        </div>
                        <span class="blog-time"> Date de publication:  <?php echo $datepublication; ?></span><br>
                        <?php echo $introduction; ?>

                    </div>
                </div>
                <div class="col-lg-12  text-center">
                    <div class="about-img">
                        <?php
                        $img = !empty($img) ? $img : 'upload_news_detail_default.jpg';
                        ?>
                        <img src=" <?php echo $directory_image_news . $img ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-12">

                    <p><?php echo $descriptionNouvelle; ?></p>
                </div>
            </div>
        </div>
        </hr>
        <?php if ($user_level == 2) { ?>

        <div class="modif">
            <div class="container ">
                <div class="row">

                    <div class="col-lg-12">
                        <button class="btn btn_modif btn-primary">Modifiez votre news?</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="wisi" class="booking-classes " style="display: none">
            <div class="container ">
                <div class="row">

                    <div class="col-lg-12">
                        <form action="index.php?page=news&id=<?php echo $id; ?>&titre=<?php echo str_replace(" ", "", $titleNouvelle)?>" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" name="formulaire" value="update_news">
                            <input type="hidden" name="IdNouvelle" value="<?php echo $id; ?>">
                            <div class="row single-blog-item">
                                <div class="col-12">
                                    <h5>Modifiez le titre de la nouvelle</h5><br>
                                    <input type="text" name="titre" placeholder="Titre de la nouvelle"
                                           value="<?php echo isset($titleNouvelle) ? $titleNouvelle : 'titre de la nouvelle' ?>"required>
                                </div>
                                <div class="col-12">
                                    <h5>Saisir votre texte </h5>
                                    <textarea id="summernote" name="editordata"
                                              value="<?php echo isset($descriptionNouvelle) ? $descriptionNouvelle : 'description de la nouvelle' ?>"></textarea>
                                </div>
                                <div class="col-12 ">
                                    <h5> Changer l'image</h5><br>
                                    <input type="file" name="image" value="$img">

                                </div>
                                <div class="col-12 text-center">
                                    <input type="submit" class="primary-btn" value="Modifier News " id="">

                                </div>
                            </div>
                        </form>
                    </div> <?php

                    } ?>
                </div>
                <div class="tag-share">
                    <div class="tags">
                        <a href="#">Camera</a>
                        <a href="#">Photography</a>
                        <a href="#">Tips</a>
                    </div>
                    <div class="social-share">
                        <span>Share:</span>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>