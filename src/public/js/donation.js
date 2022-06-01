/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/donation.js ***!
  \**********************************/
/*
    Alumno: Marta Broncano Suárez
    Asignatura: Proyecto San Romilla
    Curso: 20-21
    Descripción: Archivo que contiene las funciones que se van a emplear para la gestión de donaciones
*/
//Función que al cargar el documento hace una petición para consultar los registros de la baase de datos y mostrarlos
$("#cancel").click(cancel);
$("#inscriptionDonation").submit(function (event) {
  //event.preventDefault();
  store();
});
$(document).ready(function () {
  //Variable que guarda la acción que queramos hacer al realizar la petición
  var accion = 'consultar'; //Variable que recoge el nombre de la función

  var funcion = 'listar'; //Función que realiza la petición y muestra los registros devueltos

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#table').DataTable({
    "ajax": {
      "url": "/donation_consult",
      "dataSrc": "",
      "method": "POST",
      "data": {
        funcion: funcion
      }
    },
    "columns": [{
      "data": "id"
    }, {
      "data": "name"
    }, {
      "data": "last_name"
    }, {
      "data": "amount"
    }, {
      "data": "size"
    }],
    "language": es
  });
}); //Registro de comentarios de la librería en español

var es = {
  "processing": "Procesando...",
  "lengthMenu": "Mostrar _MENU_ registros",
  "zeroRecords": "No se encontraron resultados",
  "emptyTable": "Ningún dato disponible en esta tabla",
  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
  "search": "Buscar:",
  "infoThousands": ",",
  "loadingRecords": "Cargando...",
  "paginate": {
    "first": "Primero",
    "last": "Último",
    "next": "Siguiente",
    "previous": "Anterior"
  },
  "aria": {
    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
    "sortDescending": ": Activar para ordenar la columna de manera descendente"
  },
  "buttons": {
    "copy": "Copiar",
    "colvis": "Visibilidad",
    "collection": "Colección",
    "colvisRestore": "Restaurar visibilidad",
    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
    "copySuccess": {
      "1": "Copiada 1 fila al portapapeles",
      "_": "Copiadas %d fila al portapapeles"
    },
    "copyTitle": "Copiar al portapapeles",
    "csv": "CSV",
    "excel": "Excel",
    "pageLength": {
      "-1": "Mostrar todas las filas",
      "_": "Mostrar %d filas"
    },
    "pdf": "PDF",
    "print": "Imprimir"
  },
  "autoFill": {
    "cancel": "Cancelar",
    "fill": "Rellene todas las celdas con <i>%d<\/i>",
    "fillHorizontal": "Rellenar celdas horizontalmente",
    "fillVertical": "Rellenar celdas verticalmentemente"
  },
  "decimal": ",",
  "searchBuilder": {
    "add": "Añadir condición",
    "button": {
      "0": "Constructor de búsqueda",
      "_": "Constructor de búsqueda (%d)"
    },
    "clearAll": "Borrar todo",
    "condition": "Condición",
    "conditions": {
      "date": {
        "after": "Despues",
        "before": "Antes",
        "between": "Entre",
        "empty": "Vacío",
        "equals": "Igual a",
        "notBetween": "No entre",
        "notEmpty": "No Vacio",
        "not": "Diferente de"
      },
      "number": {
        "between": "Entre",
        "empty": "Vacio",
        "equals": "Igual a",
        "gt": "Mayor a",
        "gte": "Mayor o igual a",
        "lt": "Menor que",
        "lte": "Menor o igual que",
        "notBetween": "No entre",
        "notEmpty": "No vacío",
        "not": "Diferente de"
      },
      "string": {
        "contains": "Contiene",
        "empty": "Vacío",
        "endsWith": "Termina en",
        "equals": "Igual a",
        "notEmpty": "No Vacio",
        "startsWith": "Empieza con",
        "not": "Diferente de"
      },
      "array": {
        "not": "Diferente de",
        "equals": "Igual",
        "empty": "Vacío",
        "contains": "Contiene",
        "notEmpty": "No Vacío",
        "without": "Sin"
      }
    },
    "data": "Data",
    "deleteTitle": "Eliminar regla de filtrado",
    "leftTitle": "Criterios anulados",
    "logicAnd": "Y",
    "logicOr": "O",
    "rightTitle": "Criterios de sangría",
    "title": {
      "0": "Constructor de búsqueda",
      "_": "Constructor de búsqueda (%d)"
    },
    "value": "Valor"
  },
  "searchPanes": {
    "clearMessage": "Borrar todo",
    "collapse": {
      "0": "Paneles de búsqueda",
      "_": "Paneles de búsqueda (%d)"
    },
    "count": "{total}",
    "countFiltered": "{shown} ({total})",
    "emptyPanes": "Sin paneles de búsqueda",
    "loadMessage": "Cargando paneles de búsqueda",
    "title": "Filtros Activos - %d"
  },
  "select": {
    "cells": {
      "1": "1 celda seleccionada",
      "_": "%d celdas seleccionadas"
    },
    "columns": {
      "1": "1 columna seleccionada",
      "_": "%d columnas seleccionadas"
    },
    "rows": {
      "1": "1 fila seleccionada",
      "_": "%d filas seleccionadas"
    }
  },
  "thousands": ".",
  "datetime": {
    "previous": "Anterior",
    "next": "Proximo",
    "hours": "Horas",
    "minutes": "Minutos",
    "seconds": "Segundos",
    "unknown": "-",
    "amPm": ["AM", "PM"],
    "months": {
      "0": "Enero",
      "1": "Febrero",
      "10": "Noviembre",
      "11": "Diciembre",
      "2": "Marzo",
      "3": "Abril",
      "4": "Mayo",
      "5": "Junio",
      "6": "Julio",
      "7": "Agosto",
      "8": "Septiembre",
      "9": "Octubre"
    },
    "weekdays": ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"]
  },
  "editor": {
    "close": "Cerrar",
    "create": {
      "button": "Nuevo",
      "title": "Crear Nuevo Registro",
      "submit": "Crear"
    },
    "edit": {
      "button": "Editar",
      "title": "Editar Registro",
      "submit": "Actualizar"
    },
    "remove": {
      "button": "Eliminar",
      "title": "Eliminar Registro",
      "submit": "Eliminar",
      "confirm": {
        "_": "¿Está seguro que desea eliminar %d filas?",
        "1": "¿Está seguro que desea eliminar 1 fila?"
      }
    },
    "error": {
      "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
    },
    "multi": {
      "title": "Múltiples Valores",
      "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
      "restore": "Deshacer Cambios",
      "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
    }
  },
  "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
}; //Función que muestra el formulario de registro de donaciones

function showInsert() {
  //Variable que guarda la acción que queramos hacer al realizar la petición
  var accion = 'mostrar_insertar'; //Petición

  window.location.replace("http://localhost/donation_showInsert");
  $('#mostrarInsertar').css('display', 'block');
  $('#tabla').css('display', 'none');
  $('#eliminar').css('display', 'none');
  $('#editar').css('display', 'none');
  /*$.post('/donation_showInsert',function(data){
      $('#mostrarInsertar').html(data);
      
  });*/
} //Función que valida el registro de donaciones


function validatestore() {
  $("#insertar").validate({
    rules: {
      nombre: {
        required: true,
        minlength: 3,
        lettersonly: true
      },
      apellidos: {
        required: true,
        minlength: 3,
        lettersonly: true
      },
      telefono: {
        required: true,
        maxlength: 9,
        isMobile: true
      },
      donacion: {
        required: true,
        donacion: true
      }
    },
    messages: {
      nombre: {
        required: "*Campo obligatorio",
        minlength: "El nombre debe tener al menos 3 caracteres",
        lettersonly: "*Sólo puede contener letras"
      },
      apellidos: {
        required: "*Campo obligatorio",
        minlength: "Los apellidos debe tener al menos 3 caracteres",
        lettersonly: "*Sólo puede contener letras"
      },
      telefono: {
        required: "*Campo obligatorio",
        maxlength: "¡El número de teléfono móvil no puede superar los 9 dígitos!",
        isMobile: "El formato del teléfono debe contener 9 dígitos, el primero debe comenzar por 6 ó 7"
      },
      donacion: {
        required: "*Campo obligatorio",
        dorsal: "*Este campo es tipo numérico "
      } //Función que realiza una acción si la validación es correcta

    },
    submitHandler: function submitHandler() {
      donation();
    }
  }); //Validaciones personalizadas que no entran dentro de la librería

  jQuery.validator.addMethod("isMobile", function (value, element) {
    var length = value.length;
    var mobile = /^[6-7][0-9]{8}$/;
    return this.optional(element) || length == 9 && mobile.test(value);
  }, "El formato del teléfono debe contener 9 dígitos, el primero debe comenzar por 6 ó 7");
  jQuery.validator.addMethod("lettersonly", function (value, element) {
    var lettersonly = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
    return this.optional(element) || lettersonly.test(value);
  }, "*Sólo letras");
  jQuery.validator.addMethod("donacion", function (value, element) {
    var donacion = /^([0-9])*$/;
    return this.optional(element) || donacion.test(value);
  }, "*Este campo es tipo numérico");
} //Función que muestra el cuadro de mensaje de confirmación de la donación con el precio total


function donation() {
  //Variable que guarda la acción que queramos hacer al realizar la petición
  var accion = 'donacion'; //Variable que guarda los datos del formulario

  var str = $("#insertar").serialize(); //Petición

  $.post('/donation_donation/', str, function (data) {
    $('#cuadroTramitar').html(data);
    $('#cuadroTramitar').css('display', 'block');
  });
} //Función que oculta el cuadro de mensaje de confirmación de la donación si pulsa "cancelar"


function cancel() {
  window.location.replace("/donation");
}
/******/ })()
;