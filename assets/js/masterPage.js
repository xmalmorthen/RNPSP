$(document).ready(function () {
    $.LoadingOverlaySetup({image:"",fontawesome : "fa fa-gear fa-spin",maxSize:150,minSize:20});

    window.addEventListener("beforeunload", function (e) {
        $.LoadingOverlay("show");
        return null;
    });

    $('#sidebar-menu ul li.submenu a[href="' + site_url + uri.uri_string + '"]')
    .addClass('active')
    .closest('li').addClass('active')
    .closest('ul').css('display','block')
    .closest('li.submenu').find('a').first().addClass('subdrop active');
});