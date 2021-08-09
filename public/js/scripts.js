window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    /*const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            offset: 72,
        });
    };*/

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

const buscador = () =>{
    $.post("./funciones", {
        f: 'inicio_modal',
        opc: 1,
        propiedad: document.getElementById('propiedad').value,
        pais: document.getElementById('pais').value,
        region: document.getElementById('region').value,
        comuna: document.getElementById('comuna').value,
    })
    .done(function (result) {
        //document.getElementById('pais').innerHTML = result;
        // let contenedor = document.getElementById('buscador_resultado');
	    // contenedor.classList.toggle("d-none");
        console.log(result);
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const selectPais = () => {
    $.post("./funciones", {
        f: 'comuna_function',
        opc: 1
    })
    .done(function (result) {
        document.getElementById('pais').innerHTML = result;
        document.getElementById('pais_subasta').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const selectRegion = (pais, bus) => {
    let select = (bus) ? 'region'+bus : 'region';
    $.post("./funciones", {
        f: 'comuna_function',
        opc: 2,
        id_pais: pais
    })
    .done(function (result) {
        document.getElementById(select).innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const selectComuna = (comuna, bus) => {
    let select = (bus) ? 'comuna'+bus : 'comuna';
    $.post("./funciones", {
        f: 'comuna_function',
        opc: 3,
        id_region: comuna
    })
    .done(function (result) {
        document.getElementById(select).innerHTML = result;
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
        document.getElementById('propiedad_subasta').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const detallePropiedad = (propiedad) => {
    $.post("./funciones", {
        f: 'buscador_modal',
        opc: 3,
        id_propiedad: propiedad
    })
    .done(function (result) {
        document.getElementById('portfolioModal').innerHTML = result;
        $("#portfolioModal").modal('show');
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
};

const detallePropiedadSubasta = (propiedad) => {
    $.post("./funciones", {
        f: 'buscador_modal',
        opc: 5,
        id_propiedad: propiedad
    })
    .done(function (result) {
        document.getElementById('portfolioModal').innerHTML = result;
        $("#portfolioModal").modal('show');
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
};

const destacados = () => {
    $.post("./funciones", {
        f: 'inicio_modal',
        opc: 2
    })
    .done(function (result) {
        document.getElementById('cuerpoDestacado').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const destacadosSubasta = () => {
    $.post("./funciones", {
        f: 'inicio_modal',
        opc: 3
    })
    .done(function (result) {
        document.getElementById('cuerpoDestacadoSubasta').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

selectPropiedad();
selectPais();
destacados();
destacadosSubasta();

const reservar = (propiedad) => {
    $.post("./funciones", {
        f: 'inicio_modal',
        opc: 4,
        id_propiedad: propiedad
    })
    .done(function (result) {
        let data = JSON.parse(result);
        let opcion = 0;
        switch (data.id_estado) {
            case '2':
                opcion = 1;
                break;
        
            default:
                opcion = 2;
                break;
        }
        document.getElementById("opc").value = opcion;
        document.getElementById("detallepropiedad").value = propiedad;

        let formulario = document.getElementById("form-detallePropiedad");
        formulario.submit();
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
    
}

const consulta = (form) => {
    $.post("./funciones", $("#"+form).serialize())
    .done(function (result) {
        swal.fire("Consulta Exitosa", "Estimado(a), pronto un ejecutivo se pondra en contacto con usted.", "success");
        document.getElementById(form).reset();
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}