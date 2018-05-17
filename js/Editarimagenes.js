$(document).on('ready',function() {
    AJAXCallUpdate();
});

function AJAXCallUpdate() {
    $('h4 > i.fa-edit').on('click', function(){
        var Imagen = $(this).parent().parent();
        $.confirm({
            title: 'Editar Imagen',
            icon: 'fa fa-edit',
            theme: 'supervan',
            columnClass: 'col-md-10 col-md-offset-1',
            content: Actualizar(),
            buttons: {
                formSubmit: {
                    btnClass: 'btn btn-green btn-green',
                    text: 'Guardar',
                    action: function(
                    ){ ActualizarTabla(
                        Imagen.attr('idd'),
                        Imagen.attr('URL')
                    )}
                },
                cancel: {
                    text: 'Cancelar',
                    btnClass: 'btn-red'
                }
            }
        });
    });
}

function ActualizarTabla(ID, Nombre) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status==200) {
            if (this.responseText.substr(0,5) != "ERROR") {
                $('#Tabla').html(this.responseText);
                var Respuesta = this.responseText;
                AJAXCallUpdate();
                $.alert({
                    title: 'Hurra!!!',
                    icon: 'fa fa-check',
                    theme: 'modern',
                    type: 'green',
                    escapeKey: true,
                    content: //'Base de datos actualizada con éxito'
                        Respuesta
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
    var formdata = new FormData();
    formdata.append('Modificar', true);
    formdata.append('Nombre', Nombre);
    formdata.append('files', window.archivo, window.archivo.name);
    formdata.append('ID', ID);
    for (var pair of formdata.entries()) {
        console.log(pair[0]+', '+pair[1]);
    }
    xhttp.open("POST", "php/AJAXimagenes.php", true);
    //xhttp.setRequestHeader("Content-type", "multipart/form-data");
    if (window.archivo) {
        xhttp.send(formdata);
    }
}


function Actualizar() {
    return ''+
    '<form action="" class="colorlib-form" style="color:black;">'+
        '<div class="row">'+
            '<div class="form-group">'+
                '<input name="files" id="files" type="file" onchange="readURL(this);" required style="margin: 0 auto;">'+
                '<div id="img" style="overflow:auto;border: 1px dashed black;width:80%;'+
                'min-height:100px;margin: 10px auto;" ondrop="drop(event)" ondragover="allowDrop(event)">'+
                    '<img id="uploaded" src="nothig.jpg" alt="Arrastre aqui para subir archivos" style="max-width:100%;padding:10px;">'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</form>'
}

function readURL(input) {
    if (input.files && input.files[0]) {
        setImagen(input.files[0]);
    }
}

function setImagen(File) {
    var reader = new FileReader();
    reader.onload = function(e) {
        window.archivo = File;
        $('#uploaded').attr('src', e.target.result);
        document.getElementById('img').height = document.getElementById('uploaded').clientHeight+'px';
    };
    reader.readAsDataURL(File);
}

function drag(ev){
    ev.dataTransfer.setData("text", ev.target.id);
}

function allowDrop(ev) {
    ev.preventDefault();
}

function drop(ev) {
    ev.preventDefault();
    if (ev.dataTransfer.files[0])
        setImagen(ev.dataTransfer.files[0]);
}