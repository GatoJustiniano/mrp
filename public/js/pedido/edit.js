$(function () {
   $('#id_cliente').on('change', onSelectCliente);
   $('#id_empleado').on('change', onSelectEmpleado);
});

function onSelectCliente() {
    var cliente_id = $(this).val();

    if (!cliente_id) {
        $('#cliente_codigo').html('<option value=""></option>');
        $('#cliente_identificacion').html('<option value=""></option>');
        return;
    }
    
    //Petición AJAX para colocar codigo
    $.get('/api/pedido/'+cliente_id+'/cliente', function (data) {
        var html_select = '<option value="">Código</option>'; 
        for (let i = 0; i < data.length; i++) {
            html_select += '<option selected value="'+data[i].id+'">'+data[i].codigo+'</option>';
        }
        $('#cliente_codigo').html(html_select); 
    });
    //Petición AJAX para colocar identificación
    $.get('/api/pedido/'+cliente_id+'/cliente', function (data) {
        var html_select = '<option  value="">Identificación</option>'; 
        for (let i = 0; i < data.length; i++) {
            html_select += '<option selected value="'+data[i].id+'">'+data[i].identificacion+'</option>';
        }
        $('#cliente_identificacion').html(html_select); 
    });

}

function onSelectEmpleado() {
    var empleado_id = $(this).val();

    if (!empleado_id) {
        $('#empleado_codigo').html('<option value=""></option>');
        return;
    }
    
    //Petición AJAX
    $.get('/api/pedido/'+empleado_id+'/empleado', function (data) {
        var html_select = '<option value="">Código</option>'; 
        for (let i = 0; i < data.length; i++) {
            html_select += '<option selected value="'+data[i].id+'">'+data[i].codigo+'</option>';
        }
        $('#empleado_codigo').html(html_select); 
    });

}