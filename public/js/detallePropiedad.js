
const cuerpoDetalle = () => {
    $.post("./funciones", {
        f: 'detallePropiedad_modal',
        opc: 1,
        id_propiedad: document.getElementById('propiedad').value
    })
    .done(function (result) {
        document.getElementById('cuerpoDetalle').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const intervaloCarusel = () => {
    $('.carusel-imagenes').carousel({
        interval: 2000
    });
}

const enviarConsulta = (form) => {
    $.post("./funciones", $("#"+form).serialize())
    .done(function (result) {
        console.log(result);
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

cuerpoDetalle();
intervaloCarusel();