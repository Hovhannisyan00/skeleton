function a(){import.meta.url,import("_").catch(()=>1),async function*(){}().next()}class t{constructor(o,l){this.options=l,this.modalId=o,this.modalEl=$("#".concat(o)),this.modalBody=this.modalEl.find(".modal-body")}beforeShow(o){this.modalEl.on("show.bs.modal",o)}afterShow(o){this.modalEl.on("shown.bs.modal",o)}beforeHide(o){this.modalEl.on("hide.bs.modal",o)}afterHide(o){this.modalEl.on("hidden.bs.modal",o)}save(o){this.modalEl.find(".save-btn").click(o)}cancel(o){this.modalEl.find(".cancel-btn").click(o)}show(){this.modalEl.modal("show")}hide(){this.modalEl.modal("hide")}clickItem(o,l){this.modalEl.find(o).click(l)}getModalElement(){return this.modalEl}}export{t as M,a as __vite_legacy_guard};
//# sourceMappingURL=Modal-Bp3xbxpQ.js.map
