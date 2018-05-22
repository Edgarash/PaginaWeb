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
                        if (!error) {
                            ActualizarTabla(
                                '&Usuario=' + $('#Usuario').val() +
                                '&Puesto=' + $('#Puesto').val() +
                                '&Contraseña=' + $('#Password').val() +
                                '&Nombre=' + $('#Nombre').val() +
                                '&Apellidos=' + $('#Apellidos').val() +
                                '&Telefono=' + $('#Telefono').val() +
                                '&Email=' + $('#Email').val() +
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
    xhttp.open("POST", "php/AJAXusuario.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(Sending);
}


function Actualizar(ID = '', Usuario = '', Puesto = '', Nombre = '', Apellidos = '', Telefono = '', Email = '') {
    Puestos = getPuestos();
    opciones = "";
    Puestos.forEach(function (cadena, indice, array) {
        opciones += '<option value="' + cadena + '" ' + (cadena == Puesto ? 'selected' : '') + '>' + cadena + '</option>';
    });
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
    Puestos = getPuestos();
    opciones = "";
    Puestos.forEach(function (cadena, indice, array) {
        opciones += '<option value="' + cadena + '" ' + (cadena == 'Empleado' ? 'selected' : '') + '>' + cadena + '</option>';
    });
    return '<form id="formuser" action="" class="colorlib-form" style="color:black;">' +
        '<div class="row">' +
        '<div class="form-group">' +
        //Usuario
        '<div class="col-md-6">' +
        '<label>USUARIO:</label>' +
        '<input type="text" class="form-control" name="Usuario" id="Usuario" placeholder="Usuario" required>' +
        '</div>' +
        //Password
        '<div class="col-md-6">' +
        '<label>Contraseña:</label>' +
        '<input class="form-control" type="password" name="Password"' +
        'minlength="8" maxlength="16" placeholder="Contraseña" id="Password"' +
        ' value="" required>' +
        '</div>' +
        '<div class="form-group">' +
        '</div>' +
        '</div>' +
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
        //Email
        '<div class="col-md-6">' +
        '<label>Email:</label>' +
        '<input class="form-control" type="email" name="email"' +
        'maxlength="100" placeholder="Email" id="Email"' +
        ' value="" required>' +
        '</div>' +
        //Puesto
        '<div class="col-md-6">' +
        '<label>Puesto: </label>' +
        '<select id="Puesto" name="Puesto" class="form-control" value="' + /*Puesto +*/ '">' +
        opciones +
        '</select>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</form>'
}

function getPuestos() {
    return new Array('Administrador', 'CDC', 'Empleado', 'Finanzas');
}

String.prototype.isEmpty = function () {
    var x = !this;
    x = x || this.length === 0;
    x = x || /^\s*$/.test(this);
    return x;
    //return (!this || this.length === 0 || /^\s*$/.test(this));
    //return (!str || str.length === 0 || /^\s*$/.test(str));
}