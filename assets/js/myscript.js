(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

window.addEventListener('load', function () {
  var tabs = document.querySelectorAll('.nav-tabs > li');
  if (tabs.length !== 0 || tabs !== null || tabs !== undefined) {
    for (var i = 0; i < tabs.length; i++) {
      tabs[i].addEventListener('click', switchTab);
    }
  }
  function switchTab(event) {
    event.preventDefault();
    var activeTab = document.querySelector('.nav-tabs > li.active');
    var activePane = document.querySelector('.tab-pane.active');
    if (activeTab) {
      activeTab.classList.remove('active');
      activePane.classList.remove('active');
    }
    // document.querySelector('.nav-tabs > li.active').classList.remove('active');
    // document.querySelector('.tab-pane.active').classList.remove('active');

    var clickedTab = event.currentTarget;
    var anchor = event.target;
    var activePaneId = anchor.getAttribute('href');
    clickedTab.classList.add('active');
    document.querySelector(activePaneId).classList.add('active');
  }
});

},{}]},{},[1])

//# sourceMappingURL=myscript.js.map
