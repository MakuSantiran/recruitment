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
  props: ['opp', 'slug', 'applicant'],
  data: function data() {
    return {
      userOpp: [],
      required: [],
      optional: []
    };
  },
  mounted: function mounted() {
    this.userOpp = JSON.parse(this.opp);
    this.filterDocs(this.opp); //console.log(this.opp[0]+this.opp[1]+this.opp[2])
  },
  methods: {
    initiateDocReq: function initiateDocReq() {
      alert('Now Applying the job!');
    },
    convertTimestamp: function convertTimestamp(ts) {
      ts = ts.split(/[- :]/);
      var d = new Date(ts[0], ts[1] - 1, ts[2], ts[3], ts[4]);
      var time = d.toLocaleTimeString();
      return d.toDateString() + ' ' + time.slice(0, 5) + ' ' + time.slice(-2);
    },
    filterDocs: function filterDocs(opp) {
      var _this = this;

      console.log("Opportunity.vue: Running");
      var reqs = {
        cert_employment: {
          name: "Certificate of Employment",
          value: this.userOpp.cert_employment
        },
        service_record: {
          name: "Service Record",
          value: this.userOpp.service_record
        },
        transcript_of_records: {
          name: "Transcript of Record",
          value: this.userOpp.transcript_of_records
        },
        diploma: {
          name: "Diploma",
          value: this.userOpp.diploma
        },
        certification_of_units: {
          name: "Certification of Units",
          value: this.userOpp.certification_of_units
        },
        cs_eligibility: {
          name: "Civil Service Eligibility",
          value: this.userOpp.cs_eligibility
        },
        prc_license: {
          name: "PRC License",
          value: this.userOpp.prc_license
        },
        board_rating: {
          name: "Board Rating",
          value: this.userOpp.board_rating
        },
        trainings_seminars_awards: {
          name: "Trainings, Seminars, and Awards",
          value: this.userOpp.trainings_seminars_awards
        },
        latest_performance_rating: {
          name: "Latest Performance Rating",
          value: this.userOpp.latest_performance_rating
        }
      };
      this.required = [];
      this.optional = [];
      Object.entries(reqs).forEach(function (item, index) {
        if (item[1].value == 2) {
          _this.required.push(item[1].name);
        } else if (item[1].value == 1) {
          _this.optional.push(item[1].name);
        }
      });
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
  "class": "border border-accent bg-white p-5 rounded-lg shadow-lg mb-3 w-9/12 mx-auto"
};
var _hoisted_2 = {
  "class": "font-bold text-center"
};

var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("hr", {
  "class": "my-4 border-secondary"
}, null, -1
/* HOISTED */
);

var _hoisted_4 = {
  "class": "px-4 grid grid-cols-1 lg:grid-cols-2 gap-2"
};

var _hoisted_5 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-lg font-semibold"
}, "Position: ", -1
/* HOISTED */
);

var _hoisted_6 = {
  "class": "text-lg"
};

var _hoisted_7 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)();

var _hoisted_8 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-lg font-semibold"
}, "Type: ", -1
/* HOISTED */
);

var _hoisted_10 = {
  "class": "text-lg"
};

var _hoisted_11 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)();

var _hoisted_12 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_13 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-lg font-semibold"
}, "Description: ", -1
/* HOISTED */
);

var _hoisted_14 = ["innerHTML"];

var _hoisted_15 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-lg font-semibold"
}, "Qualifications: ", -1
/* HOISTED */
);

var _hoisted_16 = ["innerHTML"];

var _hoisted_17 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "text-lg font-semibold"
}, "Required Documents:", -1
/* HOISTED */
);

var _hoisted_18 = {
  "class": "px-5"
};

var _hoisted_19 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "text-lg font-semibold"
}, "Optional Documents:", -1
/* HOISTED */
);

var _hoisted_20 = {
  "class": "px-5"
};
var _hoisted_21 = {
  "class": "col-span-1 lg:col-span-2 mt-2"
};

var _hoisted_22 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-lg font-semibold"
}, "Deadline of Submissions: ", -1
/* HOISTED */
);

var _hoisted_23 = {
  "class": "text-lg"
};

var _hoisted_24 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)();

var _hoisted_25 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br", null, null, -1
/* HOISTED */
);

var _hoisted_26 = {
  "class": "w-full grid pt-4"
};
var _hoisted_27 = {
  "class": "place-self-end"
};

var _hoisted_28 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("   ");

function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _$data$userOpp$type;

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", _hoisted_2, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.userOpp.title), 1
  /* TEXT */
  ), _hoisted_3, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [_hoisted_5, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.userOpp.position), 1
  /* TEXT */
  ), _hoisted_7, _hoisted_8]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [_hoisted_9, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_10, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)((_$data$userOpp$type = $data.userOpp.type) !== null && _$data$userOpp$type !== void 0 ? _$data$userOpp$type : '----'), 1
  /* TEXT */
  ), _hoisted_11, _hoisted_12]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [_hoisted_13, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": "px-5 bold-marker",
    innerHTML: $data.userOpp.description
  }, null, 8
  /* PROPS */
  , _hoisted_14)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [_hoisted_15, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
    "class": "px-5 bold-marker",
    innerHTML: $data.userOpp.qualifications
  }, null, 8
  /* PROPS */
  , _hoisted_16)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [_hoisted_17, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_18, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($data.required, function (req) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("li", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(req), 1
    /* TEXT */
    );
  }), 256
  /* UNKEYED_FRAGMENT */
  ))])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [_hoisted_19, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_20, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($data.optional, function (opt) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("li", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(opt), 1
    /* TEXT */
    );
  }), 256
  /* UNKEYED_FRAGMENT */
  ))])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_21, [_hoisted_22, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_23, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.userOpp.submission_deadline), 1
  /* TEXT */
  ), _hoisted_24, _hoisted_25, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("\n                        <span class=\"text-lg\">{{ date(\"D, F d, Y h:i a\", strtotime(userOpp.submission_deadline)) }}</span> <br>\n                    ")])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_26, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_27, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    onClick: _cache[0] || (_cache[0] = function ($event) {
      return _ctx.$router.go(-1);
    }),
    "class": "btn btn-primary"
  }, "Cancel"), _hoisted_28, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    onClick: _cache[1] || (_cache[1] = function () {
      return $options.initiateDocReq && $options.initiateDocReq.apply($options, arguments);
    }),
    "class": "btn btn-primary"
  }, "Apply")])])])]);
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