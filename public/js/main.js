/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
var replyBtns = document.querySelectorAll(".reply-btn");
replyBtns.forEach(function (btn) {
  var formComment = btn.parentNode.querySelector("form");
  btn.addEventListener("click", function (e) {
    e.preventDefault();
    formComment.classList.toggle("hide");
  });
});
/******/ })()
;