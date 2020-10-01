<a href="page-activiteseule-<?php echo $row['IDACTIVITE']; ?>-<?php echo str_replace(" ", "", $row['INTITULEACTIVITE'])?>">

    <div  class="col-lg-3 col-md-6 filter <?php echo $row['IDTYPE']; ?>">

        <div id="activite" class="single-blog-item blog-item">

            <div class="blog-img">
                <?php
                $img = !empty($row['IMAGEACT']) ? $row['IMAGEACT'] : 'upload_activité_default.jpg';
                ?>

                <img src="<?php echo $directory_image_activites.$img?>" alt="">
            </div>
            <div class="blog-text">

                <span class="blog-time"><?php echo $row['DDEBUT']; ?></span>
                <h4><?php echo $row['INTITULEACTIVITE']; ?></h4>
            </div>
        </div>
    </div>
</a>
