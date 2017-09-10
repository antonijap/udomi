/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

$(document).foundation();
$(window).on('changed.zf.mediaquery', function () {
  $('.is-dropdown-submenu.invisible').removeClass('invisible');
});

$(function () {

  $('.chocolat-parent').Chocolat({
    loop: true,
    imageSize: 'native',
    enableZoom: true
  });

  $('#counter').textcounter(_defineProperty({
    type: "character",
    max: 100,
    min: 32,
    stopInputAtMaximum: true,
    minimumErrorText: 'Opis mora imati barem 32 znaka.',
    counterText: 'Broj znakova: %d',
    maximumErrorText: 'Maksimalan broj znakova 1000.',
    inputErrorClass: 'danger',
    displayErrorText: true
  }, 'stopInputAtMaximum', false));

  $('.owl-carousel').owlCarousel({
    items: 1,
    margin: 10,
    autoHeight: true,
    nav: true,
    loop: true
  });

  $('.flash-message').delay(1000).fadeOut(1000);;

  var input = $('input[name="files"]').fileuploader({
    addMore: true,
    fileMaxSize: 2,
    extensions: ['jpg', 'jpeg', 'png'],
    limit: 3,
    enableApi: true,
    onRemove: function onRemove(item, listEl, parentEl, newInputEl, inputEl) {
      if (api.getFiles().length == 1) {
        // Disable Button
        $(':input[type="submit"]').prop('disabled', true);
        $(".photos-error").append('Obavezno mora biti barem jedna slika.');
      } else {
        // Enable Button
        $(':input[type="submit"]').prop('disabled', false);
        $(".photos-error").append('');
      }
      return true;
    },
    onSelect: function onSelect(item, listEl, parentEl, newInputEl, inputEl) {
      $(".photos-error").empty();
      $(':input[type="submit"]').prop('disabled', false);
    }
  });

  // get API methods
  window.api = $.fileuploader.getInstance(input);
});

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);