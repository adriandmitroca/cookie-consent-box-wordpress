!function(e,t){"object"==typeof exports&&"object"==typeof module?module.exports=t():"function"==typeof define&&define.amd?define("cookie-consent-box",[],t):"object"==typeof exports?exports["cookie-consent-box"]=t():e["cookie-consent-box"]=t()}("undefined"!=typeof self?self:this,function(){return function(e){function t(o){if(n[o])return n[o].exports;var i=n[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,t),i.l=!0,i.exports}var n={};return t.m=e,t.c=n,t.d=function(e,n,o){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:o})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=6)}([function(e,t,n){e.exports=!n(5)(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a})},function(e,t){e.exports=function(e){return"object"==typeof e?null!==e:"function"==typeof e}},function(e,t){var n=e.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=n)},function(e,t){var n=e.exports={version:"2.5.6"};"number"==typeof __e&&(__e=n)},function(e,t,n){var o=n(16),i=n(17),r=n(19),a=Object.defineProperty;t.f=n(0)?Object.defineProperty:function(e,t,n){if(o(e),t=r(t,!0),o(n),i)try{return a(e,t,n)}catch(e){}if("get"in n||"set"in n)throw TypeError("Accessors not supported!");return"value"in n&&(e[t]=n.value),e}},function(e,t){e.exports=function(e){try{return!!e()}catch(e){return!0}}},function(e,t,n){"use strict";function o(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0});var i=n(7),r=o(i),a=n(8),c=o(a),u=n(22),l=o(u),s=n(23),f=!1,d=function(){function e(t){(0,r.default)(this,e),f=!0;var n=window.CookieBoxConfig||t||{};this.box=document.createElement("div"),this.box.className="cookie-box",this.settings={backgroundColor:n.backgroundColor||"#3ea25f",textColor:n.textColor||"#fff",language:n.language||"en",containerWidth:n.containerWidth||1140,url:n.url||null,linkTarget:n.linkTarget||"_blank",cookieKey:n.cookieKey||"cookie-box",cookieExpireInDays:n.cookieExpireInDays||365,content:n.content||{}},this.dictionary=l.default[this.settings.language]}return(0,c.default)(e,[{key:"init",value:function(){var e=this;if(!this.dictionary)return void console.error(this.settings.language+" language is not supported");(0,s.readCookie)(this.settings.cookieKey)||(this.show(),document.querySelector(".cookie-box__button").addEventListener("click",function(){return e.hide()}))}},{key:"render",value:function(){var e=this.settings;return'\n    <div style="background-color: '+e.backgroundColor+"; color: "+e.textColor+'">\n      <div class="cookie-box__inner" style="max-width: '+e.containerWidth+'px; margin: 0 auto">\n        <div class="cookie-box__content">\n          <div class="cookie-box__icon">\n            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="46" viewBox="0 0 44 46"><path fill-rule="evenodd" fill-opacity="0.6" fill="currentColor" d="M42.841 24.2a3.933 3.933 0 0 1-5.573 0 3.998 3.998 0 0 1 0-5.607 3.939 3.939 0 0 1 5.573 0l.05.056v-.022a3.993 3.993 0 0 1-.05 5.573zm-1.288-4.245l-.039-.039-.001-.001a2.087 2.087 0 0 0-2.963.001 2.123 2.123 0 0 0 0 2.983 2.091 2.091 0 0 0 2.964 0 2.123 2.123 0 0 0 .039-2.944zm-1.566 15.443l.558.157a.94.94 0 0 1 .44 1.525 22.858 22.858 0 0 1-16.358 8.856C12.02 46.9 1.024 37.398.066 24.713-.892 12.028 8.551.963 21.158-.001a.932.932 0 0 1 .964.662c.273.712.563 1.452.88 2.142.221.535.508 1.039.853 1.503a17.208 17.208 0 0 0 4.33 3.448c2.836 1.761 5.216 3.236 5.433 8.282a10.412 10.412 0 0 1-.669 3.684c-.574 1.822-1.142 3.633.624 6.044.842 1.178.976 2.524 1.115 3.926.217 2.175.451 4.553 4.597 5.539l.702.169zm-7.127-5.507c-.111-1.138-.212-2.231-.769-2.977-2.324-3.196-1.616-5.456-.903-7.716.37-.974.568-2.007.586-3.05-.173-4.054-2.168-5.293-4.548-6.773a18.803 18.803 0 0 1-4.77-3.824 8.661 8.661 0 0 1-1.142-1.941c-.234-.515-.468-1.121-.697-1.682a20.969 20.969 0 0 0-6.971 2.04C3.22 9.119-1.081 21.8 4.038 32.29c5.12 10.491 17.722 14.819 28.148 9.668h-.011a21.11 21.11 0 0 0 6.464-4.945c-5.222-1.324-5.5-4.318-5.779-7.122zm-3.021 9.41a2.664 2.664 0 0 1-3.783-.006l-.006-.007a2.703 2.703 0 0 1 .006-3.806 2.666 2.666 0 0 1 1.895-.791l-.006-.005a2.676 2.676 0 0 1 1.891.786 2.715 2.715 0 0 1 .009 3.823l-.006.006zm-1.334-2.498a.822.822 0 0 0-1.167.004.833.833 0 0 0 .004 1.173.82.82 0 0 0 1.166-.003h.022a.836.836 0 0 0 .218-.561.84.84 0 0 0-.243-.613zm-4.483-17.902l-2.296-1.682a.948.948 0 0 1-.198-1.32.935.935 0 0 1 1.313-.199l2.296 1.682a.947.947 0 0 1 .197 1.32.934.934 0 0 1-1.312.199zm-8.169 11.344l-.056-.062a3.087 3.087 0 0 1 .056-4.295 3.045 3.045 0 0 1 4.324 0h.006a3.096 3.096 0 0 1 0 4.357 3.049 3.049 0 0 1-4.33 0zm3.003-3.045a1.197 1.197 0 0 0-1.671 0 1.216 1.216 0 0 0-.034 1.682l.039.034a1.193 1.193 0 0 0 1.672 0l-.006-.034a1.21 1.21 0 0 0 0-1.682zm.814-17.136a2.412 2.412 0 0 1-3.379-.058 2.456 2.456 0 0 1 .002-3.457l.01-.011a2.413 2.413 0 0 1 3.43.013 2.454 2.454 0 0 1-.002 3.457l-.061.056zM18.416 7.85a.568.568 0 0 0-.808 0l.028.028a.564.564 0 0 0 0 .813.556.556 0 0 0 .78 0v-.028a.578.578 0 0 0 0-.813zm-.797 31.097c.417.31.506.901.198 1.32a.935.935 0 0 1-1.312.2l-2.296-1.683a.947.947 0 0 1-.198-1.32.934.934 0 0 1 1.312-.199l2.296 1.682zm-4.087-23.233a.934.934 0 0 1-1.034-.822l-.334-2.837a.935.935 0 0 1 .816-1.04.932.932 0 0 1 1.034.821l.334 2.837a.936.936 0 0 1-.816 1.041zm-1.903 6.137l-.01.01c-.95.95-2.485.945-3.429-.01l-.01-.011a2.45 2.45 0 0 1 .01-3.449l.011-.01a2.413 2.413 0 0 1 3.428.01l.01.01a2.45 2.45 0 0 1-.01 3.45zm-1.313-2.111a.555.555 0 0 0-.788-.008.563.563 0 0 0-.008.793.555.555 0 0 0 .788.008.562.562 0 0 0 .008-.793zm-2.482 5.413l.334 2.838a.936.936 0 0 1-.816 1.04.934.934 0 0 1-1.034-.822l-.334-2.837a.935.935 0 0 1 .816-1.04.932.932 0 0 1 1.034.821zM34.387 7.81a2.412 2.412 0 0 1-3.377-.056l-.002-.002a2.456 2.456 0 0 1 .002-3.457 2.415 2.415 0 0 1 3.441.002 2.455 2.455 0 0 1-.003 3.457l-.061.056zm-1.204-2.118a.554.554 0 0 0-.787-.02.563.563 0 0 0-.021.793.556.556 0 0 0 .78 0v-.028l.028.028a.563.563 0 0 0 0-.773z"/></svg>\n          </div>\n          <div class="cookie-box__content__inner">\n            <p class="cookie-box__title">'+(e.content.title||l.default[e.language].title)+'</p>\n            <div class="cookie-box__desc">\n              '+(e.content.content||l.default[e.language].content)+"\n              "+(e.url?'<a href="'+e.url+'" target="'+e.linkTarget+'">'+(e.content.learnMore||l.default[e.language].learnMore)+" &raquo;</a>":"")+'\n            </div>\n            </div> \n          </div>\n        <div class="cookie-box__buttons">\n          <button class="cookie-box__button">\n          <span>'+(e.content.accept||l.default[e.language].accept)+'</span>\n          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17"><path fill-rule="evenodd" fill="currentColor" d="M17.756 2.096l-8.597 8.5a.784.784 0 0 1-.553.226c-.2 0-.4-.075-.553-.226L5.709 8.278a.765.765 0 0 1 0-1.093.787.787 0 0 1 1.105 0l1.792 1.772 8.045-7.953a.787.787 0 0 1 1.105 0 .766.766 0 0 1 0 1.092zm-6.287.052a7.065 7.065 0 0 0-2.859-.603h-.004c-3.877 0-7.032 3.117-7.034 6.951-.002 3.834 3.151 6.956 7.03 6.959h.004c3.877 0 7.032-3.118 7.034-6.951v-.718c0-.427.35-.773.782-.773.432 0 .781.346.781.773v.718C17.201 13.19 13.344 17 8.606 17h-.005C3.86 16.997.006 13.181.009 8.495.011 3.81 3.868 0 8.606 0h.005a8.629 8.629 0 0 1 3.495.736.77.77 0 0 1 .395 1.02.786.786 0 0 1-1.032.392z"/></svg>            </button>\n        </div>\n      </div>\n    </div>\n    '}},{key:"show",value:function(){this.box.innerHTML=this.render(),document.body.appendChild(this.box)}},{key:"hide",value:function(){var e=this;this.box.classList.add("hidden"),(0,s.createCookie)(this.settings.cookieKey,!0,this.settings.cookieExpireInDays),setTimeout(function(){e.box.remove()},800)}}]),e}();if(t.default=d,"undefined"!=typeof window)var p=setInterval(function(){"complete"===document.readyState&&(clearInterval(p),f||(new d).init())},50)},function(e,t,n){"use strict";t.__esModule=!0,t.default=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}},function(e,t,n){"use strict";t.__esModule=!0;var o=n(9),i=function(e){return e&&e.__esModule?e:{default:e}}(o);t.default=function(){function e(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),(0,i.default)(e,o.key,o)}}return function(t,n,o){return n&&e(t.prototype,n),o&&e(t,o),t}}()},function(e,t,n){e.exports={default:n(10),__esModule:!0}},function(e,t,n){n(11);var o=n(3).Object;e.exports=function(e,t,n){return o.defineProperty(e,t,n)}},function(e,t,n){var o=n(12);o(o.S+o.F*!n(0),"Object",{defineProperty:n(4).f})},function(e,t,n){var o=n(2),i=n(3),r=n(13),a=n(15),c=n(21),u=function(e,t,n){var l,s,f,d=e&u.F,p=e&u.G,v=e&u.S,h=e&u.P,y=e&u.B,g=e&u.W,b=p?i:i[t]||(i[t]={}),m=b.prototype,x=p?o:v?o[t]:(o[t]||{}).prototype;p&&(n=t);for(l in n)(s=!d&&x&&void 0!==x[l])&&c(b,l)||(f=s?x[l]:n[l],b[l]=p&&"function"!=typeof x[l]?n[l]:y&&s?r(f,o):g&&x[l]==f?function(e){var t=function(t,n,o){if(this instanceof e){switch(arguments.length){case 0:return new e;case 1:return new e(t);case 2:return new e(t,n)}return new e(t,n,o)}return e.apply(this,arguments)};return t.prototype=e.prototype,t}(f):h&&"function"==typeof f?r(Function.call,f):f,h&&((b.virtual||(b.virtual={}))[l]=f,e&u.R&&m&&!m[l]&&a(m,l,f)))};u.F=1,u.G=2,u.S=4,u.P=8,u.B=16,u.W=32,u.U=64,u.R=128,e.exports=u},function(e,t,n){var o=n(14);e.exports=function(e,t,n){if(o(e),void 0===t)return e;switch(n){case 1:return function(n){return e.call(t,n)};case 2:return function(n,o){return e.call(t,n,o)};case 3:return function(n,o,i){return e.call(t,n,o,i)}}return function(){return e.apply(t,arguments)}}},function(e,t){e.exports=function(e){if("function"!=typeof e)throw TypeError(e+" is not a function!");return e}},function(e,t,n){var o=n(4),i=n(20);e.exports=n(0)?function(e,t,n){return o.f(e,t,i(1,n))}:function(e,t,n){return e[t]=n,e}},function(e,t,n){var o=n(1);e.exports=function(e){if(!o(e))throw TypeError(e+" is not an object!");return e}},function(e,t,n){e.exports=!n(0)&&!n(5)(function(){return 7!=Object.defineProperty(n(18)("div"),"a",{get:function(){return 7}}).a})},function(e,t,n){var o=n(1),i=n(2).document,r=o(i)&&o(i.createElement);e.exports=function(e){return r?i.createElement(e):{}}},function(e,t,n){var o=n(1);e.exports=function(e,t){if(!o(e))return e;var n,i;if(t&&"function"==typeof(n=e.toString)&&!o(i=n.call(e)))return i;if("function"==typeof(n=e.valueOf)&&!o(i=n.call(e)))return i;if(!t&&"function"==typeof(n=e.toString)&&!o(i=n.call(e)))return i;throw TypeError("Can't convert object to primitive value")}},function(e,t){e.exports=function(e,t){return{enumerable:!(1&e),configurable:!(2&e),writable:!(4&e),value:t}}},function(e,t){var n={}.hasOwnProperty;e.exports=function(e,t){return n.call(e,t)}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o={de:{title:"Cookie-Richtlinie",content:"Unsere Website verwendet Cookies, um zu analysieren, wie die Site verwendet wird, und um sicherzustellen, dass Ihre Benutzererfahrung bei nachfolgenden Besuchen konsistent ist.",accept:"Zustimmen",learnMore:"Mehr erfahren"},en:{title:"Cookies policy",content:"Our website uses cookies to analyse how the site is used and to ensure your experience is consistent between visits.",accept:"Accept",learnMore:"Learn more"},it:{title:"Polizza cookie",content:"Il nostro sito utilizza cookie per analizzare le tue abitudini e per assicurarsi che la tua esperienza sia consistente tra le visite.",accept:"Accetta",learnMore:"Altre informazioni"},fr:{title:"Politiques d'utilisation des cookies",content:"Notre site web utilise des cookies pour analyser son utilisation et vous permettre ainsi d'obtenir une expérience de qualité.",accept:"Accepter",learnMore:"En apprendre plus"},pt:{title:"Política de Cookies",content:"O nosso website utiliza Cookies para analisar a forma como o mesmo é utilizado e garantir uma experiência consistente e de qualidade para todos os visitantes.",accept:"Aceitar",learnMore:"Saber mais"},pl:{title:"Polityka cookies",content:"Nasza strona używa ciasteczek do analizy statystyk i zapewnienia takiego samego działania pomiędzi wizytami.",accept:"Akceptuję",learnMore:"Czytaj więcej"},ro:{title:"Politica de utilizare Cookie-uri‎",content:"Site-ul nostru utilizează module cookie și alte tehnologii similare pentru a optimiza funcţionalitatea si a îmbunătăţi experienţa de navigare.",accept:"Acceptă",learnMore:"Află mai multe"}};t.default=o},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=function(e,t,n){var o=void 0;if(n){var i=new Date;i.setTime(i.getTime()+24*n*60*60*1e3),o="; expires="+i.toGMTString()}else o="";document.cookie=e+"="+t+o+"; path=/"},i=function(e){for(var t=e+"=",n=document.cookie.split(";"),o=0;o<n.length;o+=1){for(var i=n[o];" "===i.charAt(0);)i=i.substring(1,i.length);if(0===i.indexOf(t))return i.substring(t.length,i.length)}return null};t.createCookie=o,t.readCookie=i}])});