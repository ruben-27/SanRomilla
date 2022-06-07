/**
*   @file Inscriptions
*   @description Inscriptions js class
*   @version 1.0.0
*   @author Rubén Torres <rtorresgutierrez.guadalupe@alumnado.fundacionloyola.net>
*   @author Diego Carrión <dcarrionrodriguez.guadalupe@alumnado.fundacionloyola.net>
*   @license GPL-3.0-or-later
*/
'use strict'

export class Inscription{
    
    constructor(){
        this.inscriptionsArray = [];
        this.inscriptionId = 0;
        this.events();
        this.selectedId = null;
        this.categoriesInfo = this.getCategoriesInfo();
    }
    events() {
      $('input[name="birthday"]').change(function() {
        let date = $('input[name="birthday"]').val().split("-");

        let year = date[0];
        this.categoriesInfo.forEach(function (value,index,currentArray) {
          
          if(currentArray[index]["min_age"] == null && year >= currentArray[index]["max_age"]) {
            $('select[name="category"]').val(currentArray[index]["id"]);
          }
          if(currentArray[index]["max_age"] == null && year <= currentArray[index]["min_age"]) {
            $('select[name="category"]').val(currentArray[index]["id"]);
          }
          if(currentArray[index]["min_age"] != null && currentArray[index]["max_age"] != null) {
            if(year >= currentArray[index]["max_age"] && year <= currentArray[index]["min_age"]) {
              $('select[name="category"]').val(currentArray[index]["id"]);
            }
          }
        
        });

      }.bind(this));

      // sidebar button that prepares new inscription to be added
      $("#addNewInscription").click(function () {
        $("#inscriptionInscription").trigger("reset");
        this.selectedId = null;
        $("#add").html('Añadir Inscripción');
      }.bind(this)); // function that executes the whole inscription change/modification process

      $("#add").click(function () {
        var self = this;
        let disabled = $("#inscriptionInscription").find(':input:disabled').removeAttr('disabled');
        let form = $("#inscriptionInscription").serializeArray(); //aqui se valida
        disabled.attr('disabled','disabled');
        // colects current form and stores it into an array

        this.inscriptionsArray[this.inscriptionId] = form; // this removes the inscription on the sidebar if you are modifying it

        if (this.selectedId != null) {
          $("#sidebar-inscriptions #" + this.selectedId).remove();
        } // adds a new inscription to the sidebar


        $("#sidebar-inscriptions").prepend("<div class='changeForm' id='" + this.inscriptionId + "'>" + "<div class='font-bold'>" + this.inscriptionsArray[this.inscriptionId][2].value + "</div>" + "<div>" + this.inscriptionsArray[this.inscriptionId][4].value + "</div>" + "<div class='deleteInscription' id='" + this.inscriptionId + "'>Icono Borrar</div>" + "</div>");
        this.selectedId = null; // selects sidebar inscription to be modified

        $(".changeForm").on('click', function () {
          $("#add").html('Modificar Inscripción');
          self.selectedId = this.id;
          self.populateForm(this.id);
        }); // deletes sidebar inscription 

        $(".deleteInscription").on('click', function () {
          self.inscriptionsArray[this.id] = [];
          $("#sidebar-inscriptions #" + this.id).remove();
        }); // resets info of from

        $("#inscriptionInscription").trigger("reset");
        $("#add").html('Añadir Inscripción');
        this.inscriptionId++;
      }.bind(this));

      $("#inscriptionInscription").on("submit",function(event) {
        alert("aaaaa")
        event.preventDefault()
        this.inscriptionSumbit();
      }.bind(this))
    }
    // fills selected form info with our array content
    populateForm(id) {
        let data = this.inscriptionsArray[id];
        let frm = $("#inscriptionInscription");
        $.each(data, function (key, value) {
        
            var $ctrl = $('[name=' + value.name + ']', frm);
            if ($ctrl.is('select')) {
              $("option", $ctrl).each(function () {
                if (this.value == value.value) {
                  this.selected = true;
                }
              });
            } else {
              switch ($ctrl.attr("type")) {
                case "text":
                case "hidden":
                case "tel":
                case "number":
                case "textarea":
                case "email":
                case "date":
                  $ctrl.val(value.value);
                  break;
    
                case "radio":
                case "checkbox":
                  $ctrl.each(function () {
                    if ($(this).attr('value') == value.value) {
                      $(this).attr("checked", value.value);
                    }
                  });
                  break;
                } 
            } 
        });  
        
        
    };

    inscriptionSumbit() {
      self = this;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "POST",
        url: "/inscriptionInsert",
        data: {array:self.inscriptionsArray},
        context: this,
        dataType: "json",
        success: function success(data) {
          if (data == "OK") {
            window.location.replace("/inscription");
          } else {
            alert("error")
          }
        },
        error: function error(message, status) {}
      });
    }

    getCategoriesInfo() {
      self = this;
      $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
        type : "POST",
        url : "/getCategoriesInfo",
        dataType : "json",
        context: this,
        success : function(data) {
            self.categoriesInfo = data;
        },
        error : function(message, status) {

        }
      });
    }
}
let inscription = new Inscription();