function cveElectorValido(val, aceptarGenerico = true) {
    const re = /^([A-Z]{6})([0,1-9]{8})([A-Z]{4})$/;
    return val ? val.match(re) : true;
}

function validarCveElector(valor) {
    return cveElectorValido(valor.trim().toUpperCase());
}