function o(){import.meta.url,import("_").catch(()=>1),async function*(){}().next()}const a=new Modal("cropImageModal");class n{constructor(){this.init()}init(){this.deleteFileEvent(),this.$_functions()}$_functions(){$("body").on("click",".__delete__file__btn",this.deleteFileHandler.bind(this)),$("input[type=file].temp-file-type").change(this.fileChangeHandle.bind(this))}getAttribute(e){return this.$el.getAttribute("data-".concat(e))}fileChangeHandle(){this.$el=event.target,this.$fileListEl=$(this.$el).siblings("div.__file__list__default"),this.$fileErrorBox=$(this.$el).siblings("div.error-messages-block"),this.$fileHiddenInputsBox=$(this.$el).siblings(".hidden-file-inputs"),this.resetUploader(),this.fileData=this.$el.files,this.filename="",$(this.$el).data("has-crop")?(typeof this.cropContainer>"u"&&(this.initCroppie(),this.cropModalActions()),this.cropperImageChange()):(this.removeOldUploadedFiles(),this.generateFormDataForFiles()),this.$el.value=""}removeOldUploadedFiles(){this.is_multiple=this.$el.getAttribute("multiple")!==null,this.is_multiple||$(this.$el).siblings(".__uploaded__files").remove()}initCroppie(){this.cropContainer=$(".crop-img-container").croppie({enableExif:!0,viewport:{width:200,height:200,type:"circle"},boundary:{width:300,height:300}})}cropperImageChange(){a.show();const e=new FileReader;e.onload=t=>{this.cropContainer.croppie("bind",{url:t.target.result})},e.readAsDataURL(this.fileData[0]),this.filename=this.fileData[0].name}cropModalActions(){a.save(()=>{this.cropContainer.croppie("result",{type:"canvas",size:"viewport"}).then(e=>{this.removeOldUploadedFiles();const t=new FormData;t.append("config_key","".concat(this.getAttribute("config-key"),".").concat(this.getAttribute("name"))),t.append("file",e),t.append("name",this.filename),this.sendData(t,0),this.inputName=this.getAttribute("name"),a.hide()})})}resetUploader(){this.$fileListEl.html(""),this.$fileErrorBox.find("ul").html(""),this.$fileErrorBox.hide(),this.$fileHiddenInputsBox.html("")}generateFormDataForFiles(){if(this.fileData){this.inputName=this.getAttribute("name");const e=this.getAttribute("config-key");for(const[t,i]of Object.entries(this.fileData)){const s=new FormData;s.append("config_key","".concat(e,".").concat(this.inputName)),s.append("file",i),this.sendData(s,t)}}}async sendData(e,t){this.createPreviewBlock(t),await axios.post(route("dashboard.files.storeTempFile"),e,{onUploadProgress:i=>{const s=i.lengthComputable?i.total:i.target.getResponseHeader("content-length")||i.target.getResponseHeader("x-decompressed-content-length");if(s!==null){const l=Math.round(i.loaded*100/s);this.progressBar(l,t)}}}).then(i=>{i=i.data,this.setPreviewValue(i,t),this.appendDeleteBtn(t),this.createHiddenInputs(i)}).catch(i=>{this.errorHandler(i,t),this.appendDeleteBtn(t,!0)})}setPreviewValue(e,t){const i=$(this.$fileListEl).find(".file__item[data-index=".concat(t,"]"));i.addClass("file__item__type__".concat(e.file_type)),i.html(this.createHtmlForFile(e))}appendDeleteBtn(e,t=!1){const i=$(this.$fileListEl).find(".file__item[data-index=".concat(e,"]")),s=' <button class="position-absolute __delete__file __delete__file__btn"\n                    data-index="'.concat(e,'"\n                    data-event-name="deleteFileItemEvent"\n                    type="button"><i class="fas fa-times"></i></button>\n                    ');i.append(s)}createHiddenInputs(e){let t="";this.is_multiple&&(t="[]"),this.$fileHiddenInputsBox.append('<input type="hidden" name="'.concat(this.inputName).concat(t,'" value="').concat(e.name,'">'))}errorHandler(e,t){if($(this.$fileListEl).find(".file__item[data-index=".concat(t,"]")).find(".progress-bar").addClass("bg-danger"),e.response&&e.response.data.errors){this.$fileErrorBox.show(),e=e.response.data;for(const s of Object.entries(e.errors))this.$fileErrorBox.find("ul").append('<li data-index="'.concat(t,'">File :').concat(t," ").concat(s,"</li>"))}}progressBar(e,t){$(this.$fileListEl).find(".file__item[data-index=".concat(t,"] .file__progress .progress-bar")).css({width:"".concat(e,"%")}).attr("aria-valuenow",e).html("".concat(e,"%"))}createPreviewBlock(e){const t='\n            <div class="file__item d-flex justify-content-center position-relative mt-2" data-index="'.concat(e,'">\n                <div class="progress file__progress ">\n                    <div class="progress-bar"\n                         role="progressbar"\n                         style="width: 0%;"\n                         aria-valuenow="0"\n                         aria-valuemin="0"\n                         aria-valuemax="100">\n                        0%\n                    </div>\n                </div>\n            </div>\n    ');this.$fileListEl.append(t)}createHtmlForFile(e){switch(e.file_type){case"image":return'<img src="'.concat(e.file_url,'" alt="').concat(e.original_name,'" class="upload-file-img">');default:return'<span class="mr-5 text-primary p-2">'.concat(e.original_name,"</span>")}}deleteFileHandler(e){const t=e.target,i=$(t).data("index");this.$fileErrorBox.find('ul li[data-index="'.concat(i,'"]')).remove(),this.$fileErrorBox.find("ul li").length||this.$fileErrorBox.hide(),$(t).closest(".file__item").remove(),this.$fileHiddenInputsBox.html(""),this.deleteFileEvent()}deleteFileEvent(){window.addEventListener("deleteFileItemInDbEvent",e=>{const t=e.detail.element;$(t).parents(".__uploaded__files").find(".file__item").length<2&&$(t).parents(".__uploaded__files").remove(),$(t).parents(".file__item").remove()})}}new n;export{o as __vite_legacy_guard};
//# sourceMappingURL=FileUploader-BPLsGyw_.js.map
