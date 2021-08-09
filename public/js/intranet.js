const opciones = (opc) => {
    $.post("./funciones", {
        f: 'intranet_modal',
        opc: opc
    })
    .done(function (result) {
        document.getElementById('cuerpoDeIntranet').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const changePassword = (form) => {
    $.post("./funciones", {
        f: 'intranet_function',
        opc: 1,
        password: document.getElementById('password_usuario').value
    })
    .done(function (result) {
        let data = JSON.parse(result);
        if (data.val) {
            document.getElementById(form).reset();
        }
        swal.fire(data.tit, data.mes, data.ico);
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const verPropiedad = (id_propiedad) => {
    console.log(id_propiedad);
    document.getElementById('id_propiedad').value = id_propiedad;
    let formulario = document.getElementById('form-verDetalle');

    formulario.submit();

}

opciones('home');