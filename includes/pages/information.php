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
                    <img src="img/about-img.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-12">

                    <p><?php echo $descriptionNouvelle; ?></p>
                        </div>
                    </div>
             </div>
        </div>
    </div>
</section>

</main>