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

const buscadorPropiedades = (formulario) => {
    $.post("./funciones", $("#"+formulario).serialize())
    .done(function (result) {
        document.getElementById('cuerpoBuscador').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
};

const selectPais = (id_pais) => {
    $.post("./funciones", {
        f: 'comuna_function',
        opc: 1,
        id_pais: id_pais
    })
    .done(function (result) {
        document.getElementById('pais').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const selectRegion = (pais, id_region) => {
    $.post("./funciones", {
        f: 'comuna_function',
        opc: 2,
        id_pais: pais,
        id_region: id_region
    })
    .done(function (result) {
        document.getElementById('region').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const selectComuna = (comuna, id_comuna) => {
    $.post("./funciones", {
        f: 'comuna_function',
        opc: 3,
        id_region: comuna,
        comuna: id_comuna
    })
    .done(function (result) {
        document.getElementById('comuna').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const selectPropiedad = (propiedad) => {
    $.post("./funciones", {
        f: 'propiedad_function',
        opc: 1,
        propiedad: propiedad
    })
    .done(function (result) {
        document.getElementById('propiedad').innerHTML = result;
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const traerDatosAction = (propiedad, pais, region, comuna, dormitorio, banos, estacionamiento, bodega) => {

    console.log(propiedad, pais, region, comuna, dormitorio, banos, estacionamiento, bodega);
    $.post("./funciones", {
        f: 'buscador_modal',
        opc: 2,
        propiedad : propiedad,
        pais : pais,
        region : region,
        comuna : comuna,
        dormitorio : dormitorio,
        banos : banos,
        estacionamiento : estacionamiento,
        bodega : bodega
    })
    .done(function (result) {
        let data = JSON.parse(result);
        document.getElementById('propiedad').innerHTML = data.propiedad;
        document.getElementById('pais').innerHTML = data.pais;
        document.getElementById('region').innerHTML = data.region;
        document.getElementById('comuna').innerHTML = data.comuna;
        document.getElementById('dormitorio').value = dormitorio;
        document.getElementById('banos').value = banos;
        document.getElementById('estacionamiento').value = estacionamiento;
        document.getElementById('bodega').value = bodega;

        buscadorPropiedades('form-buscador');
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!! : ' + jqXHR.status);
    });
}

const buscador = () => {
    const action = document.getElementById('action').value;
    if(action > 0){
        traerDatosAction(
            document.getElementById('propiedad_action').value,
            document.getElementById('pais_action').value,
            document.getElementById('region_action').value,
            document.getElementById('comuna_action').value,
            document.getElementById('dormitorio_action').value,
            document.getElementById('banos_action').value,
            document.getElementById('estacionamiento_action').value,
            document.getElementById('bodega_action').value
        );        
    }else{
        selectPropiedad();
        selectPais();
    }
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

const reservar = (propiedad) => {
    document.getElementById("idpropiedaddetalle").value = propiedad;
    let formulario = document.getElementById("detallePropiedad");
    formulario.submit();
}

buscador();