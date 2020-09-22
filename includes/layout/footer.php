<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <img src="./img/logo3.png" alt="">
            </div>
            <div class="col-9">
                <div class="footer-text">
                    <div class="reserved"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Crée avec <i class="fa fa-heart-o" aria-hidden="true"></i> par <a >Abdellatif EL JID </a>
                        </p>
                        <ul>
                            <?php

                            foreach ($ar_pages_var as $key=>$value ){
                                if($ar_pages_var[$key]['PUBLIC'] == 1 ){
                                    echo '<li><a href="page-'.$ar_pages_var[$key]['KEY_TITLE'].'">'.$ar_pages_var[$key]['KEY_TITLE'] .' </a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="search-model">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <div class="search-close-switch">+</div>
                            <form class="search-model-form">
                                <input type="text" id="search-input" placeholder="Search here.....">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</footer>
<!-- Footer Section End -->
<!-- Search model -->

<!-- Search model end -->

<!-- Js Plugins -->
<script src="./js/jquery-3.3.1.min.js"></script>
<!-- Mes plugins Plugins -->
<script src="./js/popper.1.14-3.min.js"></script>
<!-- -->
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.magnific-popup.min.js"></script><!-- cercles page éléments -->
<script src="./js/jquery.slicknav.js"></script> <!-- cercles page éléments -->
<script src="./js/owl.carousel.min.js"></script><!-- caroussel accueil -->
<script src="./js/circle-progress.min.js"></script> <!-- cercles page éléments -->
<!-- Js openstreetmap -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<!-- Js Wysiwyg -->
<script src="./vendor/summernote-0.8.18-dist/summernote-bs4.js"></script>
<script src="./js/highlight.min.js"></script>
<script src="./js/wysiwyg.min.js"></script>
<script src="./js/slick.min.js"></script>
<!-- Js Aggrandissement photo -->


<script src="./js/main.js?v=1.<?php echo time()?>"></script>
</body>

</html>
