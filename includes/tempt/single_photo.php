<div class="col-lg-4 col-sm-6 filter <?php echo $row['IDTYPE']; ?>">
    <div class="gallery-item">
        <div class="blog-img">
            <img src="<?php echo $directory_image_gallerie.$row['NOMFICHIER']?>" alt="">
        </div>
        <div class="gi-hover-warp">
            <div class="gi-hover">
                <a href="<?php echo $directory_image_gallerie.$row['NOMFICHIER']?>" class="image-popup"><i class="fa fa-search-plus"></i></a>
         <h4><?php echo $row['TITREPHOTO']; ?></h4>
                <p><span>Publiée le <?php echo date("d-m-Y", strtotime($row['DPHOTO'])); ?></span></p>
            </div>
        </div>
    </div>
</div>