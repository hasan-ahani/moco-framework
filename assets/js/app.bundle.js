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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./app.js":
/*!****************!*\
  !*** ./app.js ***!
  \****************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {const init = __webpack_require__(/*! ./init */ "./init.js");
const fields = __webpack_require__(/*! ./fields */ "./fields.js");


jQuery(function ($) {
    $(document).ready(
        function () {
            init.ready();
            fields.ready();
        }
    );

});

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./fields.js":
/*!*******************!*\
  !*** ./fields.js ***!
  \*******************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(__webpack_provided_window_dot_jQuery) {const $ = __webpack_provided_window_dot_jQuery;

module.exports = {
    ready: function () {
        //$('select').niceSelect();
        this.mediaSelection();
        this.inputClear();
        this.codeMirror();
    },
    mediaSelection: function () {
        $('.mc-btn[data-moco-selection]').on('click', function (e) {
            let frame,
                t       = $(this),
                target       = t.parent().children('input'),
                defaultOptions = {
                    title: 'Select Media',
                    multiple : false,
                    library : {
                        type : 'image',
                    }
                };
            e.preventDefault();
            if(frame){
                frame.open();
            }
            frame = wp.media(defaultOptions);
            frame.on('close',function() {

                let selection =  frame.state().get('selection').first();
                if (selection !== undefined){
                    selection = selection.toJSON();
                    target.val(selection.url);
                    target.attr('data-media-id',selection.id);
                }
                // var gallery_ids = new Array();
                // var my_index = 0;
                // selection.each(function(attachment) {
                //     gallery_ids[my_index] = attachment['id'];
                //     my_index++;
                // });
                // var ids = gallery_ids.join(",");
                // jQuery('input#myprefix_image_id').val(ids);
                // Refresh_Image(ids);
            });
            frame.on('open',function() {
                let   selection =  frame.state().get('selection'),
                        attachment,
                        id = target.data('media-id');

                if (id !== undefined){
                    attachment = wp.media.attachment(id);
                    selection.add( attachment ? [ attachment ] : [] );
                }

            });
            frame.open();
        })
    },
    inputClear: function () {
        $('.mc-btn[data-moco-clear]').on('click', function (e) {
            let
                t       = $(this),
                target       = t.parent().children('input');
            e.preventDefault();
            if (target.attr('data-media-id') !== undefined){
                target.removeAttr('data-media-id');
            }
            target.val('');
        })
    },
    codeMirror: function () {
        let selector            =  $('.moco-code-editor'),
            settings            =  selector.data('settings');
        wp.codeEditor.initialize(selector, settings);
    },

};

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./init.js":
/*!*****************!*\
  !*** ./init.js ***!
  \*****************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(__webpack_provided_window_dot_jQuery) {const $ = __webpack_provided_window_dot_jQuery;

module.exports = {
    ready: function () {
        this.sidebar();
        this.optionForm();
    },
    sidebar: function () {
        $('.moco-nav a').on('click', function (e) {
            const   t       = $(this),
                    p       = t.parent('li'),
                    target  = $('#moco-content-' + p.data('target')),
                    href    = t.attr('href');

            if (href !== undefined) return;

            if (!p.hasClass('active')){
                $('.moco-content .moco-tab-content.show').removeClass('show');
                if (target.length){
                    target.addClass('show')
                }
                $('.moco-nav li.active').removeClass('active');
                p.addClass('active')
            }
        })
    },
    optionForm: function () {
        $('#moco-framework form').submit(function (e) {
            const t = $(this),
                    data = t.serialize();
            e.preventDefault();
            console.log(data)
        })
    }

};

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ 0:
/*!**********************!*\
  !*** multi ./app.js ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! ./app.js */"./app.js");


/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ })

/******/ });
//# sourceMappingURL=app.bundle.js.map