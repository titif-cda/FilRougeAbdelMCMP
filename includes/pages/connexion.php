<main>
    <?php include('./includes/tempt/hero-section.php');?>
    <div class="container">
        <div class="row">
            <div id="connexion"  class="col-lg-12">
                <div class="booking-form">
                    <h4>Veuillez vous identifier</h4>
                    <form action="./index.php?page=connexion" method="post">
                        <input type="hidden" name="formulaire" value="connexion" />
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="LOGIN" placeholder="Votre identifiant">
                            </div>
                            <div class="col-lg-6">
                                <input type="password" name="PASSWORD" placeholder="Votre mot de passe">
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" value="Submit" class="submit-btn">Connexion </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>