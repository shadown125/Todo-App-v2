(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["main"],{

/***/ "./src/scripts/AddTask.js":
/*!********************************!*\
  !*** ./src/scripts/AddTask.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return AddTask; });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery-exposed.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var AddTask = /*#__PURE__*/function () {
  function AddTask() {
    _classCallCheck(this, AddTask);

    this.smth = jquery__WEBPACK_IMPORTED_MODULE_0___default()('div');
    this.throwMessage();
  }

  _createClass(AddTask, [{
    key: "throwMessage",
    value: function throwMessage() {
      console.log('lol');
    }
  }]);

  return AddTask;
}();



/***/ }),

/***/ "./src/scripts/main.js":
/*!*****************************!*\
  !*** ./src/scripts/main.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AddTask__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AddTask */ "./src/scripts/AddTask.js");

new _AddTask__WEBPACK_IMPORTED_MODULE_0__["default"]();

/***/ }),

/***/ 0:
/*!********************************!*\
  !*** multi ./src/scripts/main ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! ./src/scripts/main */"./src/scripts/main.js");


/***/ })

},[[0,"runtime","vendor"]]]);