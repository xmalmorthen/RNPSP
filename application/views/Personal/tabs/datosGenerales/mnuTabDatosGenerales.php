<div class="row mt-4 " id="submenu_datos_generales">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" id="Datos_personales-nav">
            <a class="nav-link active" id="Datos_personales-tab" data-toggle="tab" href="#Datos_personales" role="tab" aria-controls="Datos_personales" aria-selected="true">Datos personales</a>
        </li>
        <li class="nav-item" id="Desarrollo-nav">
            <a class="nav-link" id="Desarrollo-tab" data-toggle="tab" href="#Desarrollo" role="tab" aria-controls="Desarrollo" aria-selected="false" style="color:#02657C">Desarrollo académico</a>
        </li>
        
        <li class="nav-item" id="Domicilio-nav">
            <a class="nav-link" id="Domicilio-tab" data-toggle="tab" href="#Domicilio" role="tab" aria-controls="Domicilio" aria-selected="false" style="color:#02657C">Domicilio</a>
        </li>
        <li class="nav-item" id="Referencias-nav">
            <a class="nav-link" id="Referencias-tab" data-toggle="tab" href="#Referencias" role="tab" aria-controls="Referencias" aria-selected="false" style="color:#02657C">Referencias</a>
        </li>
        <li class="nav-item" id="Socioeconomicos-nav">
            <a class="nav-link" id="Socioeconomicos-tab" data-toggle="tab" href="#Socioeconomicos" role="tab" aria-controls="Socioeconomicos" aria-selected="false" style="color:#02657C">Socioeconómicos</a>
        </li>
    
    </ul>
</div>

<script type="text/javascript">
    $("#Datos_personales-nav").click(function(){
        $("#Datos_personales-tab").css("color","#0ca4ca");
        $("#Desarrollo-tab").css("color","rgb(73, 80, 87)");
        $("#Domicilio-tab").css("color","rgb(73, 80, 87)");
        $("#Referencias-tab").css("color","rgb(73, 80, 87)");
        $("#Socioeconomicos-tab").css("color","rgb(73, 80, 87)");
    })
     $("#Desarrollo-nav").click(function(){
        $("#Datos_personales-tab").css("color","rgb(73, 80, 87)");
        $("#Desarrollo-tab").css("color","#0ca4ca");
        $("#Domicilio-tab").css("color","rgb(73, 80, 87)");
        $("#Referencias-tab").css("color","rgb(73, 80, 87)");
        $("#Socioeconomicos-tab").css("color","rgb(73, 80, 87)");
    })
    $("#Domicilio-nav").click(function(){
        $("#Datos_personales-tab").css("color","rgb(73, 80, 87)");
        $("#Desarrollo-tab").css("color","rgb(73, 80, 87)");
        $("#Domicilio-tab").css("color","#0ca4ca");
        $("#Referencias-tab").css("color","rgb(73, 80, 87)");
        $("#Socioeconomicos-tab").css("color","rgb(73, 80, 87)");
    })
    $("#Referencias-nav").click(function(){
        $("#Datos_personales-tab").css("color","rgb(73, 80, 87)");
        $("#Desarrollo-tab").css("color","rgb(73, 80, 87)");
        $("#Domicilio-tab").css("color","rgb(73, 80, 87)");
        $("#Referencias-tab").css("color","#0ca4ca");
        $("#Socioeconomicos-tab").css("color","rgb(73, 80, 87)");
    })
        $("#Socioeconomicos-nav").click(function(){
        $("#Datos_personales-tab").css("color","rgb(73, 80, 87)");
        $("#Desarrollo-tab").css("color","rgb(73, 80, 87)");
        $("#Domicilio-tab").css("color","rgb(73, 80, 87)");
        $("#Referencias-tab").css("color","rgb(73, 80, 87)");
        $("#Socioeconomicos-tab").css("color","#0ca4ca");
    })

</script>