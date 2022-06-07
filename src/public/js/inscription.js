/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/inscription.js ***!
  \*************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "Inscription": () => (/* binding */ Inscription)
/* harmony export */ });
/**
*   @file Inscriptions
*   @description Inscriptions js class
*   @version 1.0.0
*   @author Rubén Torres <rtorresgutierrez.guadalupe@alumnado.fundacionloyola.net>
*   @author Diego Carrión <dcarrionrodriguez.guadalupe@alumnado.fundacionloyola.net>
*   @license GPL-3.0-or-later
*/


function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var Inscription = /*#__PURE__*/function () {
  function Inscription() {
    _classCallCheck(this, Inscription);

    this.inscriptionsArray = [];
    this.inscriptionId = 0;
    this.events();
    this.selectedId = null;
    this.categoriesInfo = this.getCategoriesInfo();
  }

  _createClass(Inscription, [{
    key: "events",
    value: function events() {
      $('input[name="birthday"]').change(function () {
        var date = $('input[name="birthday"]').val().split("-");
        var year = date[0];
        this.categoriesInfo.forEach(function (value, index, currentArray) {
          if (currentArray[index]["min_age"] == null && year >= currentArray[index]["max_age"]) {
            $('select[name="category"]').val(currentArray[index]["id"]);
          }

          if (currentArray[index]["max_age"] == null && year <= currentArray[index]["min_age"]) {
            $('select[name="category"]').val(currentArray[index]["id"]);
          }

          if (currentArray[index]["min_age"] != null && currentArray[index]["max_age"] != null) {
            if (year >= currentArray[index]["max_age"] && year <= currentArray[index]["min_age"]) {
              $('select[name="category"]').val(currentArray[index]["id"]);
            }
          }
        });
      }.bind(this)); // sidebar button that prepares new inscription to be added

      $("#addNewInscription").click(function () {
        $("#inscriptionInscription").trigger("reset");
        this.selectedId = null;
        $("#add").html('Añadir Inscripción');
      }.bind(this)); // function that executes the whole inscription change/modification process

      $("#add").click(function () {
        var self = this;
        var disabled = $("#inscriptionInscription").find(':input:disabled').removeAttr('disabled');
        var form = $("#inscriptionInscription").serializeArray(); //aqui se valida

        disabled.attr('disabled', 'disabled'); // colects current form and stores it into an array

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
      $("#inscriptionInscription").on("submit", function (event) {
        alert("aaaaa");
        event.preventDefault();
        this.inscriptionSumbit();
      }.bind(this));
    } // fills selected form info with our array content

  }, {
    key: "populateForm",
    value: function populateForm(id) {
      var data = this.inscriptionsArray[id];
      var frm = $("#inscriptionInscription");
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
    }
  }, {
    key: "inscriptionSumbit",
    value: function inscriptionSumbit() {
      self = this;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "POST",
        url: "/inscriptionInsert",
        data: {
          array: self.inscriptionsArray
        },
        context: this,
        dataType: "json",
        success: function success(data) {
          if (data == "OK") {
            window.location.replace("/inscription");
          } else {
            alert("error");
          }
        },
        error: function error(message, status) {}
      });
    }
  }, {
    key: "getCategoriesInfo",
    value: function getCategoriesInfo() {
      self = this;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "POST",
        url: "/getCategoriesInfo",
        dataType: "json",
        context: this,
        success: function success(data) {
          self.categoriesInfo = data;
        },
        error: function error(message, status) {}
      });
    }
  }]);

  return Inscription;
}();
var inscription = new Inscription();
/******/ })()
;