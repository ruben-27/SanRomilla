/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/mark.js ***!
  \******************************/
$("#start").click(start);
$("#stop").click(stop);
$("#remove").click(remove);
var timeBegan = null,
    timeStopped = null,
    stoppedDuration = 0,
    started = null;

function start() {
  if (timeBegan === null) {
    timeBegan = new Date();
  }

  if (timeStopped !== null) {
    stoppedDuration += new Date() - timeStopped;
  }

  $("#start").hide();
  $("#stop").show();
  $("#remove").show();
  started = setInterval(clockRunning, 10);
}

function stop() {
  timeStopped = new Date();
  var time = $("#display-area").html().slice(0, -4); //'abcde'

  time = time.split(':');
  var seconds = +time[0] * 60 * 60 + +time[1] * 60 + +time[2];
  console.log(seconds);
  Livewire.emit('stopTime', seconds);
}

function remove() {
  clearInterval(started);
  $("#timers").hide();
  $("#endText").show();
}

function clockRunning() {
  var currentTime = new Date(),
      timeElapsed = new Date(currentTime - timeBegan - stoppedDuration),
      hour = timeElapsed.getUTCHours(),
      min = timeElapsed.getUTCMinutes(),
      sec = timeElapsed.getUTCSeconds(),
      ms = timeElapsed.getUTCMilliseconds();
  document.getElementById("display-area").innerHTML = (hour > 9 ? hour : "0" + hour) + ":" + (min > 9 ? min : "0" + min) + ":" + (sec > 9 ? sec : "0" + sec) + "." + (ms > 99 ? ms : ms > 9 ? "0" + ms : "00" + ms);
}
/******/ })()
;