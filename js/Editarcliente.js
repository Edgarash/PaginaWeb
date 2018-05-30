//Agregar Eventos
$(document).on('ready', function () {
    AJAXCallUpdate();
});

//Agregar Eventos a Botones
function AJAXCallUpdate() {
    //Agregar evento addUser
    $('#addUser').off('click');
    //Agregar evento a Editar
    $('th > i.fa-edit').on('click', function () {
        var Usuario = $(this).parent().siblings();
        //Editar Usuario
        $.confirm({
            title: 'Editar Usuario',
            icon: 'fa fa-edit',
            theme: 'supervan',
            columnClass: 'col-xs-10 col-xs-offset-1',
            content: Actualizar(
                Usuario.eq(0).text(),
                Usuario.eq(1).text(),
                Usuario.eq(2).text(),
                Usuario.eq(3).text(),
                Usuario.eq(4).text(),
                Usuario.eq(5).text(),
                Usuario.eq(6).text(),
            ),
            buttons: {
                formSubmit: {
                    btnClass: 'btn btn-green col-xs-5 pull-left',
                    text: 'Guardar',
                    action: function () {
                        var error = false;
                        var Mensaje = "Favor de verificar los siguientes campos<br><br>";
                        if ($('#Puesto').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Puesto vacío<br>";
                        }
                        if (!($('#Password').val().isEmpty())) {
                            var num = $('#Password').val().length;
                            if (!(num >= 8 && num <= 16)) {
                                error = true;
                                Mensaje += "* Contraseña debe tener entre 8 y 16 caracteres";
                            }
                        }
                        if ($('#Nombre').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Nombre vacío<br>";
                        }
                        if ($('#Apellidos').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Apellidos vacío<br>";
                        }
                        if ($('#Telefono').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Teléfono vacío<br>";
                        }
                        if ($('#Email').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Email vacío<br>";
                        }
                        if (!error) {
                            ActualizarTabla(
                                'ID=' + Usuario.eq(0).text() +
                                '&Usuario=' + Usuario.eq(1).text() +
                                '&Puesto=' + $('#Puesto').val() +
                                '&Contraseña=' + $('#Password').val() +
                                '&Nombre=' + $('#Nombre').val() +
                                '&Apellidos=' + $('#Apellidos').val() +
                                '&Telefono=' + $('#Telefono').val() +
                                '&Email=' + $('#Email').val() +
                                '&Activo=' + $('#Activo').prop('checked') +
                                '&Modificar=true');
                        } else {
                            $.confirm({
                                title: 'ERROR',
                                content: Mensaje,
                                icon: 'fa fa-cancel',
                                theme: 'supervan',
                                buttons: {
                                    OK: {
                                        text: 'OK',
                                        btnClass: 'btn-green'
                                    }
                                }
                            });
                            return false;
                        }
                    }
                },
                cancel: {
                    text: 'Cancelar',
                    btnClass: 'btn-red col-xs-5 pull-right'
                }
            }
        });
    });
    //Agregar evento a Eliminar
    $('th > i.fa-trash').on('click', function () {
        var Usuario = $(this).parent().siblings();
        //Eliminar Usuario
        $.confirm({
            title: 'AVISO',
            content: '¿Esta seguro que desea eliminar este usuario?',
            type: 'red',
            icon: 'fa fa-user-times',
            theme: 'modern',
            buttons: {
                Eliminar: {
                    text: 'ELIMINAR',
                    btnClass: 'btn-red',
                    action: function () {
                        ActualizarTabla(
                            'ID=' + Usuario.eq(0).text() +
                            '&Eliminar=true'
                        )
                    }
                },
                cancel: {
                    text: 'Cancelar'
                }
            }
        });
    });

    //Agregar evento a Agregar
    $('#addUser').on('click', function () {
        $.confirm({
            title: 'Agregar Usuario',
            theme: 'supervan',
            content: Registrar(),
            columnClass: 'col-xs-10 col-xs-offset-1',
            icon: 'fa fa-user-plus',
            buttons: {
                submit: {
                    text: 'Registrar',
                    btnClass: 'btn-green pull-left col-xs-5',
                    action: function () {
                        var error = false;
                        /*
                        
                        var Mensaje = "Favor de verificar los siguientes campos<br><br>";
                        if ($('#Usuario').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Usuario vacío<br>";
                        }
                        if ($('#Puesto').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Puesto vacío<br>";
                        }
                        if ($('#Password').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Contraseña vacío<br>";
                        } else {
                            var num = $('#Password').val().length;
                            if (!(num >= 8 && num <= 16)) {
                                error = true;
                                Mensaje += "* Contraseña debe tener entre 8 y 16 caracteres"
                            }
                        }
                        if ($('#Nombre').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Nombre vacío<br>";
                        }
                        if ($('#Apellidos').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Apellidos vacío<br>";
                        }
                        if ($('#Telefono').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Teléfono vacío<br>";
                        }
                        if ($('#Email').val().isEmpty()) {
                            error = true;
                            Mensaje += "* Email vacío<br>";
                        }
                        */
                        if (!error) {
                            ActualizarTabla(
                                'Nombre=' + $('#Nombre').val() +
                                '&Apellidos=' + $('#Apellidos').val() +
                                '&Telefono=' + $('#Telefono').val() +
                                '&NumExterior=' + $('#NumExterior').val() +
                                '&NumInterior=' + $('#NumInterior').val() +
                                '&Calle=' + $('#Calle').val() +
                                '&EntreCalles=' + $('#EntreCalles').val() +
                                '&Referencia=' + $('#Referencia').val() +
                                '&CP=' + $('#CP').val() +
                                '&Estado=' + $('#Estado').val() +
                                '&Municipio=' + $('#Municipio').val() +
                                '&Colonia=' + $('#Colonia').val() +
                                '&Email=' + $('#Email').val() +
                                '&Contrasena=' + $('#Contrasena').val() +
                                '&Registrar=true'
                            );
                        } else {
                            $.confirm({
                                title: 'ERROR',
                                content: Mensaje,
                                icon: 'fa fa-cancel',
                                theme: 'supervan',
                                buttons: {
                                    OK: {
                                        text: 'OK',
                                        btnClass: 'btn-green'
                                    }
                                }
                            });
                            return false;
                        }
                    }
                },
                cancel: {
                    text: 'Cancelar',
                    btnClass: 'btn-red col-xs-5 pull-right'
                }
            }
        });
    });
}

function ActualizarTabla(Sending) {
    console.log(Sending);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText.substr(0, 5) != "ERROR") {
                $('#Tabla').html(this.responseText);
                AJAXCallUpdate();
                $.alert({
                    title: 'Hurra!!!',
                    icon: 'fa fa-check',
                    theme: 'modern',
                    type: 'green',
                    escapeKey: true,
                    content: 'Base de datos actualizada con éxito'
                });
            } else {
                $.alert({
                    title: 'ERROR :(',
                    icon: 'fa fa-window-close',
                    theme: 'modern',
                    type: 'red',
                    content: 'Hubo algún error, por favor intente más tarde.'
                });
            }
        }
    }
    xhttp.open("POST", "php/AJAXcliente.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(Sending);
}


function Actualizar(ID = '', Usuario = '', Puesto = '', Nombre = '', Apellidos = '', Telefono = '', Email = '') {
    return '' +
        '<form action="" class="colorlib-form" style="color:black;">' +
        '<div class="row">' +
        '<div class="form-group">' +
        //ID
        '<div class="col-md-1">' +
        '<label>ID: ' + ID + '</label>' +
        '</div>' +
        //Usuario
        '<div class="col-md-8">' +
        '<label>USUARIO: ' + Usuario + '</label>' +
        '</div>' +
        //Activo
        '<div class="col-md-3">' +
        '<input class="form-check-input" type="checkbox" name="activo" id="Activo" checked="true">' +
        '<label for="activo" class="form-check label">Activo</label>' +
        '</div>' +
        '</div>' +
        '<div class="form-group">' +
        //Puesto
        '<div class="col-md-6">' +
        '<label>Puesto: </label>' +
        '<select id="Puesto" name="Puesto" class="form-control" value="' + /*Puesto +*/ '">' +
        opciones +
        '</select>' +
        '</div>' +
        '</div>' +
        '<div class="form-group">' +
        //Nombre
        '<div class="col-md-4">' +
        '<label>NOMBRE: </label>' +
        '<input class="form-control" type="text" name="fname"' +
        'maxlength="100" placeholder="Nombre" id="Nombre"' +
        ' value="' + Nombre + '" required>' +
        '</div>' +
        //Apellidos
        '<div class="col-md-4">' +
        '<label>Apellidos: </label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="Apellidos" id="Apellidos"' +
        ' value="' + Apellidos + '" required>' +
        '</div>' +
        //Telefono
        '<div class="col-md-4">' +
        '<label>Teléfono: </label>' +
        '<input class="form-control" type="tel" name="tel"' +
        'maxlength="10" placeholder="Teléfono" id="Telefono"' +
        ' value="' + Telefono + '" required>' +
        '</div>' +
        '</div>' +
        '<div class="form-group">' +
        '<div class="col-md-6">' +
        '<label>Email:</label>' +
        '<input class="form-control" type="email" name="email"' +
        'maxlength="100" placeholder="Email" id="Email"' +
        ' value="' + Email + '" required>' +
        '</div>' +
        '<div class="col-md-6">' +
        '<label>Contraseña:</label>' +
        '<input class="form-control" type="password" name="Password"' +
        'maxlength="16" placeholder="Contraseña" id="Password"' +
        ' value="" required>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</form>'
}

function Registrar() {
    return '<form id="formuser" action="" class="colorlib-form" style="color:black;">' +
        '<div class="row">' +
        //Usuario
        '<div class="form-group">' +
        //Nombre
        '<div class="col-md-4">' +
        '<label>NOMBRE: </label>' +
        '<input class="form-control" type="text" name="fname"' +
        'maxlength="100" placeholder="Nombre" id="Nombre"' +
        ' value="" required>' +
        '</div>' +
        //Apellidos
        '<div class="col-md-4">' +
        '<label>Apellidos: </label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="Apellidos" id="Apellidos"' +
        ' value="" required>' +
        '</div>' +
        //Telefono
        '<div class="col-md-4">' +
        '<label>Teléfono: </label>' +
        '<input class="form-control" type="tel" name="tel"' +
        'maxlength="10" placeholder="Teléfono" id="Telefono"' +
        ' value="" required>' +
        '</div>' +
        '</div>' +
        '<div class="form-group">' +

        //NumExterior
        '<div class="col-md-4">' +
        '<label>Numero Exterior: </label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="NumExterior" id="NumExterior"' +
        ' value="" required>' +
        '</div>' +
        //NumInterior
        '<div class="col-md-4">' +
        '<label>Numero Interior: </label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="NumInterior" id="NumInterior"' +
        ' value="" required>' +
        '</div>' +
        //calle
        '<div class="col-md-4">' +
        '<label>Calle</label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="Calle" id="Calle"' +
        ' value="" required>' +
        '</div>' +
        '</div>' +
        '<div class="form-group">' +
        //EntreCalles
        '<div class="col-md-4">' +
        '<label>Entre Calles</label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="EntreCalles" id="EntreCalles"' +
        ' value="" required>' +
        '</div>' +
        //Referencia
        '<div class="col-md-4">' +
        '<label>Referencia</label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="Referencia" id="Referencia"' +
        ' value="" required>' +
        '</div>' +
        //CP
        '<div class="col-md-4">' +
        '<label>CP</label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="CP" id="CP"' +
        ' value="" required>' +
        '</div>' +
        '</div>' +
        '<div class="form-group">' +
        //Estado
        '<div class="col-md-4">' +
        '<label>Estado</label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="Estado" id="Estado"' +
        ' value="" required>' +
        '</div>' +
        //Municipio
        '<div class="col-md-4">' +
        '<label>Municipio</label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="Municipio" id="Municipio"' +
        ' value="" required>' +
        '</div>' +
        //Colonia
        '<div class="col-md-4">' +
        '<label>Colonia</label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="Colonia" id="Colonia"' +
        ' value="" required>' +
        
        '</div>' +
        '</div>' +
        '<div class="form-group">' +
        //Email
        '<div class="col-md-12">' +
        '<label>Email:</label>' +
        '<input class="form-control" type="email" name="email"' +
        'maxlength="100" placeholder="Email" id="Email"' +
        ' value="" required>' +
        '</div>' +
        '<div class="col-md-12">' +
        '<label>Contraseña:</label>' +
        '<input class="form-control" type="Contrasena" name="Contrasena"' +
        'maxlength="100" placeholder="Contrasena" id="Contrasena"' +
        ' value="" required>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</form>'
}

