$(document).ready(function () {
    $.LoadingOverlaySetup({image:"",fontawesome : "fa fa-gear fa-spin",maxSize:150,minSize:20});

    window.addEventListener("beforeunload", function (e) {
        $.LoadingOverlay("show");
        return null;
    });
});