$(document).on('ready',function() {
    AJAXCallUpdate();
});

function AJAXCallUpdate() {
    $('#addUser').off('click');
    $('th > i.fa-edit').on('click', function(){
        var Usuario = $(this).parent().siblings();
        $.confirm({
            title: 'Editar Usuario',
            icon: 'fa fa-edit',
            theme: 'supervan',
            columnClass: 'col-md-10 col-md-offset-1',
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
                    btnClass: 'btn btn-green btn-green',
                    text: 'Guardar',
                    action: function(){ ActualizarTabla(
                        'ID='+Usuario.eq(0).text()+
                        '&Usuario='+Usuario.eq(1).text()+
                        '&Puesto='+$('#Puesto').val()+
                        '&Contraseña='+$('#Password').val()+
                        '&Nombre='+$('#Nombre').val()+
                        '&Apellidos='+$('#Apellidos').val()+
                        '&Telefono='+$('#Telefono').val()+
                        '&Email='+$('#Email').val()+
                        '&Activo='+$('#Activo').prop('checked')+
                        '&Modificar=true')}
                },
                cancel: {
                    text: 'Cancelar',
                    btnClass: 'btn-red'
                }
            }
        });
    });
    $('th > i.fa-trash').on('click', function(){
        var Usuario = $(this).parent().siblings();
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
                    action: function() {
                        ActualizarTabla(
                            'ID='+Usuario.eq(0).text()+
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
    
    $('#addUser').on('click', function() {
        $.confirm({
            title: 'Agregar Usuario',
            theme: 'supervan',
            content: Registrar(),
            columnClass: 'col-md-10 col-md-offset-1',
            icon: 'fa fa-user-plus',
            buttons: {
                submit: {
                    text: 'Registrar',
                    btnClass: 'btn-green',
                    action: function() {
                        ActualizarTabla(
                        '&Usuario='+$('#Usuario').val()+
                        '&Puesto='+$('#Puesto').val()+
                        '&Contraseña='+$('#Password').val()+
                        '&Nombre='+$('#Nombre').val()+
                        '&Apellidos='+$('#Apellidos').val()+
                        '&Telefono='+$('#Telefono').val()+
                        '&Email='+$('#Email').val()+
                        '&Registrar=true'
                        );
                    }
                },
                cancel: {
                    text: 'Cancelar',
                    btnClass: 'btn-red'
                }
            }
        });
    });
    
}

function ActualizarTabla(Sending) {
    console.log(Sending);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status==200) {
            if (this.responseText != "ERROR") {
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
    xhttp.open("POST", "php/AJAX.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(Sending);
}


function Actualizar(ID = '', Usuario = '' , Puesto = '', Nombre = '', Apellidos = '', Telefono = '', Email = '') {
    Puestos = getPuestos();
    opciones = "";
    Puestos.forEach(function(cadena, indice, array){
        opciones+='<option value="'+cadena+'" '+ (cadena == Puesto ? 'selected' : '') + '>'+cadena+'</option>';
    });
    return ''+
    '<form action="" class="colorlib-form" style="color:black;">'+
        '<div class="row">'+
            '<div class="form-group">'+
                //ID
                '<div class="col-md-1">'+
                    '<label>ID: '+ ID +'</label>'+
                '</div>'+
                //Usuario
                '<div class="col-md-8">'+
                    '<label>USUARIO: '+ Usuario +'</label>'+
                '</div>'+
                //Activo
                '<div class="col-md-3">'+
                    '<input class="form-check-input" type="checkbox" name="activo" id="Activo" checked="true">'+
                    '<label for="activo" class="form-check label">Activo</label>'+
                '</div>'+
            '</div>'+
            '<div class="form-group">'+
                //Puesto
                '<div class="col-md-6">'+
                    '<label>Puesto: </label>'+
                    '<select id="Puesto" name="Puesto" class="form-control" value="'+ /*Puesto +*/'">'+
                        opciones+
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="form-group">'+
                //Nombre
                '<div class="col-md-4">'+
                    '<label>NOMBRE: </label>'+
                    '<input class="form-control" type="text" name="fname"'+
                    'maxlength="100" placeholder="Nombre" id="Nombre"'+
                    ' value="'+ Nombre +'" required>'+
                '</div>'+
                //Apellidos
                '<div class="col-md-4">'+
                    '<label>Apellidos: </label>'+
                    '<input class="form-control" type="text" name="lname"'+
                    'maxlength="100" placeholder="Apellidos" id="Apellidos"'+
                    ' value="'+ Apellidos +'" required>'+
                '</div>'+
                //Telefono
                '<div class="col-md-4">'+
                    '<label>Teléfono: </label>'+
                    '<input class="form-control" type="tel" name="tel"'+
                    'maxlength="10" placeholder="Teléfono" id="Telefono"'+
                    ' value="'+ Telefono +'" required>'+
                '</div>'+
            '</div>'+
            '<div class="form-group">'+
                '<div class="col-md-6">'+
                    '<label>Email:</label>'+
                    '<input class="form-control" type="email" name="email"'+
                    'maxlength="100" placeholder="Email" id="Email"'+
                    ' value="' + Email+'" required>'+
                '</div>'+
                '<div class="col-md-6">'+
                    '<label>Contraseña:</label>'+
                    '<input class="form-control" type="password" name="Password"'+
                    'maxlength="16" placeholder="Contraseña" id="Password"'+
                    ' value="" required>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</form>'
}

function Registrar() {
    Puestos = getPuestos();
    opciones = "";
    Puestos.forEach(function(cadena, indice, array){
        opciones+='<option value="'+cadena+'" '+ (cadena == 'Empleado' ? 'selected' : '') + '>'+cadena+'</option>';
    });
    return '<form action="" class="colorlib-form" style="color:black;">'+
        '<div class="row">'+
            '<div class="form-group">'+
                //Usuario
                '<div class="col-md-6">'+
                    '<label>USUARIO:</label>'+
                    '<input type="text" class="form-control" name="Usuario" id="Usuario" placeholder="Usuario" required>'+
                '</div>'+
                //Password
                '<div class="col-md-6">'+
                    '<label>Contraseña:</label>'+
                    '<input class="form-control" type="password" name="Password"'+
                    'maxlength="16" placeholder="Contraseña" id="Password"'+
                    ' value="" required>'+
                    '</div>'+
                '<div class="form-group">'+
            '</div>'+
            '</div>'+
            '<div class="form-group">'+
                //Nombre
                '<div class="col-md-4">'+
                    '<label>NOMBRE: </label>'+
                    '<input class="form-control" type="text" name="fname"'+
                    'maxlength="100" placeholder="Nombre" id="Nombre"'+
                    ' value="" required>'+
                '</div>'+
                //Apellidos
                '<div class="col-md-4">'+
                    '<label>Apellidos: </label>'+
                    '<input class="form-control" type="text" name="lname"'+
                    'maxlength="100" placeholder="Apellidos" id="Apellidos"'+
                    ' value="" required>'+
                '</div>'+
                //Telefono
                '<div class="col-md-4">'+
                    '<label>Teléfono: </label>'+
                    '<input class="form-control" type="tel" name="tel"'+
                    'maxlength="10" placeholder="Teléfono" id="Telefono"'+
                    ' value="" required>'+
                '</div>'+
            '</div>'+
            '<div class="form-group">'+
                //Email
                '<div class="col-md-6">'+
                    '<label>Email:</label>'+
                    '<input class="form-control" type="email" name="email"'+
                    'maxlength="100" placeholder="Email" id="Email"'+
                    ' value="" required>'+
                '</div>'+
                //Puesto
                '<div class="col-md-6">'+
                    '<label>Puesto: </label>'+
                    '<select id="Puesto" name="Puesto" class="form-control" value="'+ /*Puesto +*/'">'+
                        opciones+
                    '</select>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</form>'
}

function getPuestos() {
    return new Array('Administrador', 'CDC', 'Empleado', 'Finanzas');
}