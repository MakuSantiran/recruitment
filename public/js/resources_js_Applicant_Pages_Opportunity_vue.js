"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Applicant_Pages_Opportunity_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Applicant/Pages/Opportunity.vue?vue&type=script&lang=js":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Applicant/Pages/Opportunity.vue?vue&type=script&lang=js ***!
  \**********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ['opp', 'slug'],
  data: function data() {
    return {};
  },
  mounted: function mounted() {},
  methods: {
    convertTimestamp: function convertTimestamp(ts) {
      ts = ts.split(/[- :]/);
      var d = new Date(ts[0], ts[1] - 1, ts[2], ts[3], ts[4]);
      var time = d.toLocaleTimeString();
      return d.toDateString() + ' ' + time.slice(0, 5) + ' ' + time.slice(-2);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Applicant/Pages/Opportunity.vue?vue&type=template&id=65e5224d&lang=true":
/*!************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Applicant/Pages/Opportunity.vue?vue&type=template&id=65e5224d&lang=true ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "p-5 mx-auto w-4/5"
};
var _hoisted_2 = {
  "class": "border border-accent bg-white p-5 rounded-lg shadow-lg mb-3 w-9/12 mx-auto"
};
var _hoisted_3 = {
  "class": "font-bold text-center"
};

var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<hr class=\"my-4 border-secondary\"><div class=\"px-4 grid grid-cols-1 lg:grid-cols-2 gap-2\"><div><span class=\"text-lg font-semibold\">Position: </span><!-- &lt;span class=&quot;text-lg&quot;&gt;{{ opp.position }}&lt;/span&gt; &lt;br&gt; --></div><div><span class=\"text-lg font-semibold\">Type: </span><!-- &lt;span class=&quot;text-lg&quot;&gt;{{ opp.type ?? &#39;----&#39; }}&lt;/span&gt; &lt;br&gt; --></div><div><span class=\"text-lg font-semibold\">Description: </span><!-- &lt;div class=&quot;px-5 bold-marker&quot; v-html=&quot;opp.description&quot;&gt;&lt;/div&gt; --></div><div><span class=\"text-lg font-semibold\">Qualifications: </span><!-- &lt;div class=&quot;px-5 bold-marker&quot; v-html=&quot;opp.qualifications&quot;&gt;&lt;/div&gt; --></div><div><div class=\"text-lg font-semibold\">Required Documents:</div><div class=\"px-5\"><!-- &lt;li &gt;{{ $req }}&lt;/li&gt; --></div></div><div><div class=\"text-lg font-semibold\">Optional Documents:</div><div class=\"px-5\"><!-- &lt;li&gt;{{ $opt }}&lt;/li&gt; --></div></div><div class=\"col-span-1 lg:col-span-2 mt-2\"><span class=\"text-lg font-semibold\">Deadline of Submissions: </span><!-- &lt;span class=&quot;text-lg&quot;&gt;{{ date(&quot;D, F d, Y h:i a&quot;, strtotime(opp.submission_deadline)) }}&lt;/span&gt; &lt;br&gt; --></div><div class=\"w-full grid pt-4\"><div class=\"place-self-end\"><!-- &lt;a href=&quot;&quot; class=&quot;btn btn-primary&quot;&gt;Apply&lt;/a&gt; --></div></div></div>", 2);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    onClick: _cache[0] || (_cache[0] = function ($event) {
      return _ctx.$router.go(-1);
    }),
    "class": "btn"
  }, "Back to Opportunities")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", _hoisted_3, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.opp.title), 1
  /* TEXT */
  ), _hoisted_4])]);
}

/***/ }),

/***/ "./resources/js/Applicant/Pages/Opportunity.vue":
/*!******************************************************!*\
  !*** ./resources/js/Applicant/Pages/Opportunity.vue ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Opportunity_vue_vue_type_template_id_65e5224d_lang_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Opportunity.vue?vue&type=template&id=65e5224d&lang=true */ "./resources/js/Applicant/Pages/Opportunity.vue?vue&type=template&id=65e5224d&lang=true");
/* harmony import */ var _Opportunity_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Opportunity.vue?vue&type=script&lang=js */ "./resources/js/Applicant/Pages/Opportunity.vue?vue&type=script&lang=js");
/* harmony import */ var C_xampp_htdocs_recruitment_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_xampp_htdocs_recruitment_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Opportunity_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Opportunity_vue_vue_type_template_id_65e5224d_lang_true__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Applicant/Pages/Opportunity.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Applicant/Pages/Opportunity.vue?vue&type=script&lang=js":
/*!******************************************************************************!*\
  !*** ./resources/js/Applicant/Pages/Opportunity.vue?vue&type=script&lang=js ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Opportunity_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Opportunity_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Opportunity.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Applicant/Pages/Opportunity.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/Applicant/Pages/Opportunity.vue?vue&type=template&id=65e5224d&lang=true":
/*!**********************************************************************************************!*\
  !*** ./resources/js/Applicant/Pages/Opportunity.vue?vue&type=template&id=65e5224d&lang=true ***!
  \**********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Opportunity_vue_vue_type_template_id_65e5224d_lang_true__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Opportunity_vue_vue_type_template_id_65e5224d_lang_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Opportunity.vue?vue&type=template&id=65e5224d&lang=true */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Applicant/Pages/Opportunity.vue?vue&type=template&id=65e5224d&lang=true");


/***/ })

}]);