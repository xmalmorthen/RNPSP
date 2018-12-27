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
    
    if (typeof outputError !== 'undefined') {
        if (outputError.errorMgs.length > 0){
            Swal({
                position: 'top-end',
                type: 'error',
                title: 'Error',
                html: outputError.errorMgs,
                footer: '<span>GUID de rastreo [ <strong>' + outputError.guid + '</strong> ]</span>',
                showConfirmButton: true,
                allowOutsideClick: false            
            })
        }
    }
});