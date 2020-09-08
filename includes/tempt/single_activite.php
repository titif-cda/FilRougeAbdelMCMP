<a href="page-activiteseule-<?php echo $row['IDACTIVITE']; ?>">
    <div class="col-lg-3 col-md-6 filter <?php echo $row['IDTYPE']; ?>">

        <div class="single-blog-item blog-item">

            <div class="blog-img">
                <?php
                $imageAct = !empty($row['IMAGEACT']) ? $row['IMAGEACT'] : 'upload_activité_default.jpg';
                ?>

                <img src="<?php echo $directory_image_activites.$imageAct?>" alt="">
            </div>
            <div class="blog-text">
                <span class="blog-time"><?php echo $row['DDEBUT']; ?></span>
                <h4><?php echo $row['INTITULEACTIVITE']; ?></h4>

                <!--<p>In viverra urna in orci imperdiet, aliquam suscipit risus consequat. Sed auctor, urna ac
                    convallis laoreet, diam nibh dignissim ante, ac finibus.</p> -->
            </div>
        </div>
    </div>
</a>
