System.register(["./Modal-legacy-DPamTmnJ.js"],(function(e,t){"use strict";var i;return{setters:[e=>{i=e.M}],execute:function(){const e=new i("cropImageModal");new class{constructor(){this.init()}init(){this.deleteFileEvent(),this.$_functions()}$_functions(){$("body").on("click",".__delete__file__btn",this.deleteFileHandler.bind(this)),$("input[type=file].temp-file-type").change(this.fileChangeHandle.bind(this))}getAttribute(e){return this.$el.getAttribute(`data-${e}`)}fileChangeHandle(){this.$el=event.target,this.$fileListEl=$(this.$el).siblings("div.__file__list__default"),this.$fileErrorBox=$(this.$el).siblings("div.error-messages-block"),this.$fileHiddenInputsBox=$(this.$el).siblings(".hidden-file-inputs"),this.resetUploader(),this.fileData=this.$el.files,this.filename="",$(this.$el).data("has-crop")?(void 0===this.cropContainer&&(this.initCroppie(),this.cropModalActions()),this.cropperImageChange()):(this.removeOldUploadedFiles(),this.generateFormDataForFiles()),this.$el.value=""}removeOldUploadedFiles(){this.is_multiple=null!==this.$el.getAttribute("multiple"),this.is_multiple||$(this.$el).siblings(".__uploaded__files").remove()}initCroppie(){this.cropContainer=$(".crop-img-container").croppie({enableExif:!0,viewport:{width:200,height:200,type:"circle"},boundary:{width:300,height:300}})}cropperImageChange(){e.show();const t=new FileReader;t.onload=e=>{this.cropContainer.croppie("bind",{url:e.target.result})},t.readAsDataURL(this.fileData[0]),this.filename=this.fileData[0].name}cropModalActions(){e.save((()=>{this.cropContainer.croppie("result",{type:"canvas",size:"viewport"}).then((t=>{this.removeOldUploadedFiles();const i=new FormData;i.append("config_key",`${this.getAttribute("config-key")}.${this.getAttribute("name")}`),i.append("file",t),i.append("name",this.filename),this.sendData(i,0),this.inputName=this.getAttribute("name"),e.hide()}))}))}resetUploader(){this.$fileListEl.html(""),this.$fileErrorBox.find("ul").html(""),this.$fileErrorBox.hide(),this.$fileHiddenInputsBox.html("")}generateFormDataForFiles(){if(this.fileData){this.inputName=this.getAttribute("name");const e=this.getAttribute("config-key");for(const[t,i]of Object.entries(this.fileData)){const s=new FormData;s.append("config_key",`${e}.${this.inputName}`),s.append("file",i),this.sendData(s,t)}}}async sendData(e,t){this.createPreviewBlock(t),await axios.post(route("dashboard.files.storeTempFile"),e,{onUploadProgress:e=>{const i=e.lengthComputable?e.total:e.target.getResponseHeader("content-length")||e.target.getResponseHeader("x-decompressed-content-length");if(null!==i){const s=Math.round(100*e.loaded/i);this.progressBar(s,t)}}}).then((e=>{e=e.data,this.setPreviewValue(e,t),this.appendDeleteBtn(t),this.createHiddenInputs(e)})).catch((e=>{this.errorHandler(e,t),this.appendDeleteBtn(t,!0)}))}setPreviewValue(e,t){const i=$(this.$fileListEl).find(`.file__item[data-index=${t}]`);i.addClass(`file__item__type__${e.file_type}`),i.html(this.createHtmlForFile(e))}appendDeleteBtn(e,t=!1){const i=` <button class="position-absolute __delete__file __delete__file__btn"\n                    data-index="${e}"\n                    data-event-name="deleteFileItemEvent"\n                    type="button"><i class="fas fa-times"></i></button>\n                    `;$(this.$fileListEl).find(`.file__item[data-index=${e}]`).append(i)}createHiddenInputs(e){let t="";this.is_multiple&&(t="[]"),this.$fileHiddenInputsBox.append(`<input type="hidden" name="${this.inputName}${t}" value="${e.name}">`)}errorHandler(e,t){if($(this.$fileListEl).find(`.file__item[data-index=${t}]`).find(".progress-bar").addClass("bg-danger"),e.response&&e.response.data.errors){this.$fileErrorBox.show(),e=e.response.data;for(const i of Object.entries(e.errors))this.$fileErrorBox.find("ul").append(`<li data-index="${t}">File :${t} ${i}</li>`)}}progressBar(e,t){$(this.$fileListEl).find(`.file__item[data-index=${t}] .file__progress .progress-bar`).css({width:`${e}%`}).attr("aria-valuenow",e).html(`${e}%`)}createPreviewBlock(e){const t=`\n            <div class="file__item d-flex justify-content-center position-relative mt-2" data-index="${e}">\n                <div class="progress file__progress ">\n                    <div class="progress-bar"\n                         role="progressbar"\n                         style="width: 0%;"\n                         aria-valuenow="0"\n                         aria-valuemin="0"\n                         aria-valuemax="100">\n                        0%\n                    </div>\n                </div>\n            </div>\n    `;this.$fileListEl.append(t)}createHtmlForFile(e){return"image"===e.file_type?`<img src="${e.file_url}" alt="${e.original_name}" class="upload-file-img">`:`<span class="mr-5 text-primary p-2">${e.original_name}</span>`}deleteFileHandler(e){const t=e.target,i=$(t).data("index");this.$fileErrorBox.find(`ul li[data-index="${i}"]`).remove(),this.$fileErrorBox.find("ul li").length||this.$fileErrorBox.hide(),$(t).closest(".file__item").remove(),this.$fileHiddenInputsBox.html(""),this.deleteFileEvent()}deleteFileEvent(){window.addEventListener("deleteFileItemInDbEvent",(e=>{const t=e.detail.element;$(t).parents(".__uploaded__files").find(".file__item").length<2&&$(t).parents(".__uploaded__files").remove(),$(t).parents(".file__item").remove()}))}}}}}));
//# sourceMappingURL=FileUploader-legacy-B3O4JNFb.js.map
