/* ************************* */

/* ******** INDEX ******** */
$(document).ready(function() {
    $(".dropdown-toggle").dropdown();
    $('.collapse').collapse();
});



response.setCharacterEncoding("UTF-8");


/***** Carousel ******/

$('.carousel').carousel({
    interval: 1000,
    pause: hover,
})


/******** GALERIA *********** */

// init Masonry
var $grid = $('.grid').masonry({
    itemSelector: '.grid-item',
    percentPosition: true,
    columnWidth: '.grid-sizer'
});

// layout Masonry after each image loads
$grid.imagesLoaded().progress(function() {
    $grid.masonry();
});




/* ************************************ */

/* ************************************** */


/* ****** INTRANET *************/

/***** Login ******/

// Form validation
$(document).ready(function() {
    $('loginform').submit(function(e) {
        e.preventDefault();
        var username = $('loginpuser').val();
        var pass = $('loginpass').val();

        $('loginerror').load('login_inc.php', {
            username: username,
            pass: pass
        })
    });
})

/****** FORMULARIOS  *******/

/*** Miembro nuevo ***/

$(".readonly").keydown(function(e) {
    e.preventDefault();
});

$(".readonly").on('keydown paste', function(e) {
    e.preventDefault();
});
$(".readonly").on('paste', function(e) {
    e.preventDefault();
})

$(function() {
    $(document).tooltip();
});

function generarUser() {
    var nombre = $('#mnombre').val().toLowerCase();
    var apellido = $('#mapellido').val().toLowerCase();
    var username = '';

    const removeAccents = (str) => {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    nombre = removeAccents(nombre);
    apellido = removeAccents(apellido);

    var nstr = nombre.split(' ');


    if (nstr.length === 2) {
        username += nstr[0].charAt(0);
        username += nstr[1].charAt(0);
    } else {
        if (nombre.length < 5) {
            username += nstr[0].charAt(0);
            username += nstr[0].charAt(1);
            username += nstr[0].charAt(2);
        } else {
            username += nstr[0].charAt(0);
            username += nstr[0].charAt(2);
            username += nstr[0].charAt(5);
        }
    }

    var astr = apellido.split(' ');
    if (astr.length === 2) {
        username += astr[0];
        username += astr[1];
    } else {
        username += apellido;
    }

    $('#muser').val(username);
    $('#huser').val(username);

}