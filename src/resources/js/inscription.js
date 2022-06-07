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
    }
    events() {
      // sidebar button that prepares new inscription to be added
      $("#addNewInscription").click(function () {
        $("#inscriptionInscription").trigger("reset");
        this.selectedId = null;
        console.log(this.selectedId);
        $("#add").html('Añadir Inscripción');
      }.bind(this));

     
      // function that executes the whole inscription change/modification process
      $("#add").click(function () {
        var self = this;
        var form = $("#inscriptionInscription").serializeArray(); //aqui se valida
        // colects current form and stores it into an array
        this.inscriptionsArray[this.inscriptionId] = form; 
        // this removes the inscription on the sidebar if you are modifying it
        if (this.selectedId != null) {
          $("#sidebar-inscriptions #" + this.selectedId).remove();
        } 
        // adds a new inscription to the sidebar
        $("#sidebar-inscriptions").prepend(
          "<div class='changeForm' id='" + this.inscriptionId + "'>" + 
            "<div class='font-bold'>" +
              this.inscriptionsArray[this.inscriptionId][2].value + 
            "</div>" + 
            "<div>" + 
              this.inscriptionsArray[this.inscriptionId][4].value + 
            "</div>" + 
            "<div class='deleteInscription' id='" + this.inscriptionId + "'>Icono Borrar</div>" +
          "</div>"
        );

        this.selectedId = null;
        // selects sidebar inscription to be modified
        $(".changeForm").on('click', function () {
          $("#add").html('Modificar Inscripción');
          self.selectedId = this.id;
          self.populateForm(this.id);
        });
        // deletes sidebar inscription 
        $(".deleteInscription").on('click', function () {
          this.inscriptionsArray[this.id] = [];
          $("#sidebar-inscriptions #" + this.id).remove();
        });

        // resets info of from
        $("#inscriptionInscription").trigger("reset");
        $("#add").html('Añadir Inscripción');
        this.inscriptionId++;

      }.bind(this));
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
}
let inscription = new Inscription();