/*
    Alumno: Marta Broncano Suárez
    Asignatura: Proyecto San Romilla
    Curso: 20-21
    Descripción: Archivo que contiene las funciones que se van a emplear para la gestión de los colaboradores
*/
//Función que realiza una petición para averiguar x datos en base a la fecha de nacimiento
$("#inscripcion").click(showInsert())

function inscription_date(){
    var accion='inscription_date'; //Variable que guarda la acción que queramos hacer al realizar la petición
    //Petición
    $.post('/inscription_date',function(data){
        //Método que realiza diferentes acciones según la respuesta devuelta
        switch (data.trim()) {
            case 'ok': //Plazo inscripción abierto
                //document.getElementById("inscripcion").disabled = false;
                //$('#cuadro_inscripcion1').hide();
                //$('#cuadro_inscripcion2').hide();
                break;
            case 'ko1'://Plazo inscripción no abierto
                //document.getElementById("inscripcion").disabled = true;
                //$('#cuadro_inscripcion2').hide();
                break;
            case 'ko2'://Plazo inscripción cerrado
                //document.getElementById("inscripcion").disabled = true;
                //$('#cuadro_inscripcion1').hide();
                break;

        }
    });
}

var i=0;//Inicialización de variable que usaremos para realizar la inserción dinámica
//Función que carga las tallas de las camisetas disponibles en el formulario

//Función que contiene la estructura del formulario dinámico
function form2(data){
    console.log(data)
    let tabla='<table class="table mb-5" id="table'+i+'">' +
        '<tr class="borde">'+
        '<td></td>' +
        '<td></td>' +
        '<td></td>' +
        '<td>' ;
        if(i==0){
            tabla+=' '
        }else{
            tabla+='   <button type="button" name="remove" id="'+i+'" class=" btn btn-danger btn_remove float-end col-2 btn-sm m-3"><i class="bi bi-x-lg"></i></button>'
        }
        tabla+='</td>' +
        '</tr>'+
        '<tr>' +
        '<th>Nombre</th>\n' +
        '<th>Apellidos</th>\n' +
        '<th>DNI</th>\n' +
        '<th>Fecha Nacimiento</th>\n' +
        '</tr> '+
        '<tr class="borde">' +
        '<td ><input class="inscripcion" name="nombre[]" type="text"></td>\n' +
        '<td><input class="inscripcion" name="apellidos[]" type="text"></td>\n' +
        '<td><input class="inscripcion" name="dni[]" type="text"></td>\n' +
        '<td><input id="'+i+'" class="inscripcion fecha" name="fecha_nacimiento[]" type="date"></td>\n' +
        '</tr> '+
        '<tr>' +
        '<th>Teléfono</th>' +
        '<th>Dorsal</th>\n' +
        '<th>Donación dorsal</th>\n' +
        //'<th>Categoría</th>\n' +
        '<th>Talla Camiseta</th>\n' +
        '</tr> '+
        '<tr class="borde">' +
        '<td><input class="inscripcion" name="telefono[]" type="text"></td>' +
        '<td ><input class="inscripcion" name="dorsal[]" type="text"></td>\n' +
        '<td><input id="donacion'+i+'" class="inscripcion" name="donacion[]"  type="text"></td>\n' + //value="valor precio consulta sql categoria"
        //'<td>' + '<input type="text" name="categoria[]">'+ '</td>'+
        '<td>' +
        '<select class="inscripcion pt-1" name="talla[]">\n' +
        '\n' +
        '<option value="0" >No quiere camiseta</option>\n' ;
        for(let j=0; j<data.length; j++){
            tabla+='<option value='+j+'>'+data[j][1]+'</option>\n' ;
        }
        tabla+=
        '</select>' +
        '</td>\n' +
        '</tr> ' +
        '</table>'
    i++
    $('#dynamic_field').append(tabla);
    //Función que elimina la tabla sleccionada del formulario
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");//Método que guarda el id seleccionado
        $('#table'+button_id+'').remove();//Métodopara eliminar elemento
    });
    //Función que averigua el precio del dorsal al perder el foco en la fecha
    $(document).on('blur', '.fecha', function(){
        var accion='precio_dorsal';//Variable que guarda la acción que queramos hacer al realizar la petición
        var str=$("#formulario").serialize();//Variable que guarda los datos del formulario
        var fecha_id = $(this).attr("id");//Método que guarda el id seleccionado
        //Petición
        $.post('/inscriptionForm2'+'/fecha_id='+fecha_id,str,function(data){
            var precio=data;
            $('#donacion'+fecha_id+'').attr("value",precio); //Método que añade valor al elemento selecionado
            $('#donacion'+fecha_id+'').attr("placeholder","Indique el importe (mínimo "+precio+"€)"); //Método que añade placeholder al elemento selecionado
        });
    })
}
//Función que muestra el formulario de registro de inscripciones


//Función que muestra un cuadro de mensaje con el total del precio de la compra
function totalBought(){
    var accion='total_compra';//Variable que guarda la acción que queramos hacer al realizar la petición
    var str = $("#formulario").serialize();//Variable que guarda los datos del formulario
    //Petición
    $.post('/totalBought',str,function(data){
        //Condición que realiza diferentes acciones según la respuesta devuelta
        if(data.trim()==='ko'){//Precio incorrecto
            alert("El importe de la donación no puede ser menor al precio del dorsal")
        }else{//Precio correcto
            $('#cuadroTramitar').html(data);
            $('#cuadroTramitar').css('display','block');
        }
    });
}
//Función que realiza la petición para el registro de inscripciones

//Función que muestra el formulario de edición de inscripciones
function showEdit(id){
    var accion='mostrar_editar'; //Variable que guarda la acción que queramos hacer al realizar la petición
    //Petición
    $.post('/inscription_showEdit/'+id,function(data){
        $('#editar').html(data);
        $('#editar').css('display','block');
        $('#tabla').css('display','none');
    });
}
//Función que valida la edición de inscripciones
function validateEdit(id){
    $("#submitenviar").validate({
        rules: {
            nombre : {
                required: true,
                minlength: 3,
                lettersonly: true
            },
            apellidos : {
                required: true,
                minlength: 3,
                lettersonly: true
            },
            telefono:{
                required: true,
                maxlength: 9,
                isMobile: true
            },
            fecha_nacimiento:{
                required: true,
            },
            dorsal:{
                required: true,
                dorsal: true
            },
            dni:{
                required: true,
                dni: true
            },

        },
        messages : {
            nombre: {
                required:"*Campo obligatorio",
                minlength: "El nombre debe tener al menos 3 caracteres",
                lettersonly:"*Sólo puede contener letras"
            },
            apellidos: {
                required:"*Campo obligatorio",
                minlength: "El nombre debe tener al menos 3 caracteres",
                lettersonly:"*Sólo puede contener letras"
            },
            telefono: {
                required: "*Campo obligatorio",
                maxlength: "¡El número de teléfono móvil no puede superar los 9 dígitos!",
                isMobile: "El formato del teléfono debe contener 9 dígitos, el primero debe comenzar por 6 ó 7"
            },
            dni:{
                required: "*Campo obligatorio",
                dni: "*Introduzca un formato correcto para el dni"
            },
            fecha_nacimiento:{
                required: "*Campo obligatorio",
            },
            dorsal:{
                required: "*Campo obligatorio",
                dorsal: "*Sólo números"
            }
        //Función que realiza una acción si la validación es correcta
        },submitHandler: function() {
            edit(id);
        }
    });
    //Validaciones personalizadas que no entran dentro de la librería
    jQuery.validator
        .addMethod(
            "isMobile",
            function(value, element) {
                var length = value.length;
                var mobile = /^[6-7][0-9]{8}$/;
                return this.optional(element) || (length == 9 && mobile
                    .test(value));
            }, "El formato del teléfono debe contener 9 dígitos, el primero debe comenzar por 6 ó 7");

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        var lettersonly = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
        return this.optional(element) || lettersonly.test(value);
    }, "*Sólo letras");

    jQuery.validator.addMethod("dni", function(value, element) {
        var dni =  /((([X-Z])|([LM])){1}([-]?)((\d){7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]))/;
        return this.optional(element) || dni.test(value);
    }, "*Introduzca un formato correcto para el dni");

    jQuery.validator.addMethod("dorsal", function(value, element) {
        var dorsal = /^([0-9])*$/;
        return this.optional(element) || dorsal.test(value);
    }, "*Sólo números");
}
//Función que realiza la petición para la edición de inscripciones
function edit(id){
    var accion='editar'; //Variable que guarda la acción que queramos hacer al realizar la petición
    var str = $("#submitenviar").serialize(); //Variable que guarda los datos del formulario
    //Petición
    $.post('/inscription_edit/'+id,str,function(data){
        //Condición que realiza diferentes acciones según la respuesta devuelta
        if(data.trim()==='ko'){ //Error consulta
            alert("Ha habido un error al realizar la petición solicitada intentelo de nuevo");
        }else{//Consulta correcta
            $('#editar').css('display','none');
            location.reload();
        }
    });
}

