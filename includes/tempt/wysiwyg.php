<section class="wysiwyg" xmlns="http://www.w3.org/1999/html">
    <div class="booking-classes">
        <div class="container  single-blog-item">
            <div class="row">
                <div class="col-sm-12">

                    <h3 class="text-center">Ajouter une nouvelle</h3>
                </div>
                <form id="add-news-form" method="POST" class="col-12" enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="col-sm-12 form-check">
                            <h5 >Public</h5><br>
                            <input class="form-check-input" type="radio" name="status" id="public"  <?php if (isset($_POST["status"])) { if ($_POST["status"] == "public") { echo "checked"; } } ?>value=0 >
                            <label class="form-check-label" for="exampleRadios1">
                                public
                            </label>

                            <input class="form-check-input" type="radio" name="status" id="prive" checked <?php if (isset($_POST["status"])) { if ($_POST["status"] == "prive") { echo "checked"; } } ?>value=1 >
                            <label class="form-check-label" for="exampleRadios2">
                                prive
                            </label>
                        </div>
                        <div class="col-12">
                            <h5 >Titre de la nouvelle</h5>
                            <input type="text" name="titre" placeholder="Titre de la nouvelle" value="" class="form-control"required>
                        </div>
                        <div class="col-12">
                            <h5 >Decription</h5>
                            <input type="text" name="introduction" placeholder="Description" value="" class="form-control" required>
                        </div>

                    </div>
                    <div class="col-12">
                        <h5 >Votre texte</h5><br>
                        <textarea id="summernote" name="editordata" required> </textarea>
                    </div>

                    <h5> Ajouter une image</h5><br>

                    <input type="file" name="NOMFICHIER">
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