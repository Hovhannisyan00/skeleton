(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_dashboard_Classes_DataTable_js"],{

/***/ "./resources/js/dashboard/Classes/DataTable.js":
/*!*****************************************************!*\
  !*** ./resources/js/dashboard/Classes/DataTable.js ***!
  \*****************************************************/
/***/ (() => {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var DataTable = /*#__PURE__*/function () {
  function DataTable(tableId) {
    var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

    _classCallCheck(this, DataTable);

    this.tableId = tableId;
    this.options = options;
    this.init();
  }

  _createClass(DataTable, [{
    key: "getFields",
    value: function getFields() {
      console.log($(this.tableId).find('th'));
      $(this.tableId).find('th');
    }
  }, {
    key: "createDataTable",
    value: function createDataTable() {
      $(this.tableId).DataTable();
    }
  }, {
    key: "init",
    value: function init() {
      this.getFields();
    }
  }]);

  return DataTable;
}();

/***/ })

}]);