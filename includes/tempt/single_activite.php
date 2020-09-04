<div class="row gallery-filter">
    <div class="col-lg-4 col-sm-6 filter  crossfit">
        <div class="gallery-item">
            <span class="blog-time"><?php echo $row['DFIN']; ?></span>
            <h4><?php echo $row['INTITULEACTIVITE']; ?></h4>
            <div class="blog-img">
                <?php
                $img = !empty($row['IMAGE']) ? $row['IMAGE'] : 'upload_news_default.jpg';
                ?>

                <img src="<?php echo $directory_image_news.$img?>" alt="">
            </div>
            <div class="gi-hover-warp">
                <div class="gi-hover">
                    <?php
                    $img = !empty($row['IMAGE']) ? $row['IMAGE'] : 'upload_news_default.jpg';
                    ?>
                    <a href="<?php echo $directory_image_news.$img?>" class="image-popup"><i class="fa fa-search-plus"></i></a>
                    <a href="#"><i class="fa fa-chain"></i></a>
                    <h6>Time to Try a Bodyweight Workout <span>Run, Walk, Swimming</span></h6>
                </div>
            </div>
        </div>
    </div>
</div>

