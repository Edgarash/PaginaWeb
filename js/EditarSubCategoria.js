$(document).on('ready',function() {
    
    getPuestos();
    AJAXCallUpdate();
});

function AJAXCallUpdate() {
    $('#addUser').off('click');
    $('th > i.fa-edit').on('click', function(){
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
                subCategoria.eq(2).text(),
                
            ),
            buttons: {
                formSubmit: {
                    btnClass: 'btn btn-green btn-green',
                    text: 'Guardar',
                    action: function(){ ActualizarTabla(
                        'ID='+subCategoria.eq(0).text()+
                        '&Nombre='+$('#Nombre').val()+
                        'IDCat='+subCategoria.eq(0).text()+
                        '&Activo='+$('#Activo').prop('checked')+
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
        var subCategoria = $(this).parent().siblings();
        $.confirm({
            title: 'AVISO',
            content: '¿Esta seguro que desea eliminar este usuario?',
            type: 'red',
            icon: 'fa fa-exclamation-triangle',
            theme: 'modern',
            buttons: {
                Eliminar: {
                    text: 'ELIMINAR',
                    btnClass: 'btn-red',
                    action: function() {
                        ActualizarTabla(
                            'ID='+subCategoria.eq(0).text()+
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
            getPuestos();
        $.confirm({
            title: 'Agregar subCategoria',
            theme: 'supervan',
            content: Registrar(),
            columnClass: 'col-md-10 col-md-offset-1',
            icon: 'fa fa-cogs',
            buttons: {
                submit: {
                    text: 'Registrar',
                    btnClass: 'btn-green',

                    action: function() {
                        ActualizarTabla(
                        'Nombre='+$('#Nombre').val()+
                        '&IDCat='+$('#IDCat').val()+
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
            if (this.responseText.substr(0,5) != "ERROR") {
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
                alert(this.responseText);
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
    xhttp.open("POST", "php/AjaxSubCategorias.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(Sending);
}


function Actualizar(ID = '',Nombre = '' ,idEmpAlta='', idCat='') {
    return ''+
    '<form action="" class="colorlib-form" style="color:black;">'+
        '<div class="row">'+
            '<div class="form-group">'+
                //ID
                '<div class="col-md-4">'+
                    '<label>ID:'+ID+'</label>'+
                '</div>'+
                '<div class="col-md-4">'+
                    '<label>idEmpAlta:'+idEmpAlta+'</label>'+
                '</div>'+
                '<div class="col-md-4">'+
                    '<label>idCat:'+idCat+'</label>'+
                '</div>'+
                '<div class="col-md-4">'+
                    '<input class="form-check-input" type="checkbox" name="activo" id="Activo" checked="true">'+
                    '<label for="activo" class="form-check label">Activo</label>'+
                '</div>'+
                '<div class="col-md-12">'+
                    '<label>Nombre: </label>'+
                    '<input class="form-control" type="text" name="lname"'+
                    'maxlength="100" placeholder="Nombre" id="Nombre"'+
                    ' value="'+ Nombre +'" required>'+
                '</div>'+
                
            '</div>'+
            
        '</div>'+
    '</form>'
}

function Registrar() {
    getPuestos();
    var content = '<form action="" class="colorlib-form" style="color:black;">'+
        '<div class="row">'+
            '<div class="form-group">'+
                //Usuario
                '<div class="col-md-6">'+
                    '<label>NOMBRE: </label>'+
                    '<input class="form-control" type="text" name="fname"'+
                    'maxlength="100" placeholder="Nombre" id="Nombre"'+
                    ' value="" required>'+
                '</div>'+
                '<div class="col-md-6">'+
                    '<label>Puesto: </label>'+
                    '<select id="IDCat" name="IDCat" class="form-control">'+
                        window.cats+
                    '</select>'+
                '</div>'+
            '</div>'+
            '</div>'+
        '</div>'+
    '</form>'
    return content;
}
function getPuestos(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status==200) {
            window.cats = this.responseText;
        }
    }
    xhttp.open("GET", "php/ajaxSubCategorias.php?opcion", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}