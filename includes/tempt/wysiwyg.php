
<section class="wysiwyg">
    <div class="booking-classes">
        <div class="container  single-blog-item">
            <div class="row">
                <div class="col-sm-12">

                <h3 class="text-center">Ajouter une nouvelle</h3>
                                 </div>
                <form id="add-news-form" method="POST" class="col-12">
                    <div class="col-sm-12 form-check">
                        <input class="form-check-input" type="radio" name="status" id="public"  <?php if (isset($_POST["status"])) { if ($_POST["status"] == "public") { echo "checked"; } } ?>value=0 >
                        <label class="form-check-label" for="exampleRadios1">
                            public
                        </label>

                        <input class="form-check-input" type="radio" name="status" id="prive" checked <?php if (isset($_POST["status"])) { if ($_POST["status"] == "prive") { echo "checked"; } } ?>value=1 >
                        <label class="form-check-label" for="exampleRadios2">
                            prive
                        </label>
                    <div class="col-sm-12">
                        <h5 >Titre de la nouvelle</h5><br>
                        <input type="text" name="titre" placeholder="Titre de la nouvelle" value="" required>
                    </div>
                    <div class="col-12">
                        <h5 >Votre texte</h5><br>
                        <textarea id="summernote" name="editordata" required> </textarea>
                    </div>
                    <h5> Changer l'image</h5><br>

                    <input type="file" name="image">
                    <div class="col-12 text-right">
                        <button type="submit" id="addNews" class="primary-btn">Ajouter News</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!---
    <div class="container">
        <div class="row single-blog-item">
            <div class="col-12">
                <div id="summernote"><p>Ajouter informations...</p></div>
            </div>
        </div>
        <div class="row single-blog-item">
            <div class="col-12 text-right">
                <a id="addNews" href="#" class="primary-btn">Ajouter News</a>
            </div>
        </div>
    </div>
    -->
</section>