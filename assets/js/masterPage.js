var swalShow = false;

if ( typeof sess_time_to_update !== 'undefined') {
    var timer = setInterval(function() { 
        if (parseInt(sess_time_to_update) <= parseInt(sess_time_left_to_confirm) && !swalShow ){
            MyCookie.session.save();

            swalShow = true;
            timerInterval = null;
            Swal.fire({
                title: 'Sesión',
                html: "Está a punto de expirar la sesión por inactividad,<br> desea mantener la sesión activa?<br><br> Tiempo restante: <span class='swalSessionRemainTime'><strong></strong></span>",
                footer: "<div>Se perderá cualquier avance no guardado...</div>",
                type: 'question',
                allowOutsideClick : false,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                timer: sess_time_to_update * 1000,
                onBeforeOpen: function() {
                    timerInterval = setInterval(function() {

                        // var sessionObj = MyCookie.session.get();
                        // if (parseInt(sessionObj.sess_time_to_update) > parseInt(sessionObj.sess_time_left_to_confirm)){
                        //     Swal.close();
                        //     return null;
                        // }

                        var content = Swal.getContent();
                        
                        if (content) {
                            var timeLeft = (Swal.getTimerLeft() / 1000),
                                mitnutesLeft = Math.trunc(timeLeft / 60),
                                secondsLeft = Math.trunc(timeLeft % 60),
                                msgLeft = mitnutesLeft >= 1 ? (  mitnutesLeft.toString() + " minuto" + (mitnutesLeft > 1 ? 's':'') + ' ' + secondsLeft.toString() + " segundo" + (secondsLeft != 1 ? 's':'') ) : (  secondsLeft.toString() + " segundo" + (secondsLeft > 1 ? 's':'') );

                            content.querySelector('strong')
                            .textContent = (msgLeft);
                        }
                    }, 1000);
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
            }).then(function(result){
                if (result.value === true){
                    $.getJSON(site_url + 'UserSession/renovateSession/' + guid(), function(timeRemain) {
                        swalShow = false;
                        sess_base_time = timeRemain;
                        sess_time_to_update = timeRemain;
                    });                    
                } else if (result.dismiss === 'cancel') {
                    window.location.href = site_url + 'Sesion/Terminar';
                }
            });
        }
        if (sess_time_to_update == 1) {
            window.location.href = site_url + 'Sesion/Terminar';
        }
        sess_time_to_update--;
    }, 1000);
}

$(document).ready(function () { 
    
    moment.locale('es');
    
    $.LoadingOverlaySetup({image:"",fontawesome : "fa fa-gear fa-spin",maxSize:150,minSize:20,zIndex : 1000});
    
    if (typeof MyCookie !== 'undefined') {
        MyCookie.session.save();
        MyCookie.session.get();
    }

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
            Swal.fire({
                position: 'top-end',
                type: 'error',
                title: 'Error',
                html: outputError.errorMgs,
                footer: '<span>GUID de rastreo [ <strong>' + outputError.guid + '</strong> ]</span>',
                showConfirmButton: true,
                allowOutsideClick: false            
            });
        }
    }

    $.validator.setDefaults({
        ignore: [':disabled'],
        errorClass: "text-danger",
        debug: true,
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });    

    $('[data-toggle="tooltip"]').tooltip();
});