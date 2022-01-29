(function(){
    'use strict';

    var regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function(){

        /* Leaflet */
/*         var map = L.map('mapa').setView([20.625319, -87.080212], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([20.625319, -87.080212]).addTo(map)
            .bindPopup('GDL Webcamp 2018 <br> Boletos ya disponibles')
            .openPopup()
            .bindTooltip('Un Tooltip')
            .openTooltip(); */

        //Datos usuarios
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');

        //Campos pases
        var pase_dia = document.getElementById('pase_dia');
        var pase_completo = document.getElementById('pase_completo');
        var pase_dosdias = document.getElementById('pase_dosdias');

        //Botones y divs
        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var botonRegistro = document.getElementById('btnRegistro');
        var lista_productos = document.getElementById('lista-productos');
        var suma = document.getElementById('suma-total');

        //extras
        var camisas = document.getElementById('camisa_evento')
        var etiquetas = document.getElementById('etiquetas')

        calcular.addEventListener('click', calcularMontos);

        pase_dia.addEventListener('blur', mostrarDias);
        pase_dosdias.addEventListener('blur', mostrarDias);
        pase_completo.addEventListener('blur', mostrarDias);

        nombre.addEventListener('blur', validarCampos);
        apellido.addEventListener('blur', validarCampos);
        email.addEventListener('blur', validarCampos);
        email.addEventListener('blur', validarEmail);

        botonRegistro.disabled = true;

        function validarCampos(){
            if(this.value == ''){
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = 'Este campo es obligatorio';
                this.style.border = '1px solid red';
                errorDiv.style.border = '1px solid red';
            } else{
                errorDiv.style.display = 'none';
                this.style.border = '1px solid #ccc';
            }
        }

        function validarEmail(){
            if(this.value.indexOf('@') > -1){
                errorDiv.style.display = 'none';
                this.style.border = '1px solid #ccc'
            } else {
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = 'Formato de correo no válido';
                this.style.border = '1px solid red';
                errorDiv.style.border = '1px solid red';
            }
        }


        function calcularMontos(evt){
            evt.preventDefault();
            if(regalo.value === ''){
                alert('Debes elegir un regalo');
                regalo.focus();
            } else{
                var boletosDia = parseInt(pase_dia.value, 10) || 0,
                    boletosDosDias = parseInt(pase_dosdias.value, 10) || 0,
                    boletoCompleto = parseInt(pase_completo.value, 10) || 0,
                    cantidadCamisas = parseInt(camisas.value, 10) || 0,
                    cantidadEtiquetas = parseInt(etiquetas.value, 10) || 0;

                    var totalPagar = (boletosDia * 30) + (boletosDosDias * 45) + (boletoCompleto * 50) + ((cantidadCamisas * 10) * .93) + (cantidadEtiquetas * 2 );

                    var listadoProductos = [];

                    if(boletosDia >= 1){
                        listadoProductos.push(boletosDia + ' Pases por dia');
                    }
                    if(boletosDosDias >= 1){
                        listadoProductos.push(boletosDosDias + ' Pases por dos dias');
                    }
                    if(boletoCompleto >= 1){
                        listadoProductos.push(boletoCompleto + ' Pases Completo');
                    }
                    if(cantidadCamisas >= 1){
                        listadoProductos.push(cantidadCamisas + ' Camisas');
                    }
                    if(cantidadEtiquetas >= 1){
                        listadoProductos.push(cantidadEtiquetas + ' Etiquetas');
                    }
                    lista_productos.style.display = 'block';
                    lista_productos.innerHTML = '';
                    for(var i = 0; i < listadoProductos.length; i++){
                        lista_productos.innerHTML += listadoProductos[i] + '<br>';
                    }

                    suma.innerHTML = '$ ' + totalPagar.toFixed(2);

                    botonRegistro.disabled = false;
                    document.getElementById('total_pedido').value = totalPagar;
            }
        }

        function mostrarDias(){
            var boletosDia = parseInt(pase_dia.value, 10) || 0,
                boletosDosDias = parseInt(pase_dosdias.value, 10) || 0,
                boletoCompleto = parseInt(pase_completo.value, 10) || 0;

                var diasElegidos = [];

                if(boletosDia > 0){
                    diasElegidos.push('viernes');
                }
                if(boletosDosDias > 0){
                    diasElegidos.push('viernes', 'sabado');
                }
                if(boletoCompleto > 0){
                    diasElegidos.push('viernes', 'sabado', 'domingo');
                }

                for(var i = 0; i < diasElegidos.length; i++){
                    document.getElementById(diasElegidos[i]).style.display = 'block';
                }
        }

        //Input Hidden

        
        


    }); //DOM Content Loaded
})();

$(function (){
    //colorbox
    $('.invitado-info').colorbox({inline:true, with: '50%'});
    $('.boton_newsletter ').colorbox({inline:true, with: '50%'});

    //agregar clase a menu

    $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');
})