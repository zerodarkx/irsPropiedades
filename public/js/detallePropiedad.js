
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

const enviarConsulta = (form) => {
    $.post("./funciones", $("#"+form).serialize())
    .done(function (result) {
        let data = JSON.parse(result);
        swal.fire(data.tit, data.mes, data.ico);
        document.getElementById(form).reset();
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

cuerpoDetalle();