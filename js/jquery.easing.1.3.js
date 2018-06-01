jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(t,e,i,s,n){return jQuery.easing[jQuery.easing.def](t,e,i,s,n)},easeInQuad:function(t,e,i,s,n){return s*(e/=n)*e+i},easeOutQuad:function(t,e,i,s,n){return-s*(e/=n)*(e-2)+i},easeInOutQuad:function(t,e,i,s,n){return(e/=n/2)<1?s/2*e*e+i:-s/2*(--e*(e-2)-1)+i},easeInCubic:function(t,e,i,s,n){return s*(e/=n)*e*e+i},easeOutCubic:function(t,e,i,s,n){return s*((e=e/n-1)*e*e+1)+i},easeInOutCubic:function(t,e,i,s,n){return(e/=n/2)<1?s/2*e*e*e+i:s/2*((e-=2)*e*e+2)+i},easeInQuart:function(t,e,i,s,n){return s*(e/=n)*e*e*e+i},easeOutQuart:function(t,e,i,s,n){return-s*((e=e/n-1)*e*e*e-1)+i},easeInOutQuart:function(t,e,i,s,n){return(e/=n/2)<1?s/2*e*e*e*e+i:-s/2*((e-=2)*e*e*e-2)+i},easeInQuint:function(t,e,i,s,n){return s*(e/=n)*e*e*e*e+i},easeOutQuint:function(t,e,i,s,n){return s*((e=e/n-1)*e*e*e*e+1)+i},easeInOutQuint:function(t,e,i,s,n){return(e/=n/2)<1?s/2*e*e*e*e*e+i:s/2*((e-=2)*e*e*e*e+2)+i},easeInSine:function(t,e,i,s,n){return-s*Math.cos(e/n*(Math.PI/2))+s+i},easeOutSine:function(t,e,i,s,n){return s*Math.sin(e/n*(Math.PI/2))+i},easeInOutSine:function(t,e,i,s,n){return-s/2*(Math.cos(Math.PI*e/n)-1)+i},easeInExpo:function(t,e,i,s,n){return 0==e?i:s*Math.pow(2,10*(e/n-1))+i},easeOutExpo:function(t,e,i,s,n){return e==n?i+s:s*(1-Math.pow(2,-10*e/n))+i},easeInOutExpo:function(t,e,i,s,n){return 0==e?i:e==n?i+s:(e/=n/2)<1?s/2*Math.pow(2,10*(e-1))+i:s/2*(2-Math.pow(2,-10*--e))+i},easeInCirc:function(t,e,i,s,n){return-s*(Math.sqrt(1-(e/=n)*e)-1)+i},easeOutCirc:function(t,e,i,s,n){return s*Math.sqrt(1-(e=e/n-1)*e)+i},easeInOutCirc:function(t,e,i,s,n){return(e/=n/2)<1?-s/2*(Math.sqrt(1-e*e)-1)+i:s/2*(Math.sqrt(1-(e-=2)*e)+1)+i},easeInElastic:function(t,e,i,s,n){var o=1.70158,a=0,r=s;if(0==e)return i;if(1==(e/=n))return i+s;if(a||(a=.3*n),r<Math.abs(s)){r=s;o=a/4}else o=a/(2*Math.PI)*Math.asin(s/r);return-r*Math.pow(2,10*(e-=1))*Math.sin((e*n-o)*(2*Math.PI)/a)+i},easeOutElastic:function(t,e,i,s,n){var o=1.70158,a=0,r=s;if(0==e)return i;if(1==(e/=n))return i+s;if(a||(a=.3*n),r<Math.abs(s)){r=s;o=a/4}else o=a/(2*Math.PI)*Math.asin(s/r);return r*Math.pow(2,-10*e)*Math.sin((e*n-o)*(2*Math.PI)/a)+s+i},easeInOutElastic:function(t,e,i,s,n){var o=1.70158,a=0,r=s;if(0==e)return i;if(2==(e/=n/2))return i+s;if(a||(a=n*(.3*1.5)),r<Math.abs(s)){r=s;o=a/4}else o=a/(2*Math.PI)*Math.asin(s/r);return e<1?r*Math.pow(2,10*(e-=1))*Math.sin((e*n-o)*(2*Math.PI)/a)*-.5+i:r*Math.pow(2,-10*(e-=1))*Math.sin((e*n-o)*(2*Math.PI)/a)*.5+s+i},easeInBack:function(t,e,i,s,n,o){return void 0==o&&(o=1.70158),s*(e/=n)*e*((o+1)*e-o)+i},easeOutBack:function(t,e,i,s,n,o){return void 0==o&&(o=1.70158),s*((e=e/n-1)*e*((o+1)*e+o)+1)+i},easeInOutBack:function(t,e,i,s,n,o){return void 0==o&&(o=1.70158),(e/=n/2)<1?s/2*(e*e*((1+(o*=1.525))*e-o))+i:s/2*((e-=2)*e*((1+(o*=1.525))*e+o)+2)+i},easeInBounce:function(t,e,i,s,n){return s-jQuery.easing.easeOutBounce(t,n-e,0,s,n)+i},easeOutBounce:function(t,e,i,s,n){return(e/=n)<1/2.75?s*(7.5625*e*e)+i:e<2/2.75?s*(7.5625*(e-=1.5/2.75)*e+.75)+i:e<2.5/2.75?s*(7.5625*(e-=2.25/2.75)*e+.9375)+i:s*(7.5625*(e-=2.625/2.75)*e+.984375)+i},easeInOutBounce:function(t,e,i,s,n){return e<n/2?.5*jQuery.easing.easeInBounce(t,2*e,0,s,n)+i:.5*jQuery.easing.easeOutBounce(t,2*e-n,0,s,n)+.5*s+i}});