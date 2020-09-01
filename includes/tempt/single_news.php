<a href="page-news-<?php echo $row['IDNOUVELLE']; ?>">
<div class="col-lg-3 col-md-6">

    <div class="single-blog-item blog-item">

        <div class="blog-img">
            <?php
            $img = !empty($row['IMAGE']) ? $row['IMAGE'] : 'upload_news_default.jpg';
            ?>

            <img src="<?php echo $directory_image_news.$img?>" alt="">
        </div>
        <div class="blog-text">
            <span class="blog-time"><?php echo $row['DPUBLICATION']; ?></span>
            <h4><?php echo $row['TITRE_NOUVELLE']; ?></h4>

            <!--<p>In viverra urna in orci imperdiet, aliquam suscipit risus consequat. Sed auctor, urna ac
                convallis laoreet, diam nibh dignissim ante, ac finibus.</p> -->
            <div class="blog-widget">
                <ul>
                    <li><img src="img/like.png" alt=""> <span>15 Likes</span></li>
                    <li><img src="img/chat.png" alt=""> <span>3 Comments</span></li>
                </ul>
            </div>
        </div>
        </a>
    </div>
</div>
