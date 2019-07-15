function cveElectorValido(val, aceptarGenerico = true) {
    const re = /^([A-Z]{6})([0,1-9]{8})([A-Z]{1})([A-Z-0-9]{3})$/;
    return val ? val.match(re) : true;
}

function validarCveElector(valor) {
    return cveElectorValido(valor.trim().toUpperCase());
}