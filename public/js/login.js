jQuery.validator.addMethod("rut", function (value, element) {
    return validaRut(value);
}, 'Rut incorrecto.');

function validaRut(rut) {
    var validarRut = false;
    var tester = new RegExp(/((^[1-9])[0-9.]+([-kK0-9])+$)/g);
    
    if (tester.test(rut) == false)
    {
        return validarRut;
    }
    else
    {   
        var sRut = new String(rut);
        var sRutFormateado = '';
        var strRut = new String(rut);
        var continuar = true;
        var suma = 0;
        
        while (sRut.indexOf(".") != -1)
        {
            sRut = sRut.replace(".", "");
        }

        while (sRut.indexOf("-") != -1)
        {
            sRut = sRut.replace("-", "");
        }

        var digitoVerificador = strRut.substr(strRut.indexOf("-")+1, 1);

        if (digitoVerificador)
        {
            var sDV = sRut.charAt(sRut.length - 1);
            sRut = sRut.substring(0, sRut.length - 1);
        }

        for (i = 2; continuar; i++)
        {
            suma += (sRut % 10) * i;
            sRut = parseInt((sRut / 10));
            i = (i == 7) ? 1 : i;
            continuar = (sRut == 0) ? false : true;
        }

        resto = suma % 11;
        var dv = 11 - resto;

        if (dv == 10)
        {
            if (digitoVerificador.toUpperCase() == 'K')
            {
                validarRut = true;
                return validarRut;
            }
        }
        else if (dv == 11 && digitoVerificador == 0)
        {
            validarRut = true;
            return validarRut;
        }
        else if (dv == digitoVerificador) {
            validarRut = true;
            return validarRut;
        }
        else
        {
            return validarRut;
        }
    }
}

function formatCliente(cliente) {    
    let acliente = formatearRut($("#"+cliente).val());
    $("#"+cliente).val(acliente);
}

function formatearRut(rut)
{
    var tester = new RegExp(/((^[1-9])[0-9.]+([-kK0-9])+$)/g);
    if (tester.test(rut) == false) {
        return rut // search term
    } else {
        var sRut = new String(rut);
        var sRutFormateado = '';
        var strRut = new String(rut);
        while (sRut.indexOf(".") != -1) {
            sRut = sRut.replace(".", "");
        }
        while (sRut.indexOf("-") != -1) {
            sRut = sRut.replace("-", "");
        }

        var digitoVerificador = strRut.substr(strRut.indexOf("-"), 1);

        if (digitoVerificador) {
            var sDV = sRut.charAt(sRut.length - 1);
            sRut = sRut.substring(0, sRut.length - 1);
        }
        while (sRut.length > 3) {
            sRutFormateado = "." + sRut.substr(sRut.length - 3) + sRutFormateado;
            sRut = sRut.substring(0, sRut.length - 3);
        }
        sRutFormateado = sRut + sRutFormateado;
        if (sRutFormateado !== "" && digitoVerificador) {
            sRutFormateado += "-" + sDV;
        } else if (digitoVerificador) {
            sRutFormateado += sDV;
        }

        sRutFormateado = sRutFormateado.toLowerCase();
        return sRutFormateado;
    }
}

function reloadPage(url, tmp) {
    setTimeout(function() {
        window.location.href = url
    }, tmp)
}

const registrar = () => {
    document.getElementById('registrar').classList.toggle('d-none');
    document.getElementById('btn-registrar').classList.toggle('d-none');
}

const validarIngreso = (form) => {
    let formulario = "#"+form;
    $(formulario).validate({
        rules: {
            "nom_com": {
                required: true
            },
            "rut_usu": {
                required: true,
                rut: true
            },
            "tel_usu": {
                required: true
            },
            "correo_usu": {
                required: true
            },
            "pass_usu": {
                required: true,
                minlength: 8
            }
        },
        messages: {
            "nom_com": {
                required: "Favor Ingrese Nombre Completo",
            },
            "rut_usu": {
                required: "Favor Ingrese Rut",
            },
            "tel_usu": {
                required: "Favor Ingrese Teléfono",
            },
            "correo_usu": {
                required: "Favor Ingrese Correo",
            },
            "pass_usu": {
                required: "Favor Ingrese Password",
                minlength: "El minimo de Caracteres es 8"
            }
        },
        errorElement: "span",
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.validar').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass('is-valid').removeClass("is-invalid");
        },
        submitHandler: function () {
            regitroNuevo(formulario);
        }
    });
}

const regitroNuevo = (formulario) => {

    $.post("./funciones", $(formulario).serialize())
    .done(function (result) {
        let data = JSON.parse(result);
        if (data.val) {
            document.getElementById('registrar').classList.toggle('d-none');
        }
        swal.fire(data.tit, data.mes, data.ico);
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const validarAcceso = (form) => {
    let formulario = "#"+form;
    $(formulario).validate({
        rules: {
            "usuario": {
                required: true
            },
            "password": {
                required: true
            }
        },
        messages: {
            "usuario": {
                required: "Favor Ingrese Usuario",
            },
            "password": {
                required: "Favor Ingrese Contraseña",
            }
        },
        errorElement: "span",
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.validar').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid').removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass('is-valid').removeClass("is-invalid");
        },
        submitHandler: function () {
            accesoSistema(formulario);
        }
    });
}

const accesoSistema = (formulario) => {
    $.post("./funciones", $(formulario).serialize())
    .done(function (result) {
        if (result) {
            reloadPage('intranet', 100);
        }else{
            let mensaje_login = document.getElementById("mensaje-login");
            let data = Array.from(mensaje_login.classList);

            let resultado = data.includes('d-none');
            if (resultado) {
                document.getElementById('mensaje-login').classList.toggle('d-none'); 
            }
        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}