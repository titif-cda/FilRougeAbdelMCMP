/*  ---------------------------------------------------
Theme Name: Cross Fit
Description: Cross Fit HTML Template
Author: colorlib
Author URI: https://www.colorlib.com/
Version: 1.0
Created: colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {
    CreateDialog();

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /*------------------
		Navigation
	--------------------*/
	$(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
		Search model
	--------------------*/
	$('.search-trigger').on('click', function() {
		$('.search-model').fadeIn(400);
	});

	$('.search-close-switch').on('click', function() {
		$('.search-model').fadeOut(400,function(){
			$('#search-input').val('');
		});
	});

    /*------------------
        Carousel Slider
    --------------------*/
    var hero_s = $(".hero-items");
    hero_s.owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        smartSpeed: 200,
        autoHeight: false,
        autoplay: true
        ,
    });

    /*------------------
        Magnific Popup
    --------------------*/
    $('.pop-up').magnificPopup({
        type: 'iframe'
    });

    /*------------------
        About Counter Up
    --------------------*/
    $('.counter').each(function () {
        $(this).prop('Counter',0).animate({
        Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
            $(this).text(Math.ceil(now));
            }
        });
    });

    /*------------------
        Elements Counter UP
    --------------------*/
    $('.mile-counter').each(function () {
        $(this).prop('Counter',0).animate({
        Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
            $(this).text(Math.ceil(now));
            }
        });
    });

    /*------------------
        Accordin Active
    --------------------*/
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function () {
        $(this).prev().removeClass('active');
    });

    /*------------------
        Progress Loader
    --------------------*/
/*	$('.circle-progress').each(function() {
		var cpvalue = $(this).data("cpvalue");
		var cpcolor = $(this).data("cpcolor");
		var cpid 	= $(this).data("cpid");

		$(this).append('<div class="'+ cpid +'"></div><div class="progress-value"><span class="loader-percentage">'+ cpvalue +'<sup class="percentage-sign">%</sup></span></div>');

		if (cpvalue < 100) {

			$('.' + cpid).circleProgress({
				value: '0.' + cpvalue,
				size: 190,
                thickness: 5,
                startAngle: -190,
				fill: cpcolor,
				emptyFill: "rgba(0, 0, 0, 0)"
			});
		} else {
			$('.' + cpid).circleProgress({
				value: 1,
				size: 187,
				thickness: 5,
				fill: cpcolor,
				emptyFill: "rgba(0, 0, 0, 0)"
			});
		}
	});*/


    /*------------------
            Mon JS
   --------------------*/
  /*  $('.carousel-inner').carousel({
        interval: 5000
    })*/



    /*------------------
         Modal
--------------------*/
    $('#my-modal .modal-footer .btn, #my-modal .close').on('click', function(){


        $("#my-modal").hide();


    });


    if($('#my-modal .modal-body p').html().length){

        $("#my-modal").show();

    }


    /*------------------
        WYSIWYG
 --------------------*/
    if($('#summernote').length){

        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
        });

    }
    // $('.ajoutInscr').on('click', function() {
    //     console.log('btn ajoutInscr ready !');
    //
    //     var idadherent = $('#ajoutInscription input[name=idadherent]').val();
    //     var idact = $('#ajoutInscription input[name=IDACTIVITE]').val();
    //     var nbinvit = $('#ajoutInscription input[name=nbpers]').val();
    //
    //     ShowDialog("Confirmation d'ajout", "Êtes-vous sûr de vouloir ajouter cette iscription?",
    //         ()=> {
    //
    //
    //         },
    //         ()=> {
    //
    //             let request = $.ajax({
    //                 url: "./lib/methode_ajax.php",
    //                 method: "POST",
    //                 data: {action: "inscriptionAct-form", idMembre: idadherent, idActivite: idact, nbInvite: nbinvit},
    //                 dataType: "json" //JSON = reponse attendu en array() ou HTML, reponse de type string
    //             });
    //
    //             request.done(function( msg ) {
    //                 //console.log(msg);
    //                 //afichage de la modal ave
    //                 $('#my-modal .modal-body p').html(msg.modal);
    //                 $("#member-"+name).remove();
    //                 $("#my-modal").show();
    //                 //$( "#log" ).html( msg );
    //             });
    //
    //             //erreur 404 ou 500 - le serveur ne repond pas, erreur PHP ?
    //             request.fail(function( jqXHR, textStatus ) {
    //                 console.log( "Request failed: " + textStatus );
    //             });
    //
    //         });
    //
    //     //stopper le comportement normal d'une balise de type <a>
    //     return false;
    //
    // });

    //suppression inscription
    /*$('.deleteinscr').on('click', function() {
        console.log('btn table ready !');
        var inscriptionAd = $(this).data('id');

        ShowDialog("Confirmation de suppression", "Êtes-vous sûr de vouloir supprimer?",
            ()=> {
            },
            ()=> {
                let request = $.ajax({
                    url: "./lib/methode_ajax.php",
                    method: "POST",
                    data: {action: "deleteInscription", idInscription: inscriptionAd},
                    dataType: "json" //JSON = reponse attendu en array() ou HTML, reponse de type string
                });
                request.done(function( msg ) {

                    console.log("hello world !!! ");
                    //console.log(msg);
                    //afichage de la modal ave
                    $('#my-modal .modal-body p').html(msg.data.modalMessage);
                    if(!msg.error) document.getElementById("inscription-"+name).remove();
                    $("#my-modal").show();
                    //$( "#log" ).html( msg );
                });
                request.fail(function( jqXHR, textStatus ) {
                    console.log( "Request failed: " + textStatus );

                });
            });

        return false;

    });*/

//suppression membre
    $('.deleteadh').on('click', function() {
    console.log('btn ficheMembre ready !');
    var name = $(this).data('id');

    ShowDialog("Confirmation de suppression", "Êtes-vous sûr de vouloir supprimer?",
        ()=> {
        },
        ()=> {
        let request = $.ajax({
            url: "./lib/methode_ajax.php",
            method: "POST",
            data: {action: "deleteMember", idMembre: name},
            dataType: "json" //JSON = reponse attendu en array() ou HTML, reponse de type string
        });
        request.done(function( msg ) {

            console.log("hello world !!! ");
            //console.log(msg);
            //afichage de la modal ave
            $('#my-modal .modal-body p').html(msg.data.modalMessage);
            if(!msg.error) document.getElementById("member-"+name).remove();
            $("#my-modal").show();
            //$( "#log" ).html( msg );
        });
            request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );

        });
    });

    return false;

});

//suppression news
    $('.suprnews').on('click', function() {
        console.log('btn simplenews ready !');
        var news = $(this).data('id');

        ShowDialog("Confirmation de suppression", "Êtes-vous sûr de vouloir supprimer?",
            ()=> {
            },
            ()=> {
                let request = $.ajax({
                    url: "./lib/methode_ajax.php",
                    method: "POST",
                    data: {action: "deleteNews", idNews: news},
                    dataType: "json" //JSON = reponse attendu en array() ou HTML, reponse de type string
                });
                request.done(function( msg ) {

                    console.log("hello world !!! ");
                    //console.log(msg);
                    //afichage de la modal ave
                    $('#my-modal .modal-body p').html(msg.data.modalMessage);
                    if(!msg.error) document.getElementById("news-"+news).remove();
                    $("#my-modal").show();
                    //$( "#log" ).html( msg );
                });
                request.fail(function( jqXHR, textStatus ) {
                    console.log( "Request failed: " + textStatus );

                });
            });

        return false;

    });
//ajout formulaire wysiwig
    $('#add-news-form').on('submit', function(event){
        var formElmt = document.getElementById("add-news-form");
        if(!formElmt.checkValidity()) return false;
        event.preventDefault();
       var data = new FormData(formElmt);
       data.append("action", "ADD_NEWS");
        //methode Ajax
        var request = $.ajax({
            url: "./lib/methode_ajax.php",
            method: "POST",
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            data: data,
        });
        request.done(function( msg ) {
            msg = JSON.parse(msg);
            //afichage de la modal
            $('#my-modal .modal-body p').html(msg.data.modalMessage);
            if(!msg.error) {
                $('#single_news').prepend(
                    `
                <div class="col-lg-3 col-md-6">
                <div class="single-blog-item blog-item">
                    <div class="blog-img">
                        <img src="img/blog/blog-1.jpg" alt="">
                    </div>
                    <div class="blog-text">
                        <span class="blog-time">${msg.data.news.DPUBLICATION}</span>
                        <h4><a href="./index.php?page=news&id=${msg.data.news.IDNOUVELLE}">${msg.data.news.TITRE_NOUVELLE}</a></h4>
                        <div class="blog-widget">
                        </div>
                    </div>
                </div>
            </div>
            `
            );
            }

            $('#my-modal').show();
            //$( "#log" ).html( msg );
            formElmt.reset();
        });

        //erreur 404 ou 500 - le serveur ne repond pas, erreur PHP ?
        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });


        //stopper le comportement normal d'une balise de type <a> pour pas executer le comportement type lien
        return false;

    });
    //Filtre gallerie
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        if(value == "all")
        {
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
    });

    if ($(".filter-button").removeClass("active")) {
        $(this).removeClass("active");
    }
    $(this).addClass("active");

// fermeture image galleries
    $('.image-popup').magnificPopup({
        type: 'image'
    });

    $('#upload-img-wrapper').on('click', function () {
        $('#upload-img-input').click();
    })
    $('#upload-img-input').on('change', function () {
        var reader = new FileReader();
        reader.addEventListener("load", ()=>{
            $('#upload-img-preview').attr("src", reader.result);
        })
        reader.readAsDataURL(this.files[0]);
    })
    //fonction prepend
    function afficher(btnCls,par1,title) {
        $(btnCls).on("click", function () {

            console.log("je click");

            //to be continued pour optimiser

            if ($(par1 + ':visible').length) {

                $(par1).hide();
                $(this).html(title);

            } else if ($(par1 + ':hidden').length) {

                $(par1).show();
                $(this).html('Réduire');

            }
        })
    }


//append prepend maj profil
    afficher('.card_maj .btn', '#majProfil', 'Mettre à jour votre profil');

//append prepend maj activité
    afficher('.modifAct .btn', '#act', 'Modifiez votre activité?');

    // $('.modifAct .btn').on("click",function(){
    //
    //     console.log("je click");
    //
    //     //to be continued pour optimiser
    //
    //     if($('.booking-classes:visible').length){
    //
    //         $('#act').hide();
    //         $(this).html('Modifiez votre activité?');
    //
    //     }else if($('.booking-classes:hidden').length){
    //
    //         $('#act').show();
    //         $(this).html('Réduire');
    //
    //     }
    //
    // });
//append prepend modif news
    afficher('.modif .btn',  '#wisi', 'Modifiez votre news?');
    /*$('.modif .btn').on("click",function(){

        console.log("je click");

        //to be continued pour optimiser

        if($('.booking-classes:visible').length){

            $('#wisi').hide();
                           $(this).html('Modifiez votre news?');

        }else if($('.booking-classes:hidden').length){

            $('#wisi').show();
                           $(this).html('Réduire');

        }

    });*/

//openstreetmap
    if($('#openmap').length) {
// On initialise la latitude et la longitude de Paris (centre de la carte)

        var lat = 44.099119;
        var lon = 3.079622;
        var macarte = null;
        var id_map = 'openmap';

        initMap(lat, lon, macarte);
        var marker = L.marker([lat, lon]).addTo(macarte);
    }
    function initMap() {
        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
        macarte = L.map(id_map).setView([lat, lon], 11);
        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
        L.tileLayer('http://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            // Il est toujours bien de laisser le lien vers la source des données
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20

        }).addTo(macarte);
    }


    function  CreateDialog() {
        const tmp = `
        <div id="my-dialog" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dialogTitle"></h5>
                        <button id="close-dialog" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="dialogMsg"></p>
                    </div>
                    <div class="modal-footer">
                      <button id="confirm-dialog" type="button" class="btn btn-secondary">Confirmer</button>
                        <button id="cancel-dialog" type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    `
        var dialog = document.createElement('div');
        dialog.innerHTML=tmp;
        document.body.appendChild(dialog);
        $('#my-dialog').hide();
    }

    function  ShowDialog(title, msg, cancel, confirm) {
        document.getElementById('dialogTitle').innerText=title;
        document.getElementById('dialogMsg').innerText=msg;

        const confirmHandle = ()=> {
            confirm();
            document.getElementById('cancel-dialog').removeEventListener('click', cancelHandle);
            document.getElementById('confirm-dialog').removeEventListener('click', confirmHandle);
            document.getElementById('close-dialog').removeEventListener('click', cancelHandle);
            $('#my-dialog').hide();
        }

        const cancelHandle = () => {
            cancel();
            document.getElementById('cancel-dialog').removeEventListener('click', cancelHandle);
            document.getElementById('confirm-dialog').removeEventListener('click', confirmHandle);
            document.getElementById('close-dialog').removeEventListener('click', cancelHandle);

            $('#my-dialog').hide();
        }


        document.getElementById('confirm-dialog').addEventListener('click', confirmHandle);
        document.getElementById('cancel-dialog').addEventListener('click', cancelHandle);
        document.getElementById('close-dialog').addEventListener('click', cancelHandle);
        $('#my-dialog').show();
    }

    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });

})(jQuery);




// Fonction d'initialisation de la carte
