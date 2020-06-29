<main><!-- Contact Section Begin -->
    <div class="booking-classes">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Formulaire d'inscription</h2>
                    <div class="booking-form">

                        <form action="./index.php?page=inscription" method="post" class="register-form">
                            <input type="hidden" name="formulaire" value="register""/>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm">
                                        <input type="text" name="Login" placeholder="Identifiant">
                                    </div>
                                    <div class="col-sm">
                                        <input type="password" id= "password" name="Password" placeholder="Votre Mot de passe" value="abdel mdp">
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="text" id= "name" name="Prenom"  placeholder="Votre prénom"value="abdel prenom">
                                    </div>
                                    <div class="col-sm">
                                        <input type="text" id= "name" name="Nom" placeholder ="Votre Nom" value="abdel nom">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="date" id= "birth" name="DNaiss" placeholder="Votre date de naissance" value="14/04/1982">
                                    </div>
                                    <div class="col-sm">
                                        <input type="text" id= "adress" name="Adresse1" placeholder="Votre adresse" value=" rue des tulipes">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="text" id= "adress" name="Adresse2" placeholder="Votre adresse 2">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="text" id= "zip" name="CdPost" placeholder="Votre code postal" value=" 12000">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="text" id= "city" name="Ville" placeholder="Votre ville" value="rodez">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="email" id= "email" name="Email" placeholder="Votre email" value="cda03@gmail.com">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <input type="text" id= "mobile" name="Tel"  placeholder="Votre Téléphone" value="0681816256">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <label for="name" >Certificat Médical (-6mois)</label>
                                        <input type="file" id= "certificat" name="Certificat"  placeholder="Téléchargez votre certificat médical">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm">
                                        <label for="name"> Vous acceptez que votre image soit utilisée sur le site internet.</label>
                                        <input type="checkbox" id= "droit" name="droit_image" placeholder="Vous acceptez que votre image soit utilisée sur le site internet">
                                    </div>
                                </div>

                                    <div class="col-sm-6">
                                        <label for="name" >Votre cylindrée</label>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="name" >125 cm3</label>
                                                <input type="radio"  name="Cylindree"value="125 cm3" />
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="name" >250 cm3</label>
                                                <input type="radio"  name="Cylindree" value="250 cm3"/>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="name" >> 250 cm3</label>
                                                <input type="radio"  name="Cylindree"value="> 250 cm3" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm">
                                            <input type="submit" value="S'enregistrer" class="submit-btn">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</main>


