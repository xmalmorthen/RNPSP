<div class="container">
	<div class="row">
  	   <div class="col">
          <nav class="navbar navbar-toggleable-md navbar-light ">
		  <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <a class="navbar-brand" href="http://www.portalunico.col.gob.mx/">
		  	<img src="<?php echo base_url(); ?>img/logo-colima-estado.png" class="nav-image-colima-estado" title="Ir al portal" alt="colima estado">
		  </a>
		  <div class="collapse navbar-collapse justify-content-md-center" id="navbarNavDropdown">
		    <ul class="navbar-nav">
		      <?php if (isset($esconder_menu) && $esconder_menu == 0): ?>
		      <li class="nav-item active">
		        <a class="nav-link" href="http://www.portalunico.col.gob.mx/Portal/Tramites">Tr&aacute;mites <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="http://www.portalunico.col.gob.mx/Portal/detalle_secretarias">Gobierno</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="http://www.portalunico.col.gob.mx/Portal/#sec_atencion" >Cont&aacute;ctanos</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link cursor" target="_blank" href="http://www.portalunico.col.gob.mx/DatosAbiertos" >Datos</a>
		      </li>
		      <li class="nav-item">
		      	<a href="http://www.portalunico.col.gob.mx/transparencia/" class="nav-link cursor" target="_blank">Transparencia</a>
		      </li>
		      <li class="nav-item" >
		        <a class="nav-link" id="navbar-search-li-first" href="#" onclick="ocultar(this)"><i alt="Buscar" title="Buscar" class="fa fa-search" aria-hidden="true"></i></a>
		      </li>
		      <form id="formBusqueda" method="GET" action="http://www.portalunico.col.gob.mx/Portal/detalle_busqueda" class="nav-item display-none" id="navbar-search-li-second">
		        <div class="input-group" id="navbar-input-search">
			      <input type="text" name="q" class="form-control">
			      <span class="input-group-btn">
			        <button class="btn btn-secondary" type="submit">
			        <i alt="Buscar" title="Buscar" class="fa fa-search" aria-hidden="true"></i></button>
			      </span>
			    </div>
		      </form>
		      	
		      <?php endif ?>
		    </ul>
		  </div>
		</nav>
      </div>
  </div> 
</div>
<a href="#" class="scrollToTop" id="ScrollTop"></a>
<script type="text/javascript">	
	function ocultar(elem){
		var id = elem.id;		
		document.getElementById(id).style.display = "none";
		//document.getElementById("navbar-search-li-second").style.display = "inline";
		document.getElementById("formBusqueda").style.display = "inline";
	}

</script>