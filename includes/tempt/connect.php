<div class="container">
    <div class="row">
        <div id="connexion"  class="col-lg-12">
            <div class="booking-form">
                <h4>Veuillez vous identifier</h4>
                <form action="./index.php?page=connexion" method="post">
                    <input type="hidden" name="formulaire" value="connexion" />
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="LOGIN" placeholder="admin" autocomplete="username">
                        </div>
                        <div class="col-lg-6">
                            <input type="password" name="PASSWORD" placeholder="admin" autocomplete="current-password">
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