System.register([],(function(e,t){"use strict";return{execute:function(){$((function(){select2Init(),function(){const e=$(".datepicker");e.length&&$.each(e,(function(){const e=$(this);e.datetimepicker({timepicker:!1,format:"d.m.Y",scrollMonth:!1,scrollInput:!1,onChangeDateTime(t,o){let a="";o.val()&&(a=moment(o.val(),"DD.MM.YYYY").format($dashboardDates.js.date_format)),e.siblings(".backend-date-value").val(a)}})}))}(),function(){const e=$(".datetimepicker");e.length&&$.each(e,(function(){const e=$(this);e.datetimepicker({format:"d.m.Y H:i",onChangeDateTime(t,o){let a="";o.val()&&(a=moment(o.val(),"DD.MM.YYYY HH:mm").format($dashboardDates.js.date_time_format)),e.siblings(".backend-date-value").val(a)}})}))}(),document.querySelectorAll(".ckeditor5").forEach((e=>{ClassicEditor.create(e,{cloudServices:{tokenUrl:"https://33333.cke-cs.com/token/dev/ijrDsqFix838Gh3wGO3F77FSW94BwcLXprJ4APSp3XQ26xsUHTi0jcb1hoBt",uploadUrl:"https://33333.cke-cs.com/easyimage/upload/"}}).then((t=>{$(e).attr("disabled")&&(t.isReadOnly=!0),t.model.document.on("change:data",((e,o)=>{t.updateSourceElement()}))})).catch((e=>{console.error(e)}))})),$(".open-menu").click((()=>{$(".page").toggleClass("left-menu-opened"),$(".open-menu").toggleClass("open-menu-opened")})),function(){const e=$(".copy-ml-info-btn");e.length&&e.click((function(){const e=$(this),t=e.closest(".tab-pane").find(":input"),o=$(`#__mls__tab__${e.data("to-lang-code")}`);e.prop("disabled",!0),$.each(t,(function(){const t=$(this).attr("name");if(t){const a=t.replace(e.data("current-lang-code"),e.data("to-lang-code")),n=o.find(`*[name="${a}"]`);n.length&&(n.hasClass("ckeditor5")||n.val($(this).val())),setTimeout((()=>{e.prop("disabled",!1)}),120)}}))}))}(),function(){const e=localStorage.getItem("_message");e&&showSuccessMessage(e),localStorage.removeItem("_message")}(),$(".brand-toggle").click((()=>{$(".page").toggleClass("minimaize-menu")})),$(".open-menu").click((()=>{$(".page").toggleClass("left-menu-opened"),$(".open-menu").toggleClass("open-menu-opened")}))})),showSuccessMessage=function(e){$.toast({text:e,hideAfter:2e3,position:"top-right",stack:!1,loader:!1,icon:"success",allowToastClose:!1})},showErrorMessage=function(e){$.toast({heading:"Error",hideAfter:2e3,text:e,position:"top-right",stack:!1,loader:!1,icon:"error",allowToastClose:!1})},select2Init=function(e=void 0,t="select2"){let o=$(`select.${t}`);void 0!==e&&(o=e.find(`select.${t}`)),$.each(o,(function(){$(this).select2({placeholder:$trans("__dashboard.select.option.default"),minimumResultsForSearch:10,tags:$(this).data("allow-tags")||!1,allowClear:$(this).data("allow-clear")||!1})}))},select2Reset=function(e){e.length&&(e.select2("val",""),e.find("option").not(":first-child").remove())},select2SetValues=function(e,t){$.each(t,((t,o)=>{e.append(new Option(o,t,!1,!1)).trigger("change.select2")}))},disableField=function(e,t){void 0===t&&(t=!0),e.prop("disabled",t)},loadContent=function(e,t){void 0===t?e.addClass("loading-content position-relative"):e.removeClass("loading-content position-relative")}}}}));
//# sourceMappingURL=main-legacy-JMLVkl0Q.js.map
