
const cuerpoDetalle = () => {
    $.post("./funciones", {
        f: 'detallePropiedad_modal',
        opc: document.getElementById('opc').value,
        id_propiedad: document.getElementById('propiedad').value
    })
    .done(function (result) {
        document.getElementById('cuerpoDetalle').innerHTML = result;
        setTimeout(function(){
            let autoclick = document.getElementById('siguiente_prueba');
            autoclick.click();
        },5000);
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

const pujarPropiedad = (form) => {
    $.post("./funciones", $("#"+form).serialize())
    .done(function (result) {
        let data = JSON.parse(result);
        swal.fire(data.tit, data.mes, data.ico);
        
        let formulario = document.getElementById('form-recarga');

        setTimeout(function() {
            formulario.submit();
        }, 4000)
        
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const mostrarRango = () => {
    var slider      = document.getElementById("rango_pujar");
    var output      = document.getElementById("rango_texto");
    output.value    = slider.value+"%";

    let valor_antesPuja = document.getElementById('valor_antesPuja').value;
    let porcentaje      = valor_antesPuja * (slider.value / 100);
    
    monto_final     = parseInt(valor_antesPuja) + parseInt(porcentaje);
    monto_final     = monto_final.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
    monto_final     = monto_final.split('').reverse().join('').replace(/^[\.]/, '');

    document.getElementById('valor_puja').value = monto_final;
}

const login = (formulario) => {
    $.post("./funciones", $("#"+formulario).serialize())
    .done(function (result) {
        if(result){
            $.post("./funciones", {
                f: "detallePropiedad_modal",
                opc: 3,
                id_propiedad: document.getElementById('propiedad').value
            })
            .done(function (result) {
                document.getElementById('detallePujarSession').innerHTML = result;
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                alert('Error!! : ' + jqXHR.status);
            });
        }else{
            document.getElementById('mensaje_login').classList.toggle('d-none');
        }
        
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

cuerpoDetalle();