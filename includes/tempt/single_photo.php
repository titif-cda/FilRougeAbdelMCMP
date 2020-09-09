<div class="col-lg-4 col-sm-6 filter <?php echo $row['IDTYPE']; ?>">
    <div class="gallery-item">
        <div class="blog-img">


            <img src="<?php echo $directory_image_gallerie.$row['NOMFICHIER']?>" alt="">
        </div>

        <div class="gi-hover-warp">
            <div class="gi-hover">
                <a href="<?php echo $directory_image_gallerie.$row['NOMFICHIER']?>" class="image-popup"><i class="fa fa-search-plus"></i></a>
                <a href="#"><i class="fa fa-chain"></i></a>
         <H6><?php echo $row['TITREPHOTO']; ?><!--<span> --><?php //echo $row['DPHOTO']; ?><!--</span>--></h6>
            </div>

        </div>
    </div>
</div>