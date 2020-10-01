<a href="page-news-<?php echo $row['IDNOUVELLE']; ?>">
    <div class="col-lg-3 col-md-6" id="news-<?=$row['IDNOUVELLE']?>">

        <div class=" single-blog-item blog-item" id="simplenews">

            <div class="blog-img">
                <?php
                $img = !empty($row['IMAGE']) ? $row['IMAGE'] : 'upload_news_default.jpg';
                ?>

                <img src="<?php echo $directory_image_news.$img?>" alt="">
            </div>
            <div class="blog-text">
                <span class="blog-time"><?php echo $row['DPUBLICATION']; ?></span>
                <h4><?php echo $row['TITRE_NOUVELLE']; ?></h4>

                <?php if($user_level == 2){?>
                    <div class="col-lg-12">
                        <?php if ($user_level == 2) { ?>  <a href="javascript::void(0);"alt="Supprimer" data-id="<?php echo $row['IDNOUVELLE']; ?>"
                           title="Supprimer"  class="btn primary-btn deleteadh ">Supprimer</a>      <?php } ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</a>