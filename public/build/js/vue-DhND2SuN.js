import{r as d,i as f,N as t,g as a,e as g,c as l,a as y}from"./@vue-LqcVDoeS.js";/**
* vue v3.5.13
* (c) 2018-present Yuxi (Evan) You and Vue contributors
* @license MIT
**/const u=Object.create(null);function C(n,r){if(!f(n))if(n.nodeType)n=n.innerHTML;else return t;const c=a(n,r),i=u[c];if(i)return i;if(n[0]==="#"){const e=document.querySelector(n);n=e?e.innerHTML:""}const o=g({hoistStatic:!0,onError:void 0,onWarn:t},r);!o.isCustomElement&&typeof customElements<"u"&&(o.isCustomElement=e=>!!customElements.get(e));const{code:m}=l(n,o),s=new Function("Vue",m)(y);return s._rc=!0,u[c]=s}d(C);
//# sourceMappingURL=vue-DhND2SuN.js.map
