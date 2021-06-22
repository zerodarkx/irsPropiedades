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

const format = (input) => {
    var num = input.value.replace(/\./g, '');
    if (!isNaN(num)) {
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/, '');
        input.value = num;
    }
};

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

const selectPais = () => {
    $.post("./funciones", {
        f: 'comuna_function',
        opc: 1
    })
    .done(function (result) {
        document.getElementById('pais').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const selectRegion = (pais) => {
    $.post("./funciones", {
        f: 'comuna_function',
        opc: 2,
        id_pais: pais
    })
    .done(function (result) {
        document.getElementById('region').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const selectComuna = (comuna) => {
    $.post("./funciones", {
        f: 'comuna_function',
        opc: 3,
        id_region: comuna
    })
    .done(function (result) {
        document.getElementById('comuna').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const selectPropiedad = () => {
    $.post("./funciones", {
        f: 'propiedad_function',
        opc: 1
    })
    .done(function (result) {
        document.getElementById('propiedad').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const selectCodigoTelefono = () => {
    $.post("./funciones", {
        f: 'ingreso_function',
        opc: 2
    })
    .done(function (result) {
        document.getElementById('cod_tel').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const validarIngreso = (formulario) => {
    $('#'+formulario).validate({
        rules: {
            "rut_pro": {
                required: true,
                rut: true
            },
            "nom_pro": {
                required: true
            },
            "correo_pro": {
                required: true
            },
            "cod_tel": {
                required: true
            },
            "telefono": {
                required: true
            },
            "direccion": {
                required: true
            },
            "propiedad": {
                required: true
            },
            "pais": {
                required: true
            },
            "region": {
                required: true
            },
            "comuna": {
                required: true
            },
            "valorVenta": {
                required: true
            },
            "m_terreno": {
                required: true
            },
            "m_construidos": {
                required: true
            },
            "rol_pro": {
                required: true
            },
            "obs": {
                required: true
            },
            "dormitorios" : {
                required: true,
                digits: true
            },
            "bodega" : {
                required: true,
                digits: true
            },
            "estacionamiento" : {
                required: true,
                digits: true
            },
            "banos" : {
                required: true,
                digits: true
            }
        },
        messages: {
            "rut_pro": {
                required: "Favor Ingrese Rut",
            },
            "nom_pro": {
                required: "Favor Ingrese Nombre Completo",
            },
            "correo_pro": {
                required: "Favor Ingrese Correo",
            },
            "cod_tel": {
                required: "Favor Ingrese Codigo Telefonico",
            },
            "telefono": {
                required: "Favor Ingrese Telefono",
            },
            "direccion": {
                required: "Favor Ingrese Dirección",
            },
            "propiedad": {
                required: "Favor Ingrese Tipo Propiedad",
            },
            "pais": {
                required: "Favor Ingrese Pais",
            },
            "region": {
                required: "Favor Ingrese Región",
            },
            "comuna": {
                required: "Favor Ingrese Comuna",
            },
            "valorVenta": {
                required: "Favor Ingrese Valor Venta",
            },
            "m_terreno": {
                required: "Favor Ingrese Metros del Terreno",
            },
            "m_construidos": {
                required: "Favor Ingrese Metros Construidos",
            },
            "rol_pro": {
                required: "Favor Ingrese Rol",
            },
            "obs": {
                required: "Favor Ingrese Observaciones",
            },
            "dormitorios" : {
                required: "Favor Ingrese Numero de Dormitorio",
                digits: "Favor Ingrese Solo Numeros"
            },
            "bodega" : {
                required: "Favor Ingrese Numero de Bodega",
                digits: "Favor Ingrese Solo Numeros"
            },
            "estacionamiento" : {
                required: "Favor Ingrese Numero de Estacionamiento",
                digits: "Favor Ingrese Solo Numeros"
            },
            "banos" : {
                required: "Favor Ingrese Numero de Baños",
                digits: "Favor Ingrese Solo Numeros"
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
            newPropiedad(formulario);
        }
    });
};

const newPropiedad = (formulario) => {
    $.post("./funciones", $("#"+formulario).serialize())
    .done(function (result) {
        let data = JSON.parse(result);
        swal.fire(data.tit, data.mes, data.ico);
        if (data.val) {
            reloadPage("/ingresar", 3000);
        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

selectCodigoTelefono();
selectPais();
selectPropiedad();