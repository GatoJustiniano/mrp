$(function () {
   $('#id_estado').on('change', onSelectEstadoChange);
   $('#id_provincia').on('change', onSelectProvinciaChange);
});

function onSelectEstadoChange() {
    var estado_id = $(this).val();

    if (!estado_id) {
        $('#id_provincia').html('<option value="">Seleccione provincia</option>');
        return;
    }
    
    //Petición AJAX
    $.get('/api/estado/'+estado_id+'/provincias', function (data) {
        var html_select = '<option value="">Seleccione provincia</option>'; 
        for (let i = 0; i < data.length; i++) {
            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
        }
        $('#id_provincia').html(html_select); 
    });

}

function onSelectProvinciaChange() {
    var provincia_id = $(this).val();

    if (!provincia_id) {
        $('#id_municipio').html('<option value="">Seleccione municipio</option>');
        return;
    }
    
    //Petición AJAX
    $.get('/api/provincia/'+provincia_id+'/municipios', function (data) {
        var html_select = '<option value="">Seleccione municipio</option>'; 
        for (let i = 0; i < data.length; i++) {
            html_select += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
        }
        $('#id_municipio').html(html_select); 
    });

}