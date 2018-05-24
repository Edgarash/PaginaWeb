$(document).on('ready', function () {
    AJAXCallUpdate();
});

function AJAXCallUpdate() {
    $('#addUser').off('click');
    $('th > i.fa-edit').on('click', function () {
        var subCategoria = $(this).parent().siblings();
        $.confirm({
            title: 'Editar subCategoria',
            icon: 'fa fa-cog',
            theme: 'supervan',
            columnClass: 'col-md-10 col-md-offset-1',
            content: Actualizar(
                subCategoria.eq(0).text(),
                subCategoria.eq(1).text(),
                subCategoria.eq(3).text(),
                subCategoria.eq(4).text(),
                subCategoria.eq(2).text()
            ),
            buttons: {
                formSubmit: {
                    btnClass: 'btn btn-green btn-green col-xs-5 pull-left',
                    text: 'Guardar',
                    action: function () {
                        ActualizarTabla(
                            'ID=' + subCategoria.eq(0).text() +
                            '&Nombre=' + $('#Nombre').val() +
                            '&IDCat=' + $('#Categoria').val() +
                            '&Activo=' + $('#Activo').prop('checked') +
                            '&Modificar=true')
                    }
                },
                cancel: {
                    text: 'Cancelar',
                    btnClass: 'btn-red col-xs-5 pull-right'
                }
            },
            onContentReady: function () {
                $.ajax({
                    data: '',
                    url: 'php/AJAXCategorias.php?getCategorias=',
                    type: 'GET',
                    processData: false,
                    contentType: false,
                    success: function (data, status) {
                        $('#Categoria').html(data);
                        var temp = $('#idCat').text();
                        $('#Categoria').val(temp);
                    },
                    error: function (xhr, desc, err) {
                        MensajeError("Hubo un error, vuelva a intentar más tarde");
                    }
                });
            }
        });
    });
    $('th > i.fa-trash').on('click', function () {
        var subCategoria = $(this).parent().siblings();
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
                            'ID=' + subCategoria.eq(0).text() +
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

    $('#addUser').on('click', function () {
        $.confirm({
            title: 'Agregar subCategoria',
            theme: 'supervan',
            content: Registrar(),
            columnClass: 'col-md-10 col-md-offset-1',
            icon: 'fa fa-user-plus',
            buttons: {
                submit: {
                    text: 'Registrar',
                    btnClass: 'btn-green',

                    action: function () {
                        var formData = new FormData(document.getElementById('formreg'));
                        formData.append('Registrar', 'Registrar');
                        var x = $('#formreg').serialize()+'&Registrar=1';
                        ActualizarTabla(
                            'Nombre='+$('#Nombre').val()+
                            '&IDCat='+$('#IDCat').val()+
                            '&Registrar='
                        );
                    }
                },
                cancel: {
                    text: 'Cancelar',
                    btnClass: 'btn-red'
                }
            },
            onContentReady: function() {
                $.ajax({
                    data: '',
                    url: 'php/AJAXCategorias.php?getCategorias=',
                    type: 'GET',
                    processData: false,
                    contentType: false,
                    success: function (data, status) {
                        $('#IDCat').html(data);
                    },
                    error: function (xhr, desc, err) {
                        MensajeError("Hubo un error, vuelva a intentar más tarde");
                    }
                });
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
                    //content: 'Hubo algún error, por favor intente más tarde.'
                    content: this.responseText
                });
            }
        }
    }
    xhttp.open("POST", "php/AjaxSubCategorias.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(Sending);
}


function Actualizar(ID = '', Nombre = '', idEmpAlta = '', idCat = '', NombreCat = '') {
    return '' +
        '<form action="" class="colorlib-form" style="color:black;">' +
        '<div id="idCat" style="display:none">'+idCat+'</div>'+
        '<div class="row">' +
        '<div class="form-group">' +
        //ID
        '<div class="col-md-3">' +
        '<label>ID:' + ID + '</label>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<label>Empleado de Alta: ' + idEmpAlta + '</label>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<label>Categoria: ' + NombreCat + '</label>' +
        '<label id="cate" style="display:none">' + idCat + '</label>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<input class="form-check-input" type="checkbox" name="activo" id="Activo" checked="true">' +
        '<label for="activo" class="form-check label">Activo</label>' +
        '</div>' +
        '<div class="form-group">'+
        '<div class="col-md-6">' +
        '<label>Nombre: </label>' +
        '<input class="form-control" type="text" name="lname"' +
        'maxlength="100" placeholder="Nombre" id="Nombre"' +
        ' value="' + Nombre + '" required>' +
        '</div>' +
        '<div class="col-md-6">' +
        '<label>Categoria: </label>' +
        '<select class="form-control" name="lname"' +
        'placeholder="Nombre" id="Categoria"' +
        '</select>'+
        '</div>' +
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
    return '<form id="formreg" action="" class="colorlib-form" style="color:black;">' +
        '<div class="row">' +
        '<div class="form-group">' +
        //Usuario
        '<div class="col-md-6">' +
        '<label>NOMBRE: </label>' +
        '<input class="form-control" type="text" name="Nombre"' +
        'maxlength="100" placeholder="Nombre" id="Nombre"' +
        ' value="" required>' +
        '</div>' +
        '<div class="col-md-6">' +
        '<label>Puesto: </label>' +
        '<select id="IDCat" name="IDCat" class="form-control" value="' + '">' +
        opciones +
        '</select>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</form>'
}

function getPuestos() {
    return new Array(1, 2, 3);
}

function MensajeError(Mensaje, Titulo = "ERROR") {
    $.alert({
        title: Titulo,
        content: Mensaje,
        theme: 'modern',
        icon: 'fa fa-close'
    });
}