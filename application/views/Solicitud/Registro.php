
<div class="container">
    <!-- LISTA DE TABS DEL MENU PRINCIPAL -->
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="datosGenerales-tab" data-toggle="tab" href="#datosGenerales" role="tab" aria-controls="datosGenerales" aria-selected="true">Datos generales</a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" id="Laboral-tab" data-toggle="tab" href="#Laboral" role="tab" aria-controls="Laboral" aria-selected="false">Laboral</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Capacitacion-tab" data-toggle="tab" href="#Capacitacion" role="tab" aria-controls="Capacitacion" aria-selected="false">Capacitación</a>
                </li>
          
                <li class="nav-item">
                    <a class="nav-link" id="Identificacion-tab" data-toggle="tab" href="#Identificacion" role="tab" aria-controls="Identificacion" aria-selected="false">Identificación</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- LISTA DE SUBMENUS -->
    <?php echo $this->load->view('Solicitud/tabs/datosGenerales/mnuTabDatosGenerales',null,TRUE) ?>

    <?php echo $this->load->view('Solicitud/tabs/Laboral/mnuTabLaboral',null,TRUE) ?>

    
    <?php echo $this->load->view('Solicitud/tabs/Capacitacion/mnuTabCapacitacion',null,TRUE) ?>

    <?php echo $this->load->view('Solicitud/tabs/Identificacion/mnuTabIdentificacion',null,TRUE) ?>


    <!-- CONTENIDOS PARA LOS SUBMENUS -->
    <?php echo $this->load->view('Solicitud/tabs/datosGenerales/contenidoDatosGenerales',null,TRUE) ?>
  
    <?php echo $this->load->view('Solicitud/tabs/Laboral/contenidoLaboral',null,TRUE) ?>

    <?php echo $this->load->view('Solicitud/tabs/Capacitacion/contenidoCapacitacion',null,TRUE) ?>

    <?php echo $this->load->view('Solicitud/tabs/Identificacion/contenidoIdentificacion',null,TRUE) ?>

   
   
  
</div>


<script type="text/javascript">

$(function() {
       
//DATOS GENERALES
$("#datosGenerales-tab").click(function(){
    $("#submenu_datos_generales").css("display","block");
    $(".content_submenu_datos_generales").css("display","block");
    $("#submenu_objetos_asignados").css("display","none");
    $(".content_submenu_objetos_asignados").css("display","none");
    $("#submenu_laboral").css("display","none");
    $(".content_submenu_laboral").css("display","none");
    $("#submenu_capacitacion").css("display","none");
    $(".content_submenu_capacitacion").css("display","none");
    $("#submenu_sanciones_y_estimulos").css("display","none");
    $(".content_submenu_sanciones_y_estimulos").css("display","none");
    $("#submenu_identificacion").css("display","none");
    $(".content_submenu_identificacion").css("display","none");
});
//OBJETOS ASIGNADOS
$("#objetosAsignados-tab").click(function(){
    $("#submenu_datos_generales").css("display","none");
    $(".content_submenu_datos_generales").css("display","none");
    $("#submenu_objetos_asignados").css("display","block");
    $(".content_submenu_objetos_asignados").css("display","block");
    $("#submenu_laboral").css("display","none");
    $(".content_submenu_laboral").css("display","none");
    $("#submenu_capacitacion").css("display","none");
    $(".content_submenu_capacitacion").css("display","none");
    $("#submenu_sanciones_y_estimulos").css("display","none");
    $(".content_submenu_sanciones_y_estimulos").css("display","none");
    $("#submenu_identificacion").css("display","none");
    $(".content_submenu_identificacion").css("display","none");
});
//LABORAL
$("#Laboral-tab").click(function(){


    $("#submenu_datos_generales").css("display","none");
    $(".content_submenu_datos_generales").css("display","none");
    $("#submenu_objetos_asignados").css("display","none");
    $(".content_submenu_objetos_asignados").css("display","none");
    $("#submenu_laboral").css("display","block");
    $(".content_submenu_laboral").css("display","block");
    $("#submenu_capacitacion").css("display","none");
    $(".content_submenu_capacitacion").css("display","none");
    $("#submenu_sanciones_y_estimulos").css("display","none");
    $(".content_submenu_sanciones_y_estimulos").css("display","none");
    $("#submenu_identificacion").css("display","none");
    $(".content_submenu_identificacion").css("display","none");
});

$("#Capacitacion-tab").click(function(){
    $("#submenu_datos_generales").css("display","none");
    $(".content_submenu_datos_generales").css("display","none");
    $("#submenu_objetos_asignados").css("display","none");
    $(".content_submenu_objetos_asignados").css("display","none");
    $("#submenu_laboral").css("display","none");
    $(".content_submenu_laboral").css("display","none");
    $("#submenu_capacitacion").css("display","block");
    $(".content_submenu_capacitacion").css("display","block");
    $("#submenu_sanciones_y_estimulos").css("display","none");
    $(".content_submenu_sanciones_y_estimulos").css("display","none");
    $("#submenu_identificacion").css("display","none");
    $(".content_submenu_identificacion").css("display","none");
});

$("#Sanciones-tab").click(function(){
    $("#submenu_datos_generales").css("display","none");
    $(".content_submenu_datos_generales").css("display","none");
    $("#submenu_objetos_asignados").css("display","none");
    $(".content_submenu_objetos_asignados").css("display","none");
    $("#submenu_laboral").css("display","none");
    $(".content_submenu_laboral").css("display","none");
    $("#submenu_capacitacion").css("display","none");
    $(".content_submenu_capacitacion").css("display","none");
    $("#submenu_sanciones_y_estimulos").css("display","block");
    $(".content_submenu_sanciones_y_estimulos").css("display","block");
    $("#submenu_identificacion").css("display","none");
    $(".content_submenu_identificacion").css("display","none");
})
$("#Identificacion-tab").click(function(){
    $("#submenu_datos_generales").css("display","none");
    $(".content_submenu_datos_generales").css("display","none");
    $("#submenu_objetos_asignados").css("display","none");
    $(".content_submenu_objetos_asignados").css("display","none");
    $("#submenu_laboral").css("display","none");
    $(".content_submenu_laboral").css("display","none");
    $("#submenu_capacitacion").css("display","none");
    $(".content_submenu_capacitacion").css("display","none");
    $("#submenu_sanciones_y_estimulos").css("display","none");
    $(".content_submenu_sanciones_y_estimulos").css("display","none");
    $("#submenu_identificacion").css("display","block");
    $(".content_submenu_identificacion").css("display","block");
})
    });
</script>