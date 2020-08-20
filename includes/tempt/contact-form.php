<form method="post" name="myemailform" action="#" class="contact-form">
    <input type="hidden" name="action" value="sendmail"
    <div class="row">
        <div class="col-lg-6">
            <input type="text" name="nom"placeholder="Votre nom">
        </div>
        <div class="col-lg-6">
            <input type="email" name="email" placeholder="Votre  E-mail">
        </div>
        <div class="col-lg-12">
            <input type="text" name="subject" placeholder="Sujet">
            <textarea name="message" placeholder="Votre Message"></textarea>
            <input type="submit" class="submit-btn contact-btn" value="Envoyez">
        </div>
    </div>
</form>