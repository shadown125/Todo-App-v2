(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["main"],{

/***/ "./src/scripts/ToggleAsideNavigation.js":
/*!**********************************************!*\
  !*** ./src/scripts/ToggleAsideNavigation.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ToggleAsideNavigation; });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery-exposed.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var ToggleAsideNavigation = /*#__PURE__*/function () {
  function ToggleAsideNavigation() {
    _classCallCheck(this, ToggleAsideNavigation);

    this.asideNavigation = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.aside-navigation');
    this.asideNavigationAnchors = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.main-navigation li a');
    this.buttonMenu = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.button-menu');
    this.divBlur = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.blur');
    this.buttonMenu.on('click', this.toggleAside.bind(this));
    this.divBlur.on('click', this.hideAsideWhileClickingOutside.bind(this));
    this.asideNavigationAnchors.on('click', this.hideAsideNavigationAndBlurWhileClickAnchor.bind(this));
  }

  _createClass(ToggleAsideNavigation, [{
    key: "toggleAside",
    value: function toggleAside() {
      if (!this.asideNavigation.hasClass('is-active')) {
        this.asideNavigation.addClass('flex').outerWidth();
        this.asideNavigation.addClass('is-active');
        this.divBlur.addClass('background-blur');
      }
    }
  }, {
    key: "hideAsideWhileClickingOutside",
    value: function hideAsideWhileClickingOutside() {
      this.asideNavigation.removeClass('is-active').removeClass('flex');
      this.divBlur.removeClass('background-blur');
    }
  }, {
    key: "hideAsideNavigationAndBlurWhileClickAnchor",
    value: function hideAsideNavigationAndBlurWhileClickAnchor() {
      this.hideAsideWhileClickingOutside();
    }
  }]);

  return ToggleAsideNavigation;
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
/* harmony import */ var _ToggleAsideNavigation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ToggleAsideNavigation */ "./src/scripts/ToggleAsideNavigation.js");

new _ToggleAsideNavigation__WEBPACK_IMPORTED_MODULE_0__["default"]();

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