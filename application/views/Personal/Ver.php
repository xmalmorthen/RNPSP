
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
       <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="datosGenerales" role="tabpanel" aria-labelledby="Tab1-tab">
                
                 <?php echo $this->load->view('Solicitud/tabs/datosGenerales/mnuTabDatosGenerales',null,TRUE) ?>

                <div class="tab-content" id="contentDatosGenerales">
                     
                     <?php echo $this->load->view('Solicitud/tabs/datosGenerales/contenidoDatosGenerales',null,TRUE) ?>
    
                </div>

            </div>
            <div class="tab-pane fade" id="Laboral" role="tabpanel" aria-labelledby="profile-tab">
            
                <?php echo $this->load->view('Solicitud/tabs/Laboral/mnuTabLaboral',null,TRUE) ?>

                <div class="tab-content" id="contentLaboral">
                     
                    <?php echo $this->load->view('Solicitud/tabs/Laboral/contenidoLaboral',null,TRUE) ?>

                </div>

            </div>
            <div class="tab-pane fade" id="Capacitacion" role="tabpanel" aria-labelledby="Tab3-tab">
                
                <?php echo $this->load->view('Solicitud/tabs/Capacitacion/mnuTabCapacitacion',null,TRUE) ?>

                <div class="tab-content" id="contentCapacitacion">
                    
                    <?php echo $this->load->view('Solicitud/tabs/Capacitacion/contenidoCapacitacion',null,TRUE) ?>

                </div>

            </div>
             <div class="tab-pane fade" id="Identificacion" role="tabpanel" aria-labelledby="Tab3-tab">
  
                <?php echo $this->load->view('Solicitud/tabs/Identificacion/mnuTabIdentificacion',null,TRUE) ?>

                <div class="tab-content">

                     <?php echo $this->load->view('Solicitud/tabs/Identificacion/contenidoIdentificacion',null,TRUE) ?>
                
                </div>
            </div>
        </div>


    


  
</div>


<script type="text/javascript">

$(function() {
       

    });
</script>