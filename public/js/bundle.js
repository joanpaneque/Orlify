/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./App/js/Allocators/inputBlock.js":
/*!*****************************************!*\
  !*** ./App/js/Allocators/inputBlock.js ***!
  \*****************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (/* binding */ inputBlock)\n/* harmony export */ });\nfunction inputBlock() {\r\n    const inputBlocks = document.querySelectorAll('.inputBlock');\r\n\r\n    let focused = false;\r\n\r\n    inputBlocks.forEach(inputBlock => {\r\n        const input = inputBlock.querySelector('input');\r\n        const label = inputBlock.querySelector('label');\r\n\r\n        input.addEventListener('focus', () => {\r\n            label.classList.add('active');\r\n        });\r\n\r\n        input.addEventListener('blur', () => {\r\n            if (input.value === '') {\r\n                label.classList.remove('active');\r\n            }\r\n        });\r\n\r\n        if (input.value === \"\" && !focused) {\r\n            input.focus();\r\n            focused = true;\r\n        }\r\n    });\r\n\r\n    if (!focused) {\r\n        inputBlocks[0].querySelector('input').focus();\r\n    }\r\n}\n\n//# sourceURL=webpack:///./App/js/Allocators/inputBlock.js?");

/***/ }),

/***/ "./App/js/Emesis/Emesis.js":
/*!*********************************!*\
  !*** ./App/js/Emesis/Emesis.js ***!
  \*********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (/* binding */ Emesis)\n/* harmony export */ });\nclass Emesis {\r\n    constructor(allocators) {\r\n\r\n        // Wait until DOM is loaded\r\n        window.addEventListener(\"DOMContentLoaded\", () => {\r\n            // Get all recievers\r\n            this.recievers = Array.from(document.head.querySelectorAll(\"meta[allocation]\")).map(allocator => allocator.getAttribute(\"allocation\"));\r\n\r\n            // Allocate each reaciever\r\n            this.recievers.forEach(reciever => {\r\n                if (!allocators[reciever]) {\r\n                    this.error(`No allocator found for ${reciever} reciever`);\r\n                    return;\r\n                } else {\r\n                    allocators[reciever]();\r\n                }\r\n            });\r\n\r\n            this.log(\"Allocators loaded\");\r\n        });\r\n    }\r\n\r\n    log(message) {\r\n        console.log(`[Emesis] ${message}`);\r\n    }\r\n\r\n    error(message) {\r\n        console.log(`[Emesis][!] ${message}`);\r\n    }\r\n}\n\n//# sourceURL=webpack:///./App/js/Emesis/Emesis.js?");

/***/ }),

/***/ "./App/js/index.js":
/*!*************************!*\
  !*** ./App/js/index.js ***!
  \*************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _Emesis_Emesis_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Emesis/Emesis.js */ \"./App/js/Emesis/Emesis.js\");\n/* harmony import */ var _Allocators_inputBlock_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Allocators/inputBlock.js */ \"./App/js/Allocators/inputBlock.js\");\n\r\n// Allocators\r\n\r\n// \"reciever\": allocator\r\nconst emesis = new _Emesis_Emesis_js__WEBPACK_IMPORTED_MODULE_0__[\"default\"]({\r\n    \"inputBlock\": _Allocators_inputBlock_js__WEBPACK_IMPORTED_MODULE_1__[\"default\"],   \r\n});\n\n//# sourceURL=webpack:///./App/js/index.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
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
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./App/js/index.js");
/******/ 	
/******/ })()
;