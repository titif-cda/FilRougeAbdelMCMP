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
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
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
	$('.circle-progress').each(function() {
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
	});


    /*------------------
            Mon JS
   --------------------*/
    $('.carousel-inner').carousel({
        interval: 20000
    })



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


    $('#add-news-form').on('submit', function(event){

        // var description = $('#summernote').summernote('code');
        // var title = $('.wysiwyg input[name=titre]').val();
        // var dpublication = $('.wysiwyg input[name=dpublication]').val();
        var formElmt = document.getElementById("add-news-form");

        if(!formElmt.checkValidity()) return false;

        event.preventDefault();

        var data = new FormData(formElmt);

        //methode Ajax
        var request = $.ajax({
            url: "./lib/methode_ajax.php",
            method: "POST",
            data: { action : "ADD_NEWS", data: JSON.stringify(Object.fromEntries(data))},
            dataType: "json"
        });

        //reussite reponse 200 - Inclu le fait que vous avez pas les permissions requisent
        request.done(function( msg ) {
            //console.log(msg);
            //afichage de la modal
            $('#my-modal .modal-body p').html(msg.data.modalMessage);
            if(!msg.error) {
                $('#single_news').append(
                    `
                <div class="col-lg-3 col-md-6">
                <div class="single-blog-item blog-item">
                    <div class="blog-img">
                        <img src="img/blog/blog-1.jpg" alt="">
                    </div>
                    <div class="blog-text">
                        <span class="blog-time">${msg.data.news.DPUBLICATION}</span>
                        <h4><a href="./index.php?page=news&id=${msg.data.news.IDNOUVELLE}">${msg.data.news.TITRE_NOUVELLE}</a></h4>
            
                        <!--<p>In viverra urna in orci imperdiet, aliquam suscipit risus consequat. Sed auctor, urna ac
                            convallis laoreet, diam nibh dignissim ante, ac finibus.</p> -->
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
        });

        //erreur 404 ou 500 - le serveur ne repond pas, erreur PHP ?
        request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
        });


        //stopper le comportement normal d'une balise de type <a> pour pas executer le comportement type lien
        return false;

    });


})(jQuery);

