<main>

    <?php include('./includes/tempt/hero-section.php');
    ?>

    <section class="about-us-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-text">
                        <div class="section-title">
                            <h2><?php echo  $titleNouvelle ?></h2>
                        </div>
                        <span class="blog-time"> <?php echo $datepublication; ?></span><br>
                        <?php echo $introduction; ?>


                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="about-img">
                        <img src=" <?php echo $image?>" alt="">
                    </div>
                </div>
                <div class="col-lg-12">

                    <p><?php echo $descriptionNouvelle; ?></p>
                </div>
            </div>
        </div>
        </div>
        <?php if ($user_level == 2){ ?>
            <form action="./index.php?page=information&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="formulaire" value="update_news">
                <input type="hidden" name="IdNouvelle" value="<?php echo $id; ?>">
                <label> Changer l'image</label>
                <input type="file" name="image">

                <div class="row single-blog-item">
                    <div class="col-12 text-center">
                        <input type="submit" class="primary-btn" value="Modifier News " id="">
                        <a href="#" </a>
                    </div>
            </form>
            </div> <?php    } ?>
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
    </section>


</main>