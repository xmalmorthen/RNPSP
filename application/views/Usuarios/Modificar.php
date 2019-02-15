<div class="container">
    <form action="#" id="Usuarios_form" name="Usuarios_form" autocomplete="off">
    <br>
        <div class="row">
            <div class="col-md-4">
                <span class="clr">*</span> CURP
                <input type="text" class="form-control" id="pCURP" name="pCURP" required minlength="18" maxlength="20">
            </div>
            <div class="col-md-4">
                <span class="clr">*</span>Nombre
                <input type="text" class="form-control" id="pNOMBRE" name="pNOMBRE"required minlength="2" maxlength="30">
            </div>
            <div class="col-md-4">
                <span class="clr">*</span>Apellido paterno
                <input type="text" class="form-control" id="pPATERNO" name="pPATERNO"required minlength="1" maxlength="30">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <span class="clr">*</span>Apellido materno
                <input type="text" class="form-control" id="pMATERNO" name="pMATERNO"required minlength="1" maxlength="30">
            </div>
            <div class="col-md-4">
                <span class="clr">*</span>Adscripción
                <input type="text" class="form-control" id="pID_ADSCRIPCION" name="pID_ADSCRIPCION"required minlength="1" maxlength="10">
            </div>
            <div class="col-md-4">
                <span class="clr">*</span>Contraseña
                <input type="text" class="form-control" id="pCONTRASENA" name="pCONTRASENA"required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <span class="clr">*</span>Tipo de usuario
                <select id="pTIPO_USUARIO" name="pTIPO_USUARIO" class="form-control"required></select>
            </div>
            <div class="col-md-4">
                <span class="clr">*</span>Correo electrónico
                <input type="email" id="pCORREO" name="pCORREO" class="form-control"required>
            </div>
            <div class="col-md-4">
                Jefe inmediato
                <input type="text" class="form-control" id="pID_JEFE" name="pID_JEFE">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-default">Guardar</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-default">Regresar</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </form>
</div>