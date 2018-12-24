$(document).ready(function () {
    $.LoadingOverlaySetup({image:"",fontawesome : "fa fa-gear fa-spin",maxSize:150,minSize:20});

    window.addEventListener("beforeunload", function (e) {
        $.LoadingOverlay("show");
        return null;
    });

    $('ul.nav li a[href="' + site_url + uri.uri_string + '"]').parent().addClass('nav-active').closest('.nav-parent').addClass('nav-expanded nav-active');
});