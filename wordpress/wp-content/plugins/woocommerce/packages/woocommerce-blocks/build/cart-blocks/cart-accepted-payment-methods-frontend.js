(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[17],{27:function(e,t,a){"use strict";a.d(t,"a",(function(){return o}));var s=a(0),n=a(12),c=a.n(n);function o(e){const t=Object(s.useRef)(e);return c()(e,t.current)||(t.current=e),t.current}},310:function(e,t){},313:function(e,t,a){"use strict";a.d(t,"b",(function(){return l})),a.d(t,"a",(function(){return r}));var s=a(27),n=a(17),c=a(4),o=a(3);const i=function(){let e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];const{paymentMethodsInitialized:t,expressPaymentMethodsInitialized:a,availablePaymentMethods:i,availableExpressPaymentMethods:l}=Object(c.useSelect)(e=>{const t=e(o.PAYMENT_STORE_KEY);return{paymentMethodsInitialized:t.paymentMethodsInitialized(),expressPaymentMethodsInitialized:t.expressPaymentMethodsInitialized(),availableExpressPaymentMethods:t.getAvailableExpressPaymentMethods(),availablePaymentMethods:t.getAvailablePaymentMethods()}}),r=Object.values(i).map(e=>{let{name:t}=e;return t}),d=Object.values(l).map(e=>{let{name:t}=e;return t}),m=Object(n.getPaymentMethods)(),p=Object(n.getExpressPaymentMethods)(),u=Object.keys(m).reduce((e,t)=>(r.includes(t)&&(e[t]=m[t]),e),{}),y=Object.keys(p).reduce((e,t)=>(d.includes(t)&&(e[t]=p[t]),e),{}),h=Object(s.a)(u),b=Object(s.a)(y);return{paymentMethods:e?b:h,isInitialized:e?a:t}},l=()=>i(!1),r=()=>i(!0)},315:function(e,t,a){"use strict";var s=a(11),n=a.n(s),c=a(0),o=a(5),i=a.n(o);const l=e=>"wc-block-components-payment-method-icon wc-block-components-payment-method-icon--"+e;var r=e=>{let{id:t,src:a=null,alt:s=""}=e;return a?Object(c.createElement)("img",{className:l(t),src:a,alt:s}):null},d=a(44);const m=[{id:"alipay",alt:"Alipay",src:d.l+"payment-methods/alipay.svg"},{id:"amex",alt:"American Express",src:d.l+"payment-methods/amex.svg"},{id:"bancontact",alt:"Bancontact",src:d.l+"payment-methods/bancontact.svg"},{id:"diners",alt:"Diners Club",src:d.l+"payment-methods/diners.svg"},{id:"discover",alt:"Discover",src:d.l+"payment-methods/discover.svg"},{id:"eps",alt:"EPS",src:d.l+"payment-methods/eps.svg"},{id:"giropay",alt:"Giropay",src:d.l+"payment-methods/giropay.svg"},{id:"ideal",alt:"iDeal",src:d.l+"payment-methods/ideal.svg"},{id:"jcb",alt:"JCB",src:d.l+"payment-methods/jcb.svg"},{id:"laser",alt:"Laser",src:d.l+"payment-methods/laser.svg"},{id:"maestro",alt:"Maestro",src:d.l+"payment-methods/maestro.svg"},{id:"mastercard",alt:"Mastercard",src:d.l+"payment-methods/mastercard.svg"},{id:"multibanco",alt:"Multibanco",src:d.l+"payment-methods/multibanco.svg"},{id:"p24",alt:"Przelewy24",src:d.l+"payment-methods/p24.svg"},{id:"sepa",alt:"Sepa",src:d.l+"payment-methods/sepa.svg"},{id:"sofort",alt:"Sofort",src:d.l+"payment-methods/sofort.svg"},{id:"unionpay",alt:"Union Pay",src:d.l+"payment-methods/unionpay.svg"},{id:"visa",alt:"Visa",src:d.l+"payment-methods/visa.svg"},{id:"wechat",alt:"WeChat",src:d.l+"payment-methods/wechat.svg"}];var p=a(28);a(310),t.a=e=>{let{icons:t=[],align:a="center",className:s}=e;const o=(e=>{const t={};return e.forEach(e=>{let a={};"string"==typeof e&&(a={id:e,alt:e,src:null}),"object"==typeof e&&(a={id:e.id||"",alt:e.alt||"",src:e.src||null}),a.id&&Object(p.a)(a.id)&&!t[a.id]&&(t[a.id]=a)}),Object.values(t)})(t);if(0===o.length)return null;const l=i()("wc-block-components-payment-method-icons",{"wc-block-components-payment-method-icons--align-left":"left"===a,"wc-block-components-payment-method-icons--align-right":"right"===a},s);return Object(c.createElement)("div",{className:l},o.map(e=>{const t={...e,...(a=e.id,m.find(e=>e.id===a)||{})};var a;return Object(c.createElement)(r,n()({key:"payment-method-icon-"+e.id},t))}))}},412:function(e,t,a){"use strict";a.d(t,"a",(function(){return s}));const s=e=>Object.values(e).reduce((e,t)=>(null!==t.icons&&(e=e.concat(t.icons)),e),[])},485:function(e,t,a){"use strict";a.r(t);var s=a(0),n=a(315),c=a(313),o=a(412);t.default=e=>{let{className:t}=e;const{paymentMethods:a}=Object(c.b)();return Object(s.createElement)(n.a,{className:t,icons:Object(o.a)(a)})}}}]);