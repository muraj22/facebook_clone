<?php
include("headerjs.php");
?>
function retcount(t){
	if(t===undefined){
	t=1;
	}
	var retcount="";
	var x=1;
	while(x<=t){
var count=Math.random();
count=count.toString();
count=count.replace(".","");
retcount+=count;
x++;
	}
return retcount;	
}
function math_inc_dec(w,f){
if($(w).is(":input")===true){
var d=$(w).val();
}
else if($(w).html()===undefined){
var d=w;
}
else{
var d=$(w).html();	
}
d=parseInt(d);

if(f==0){
d=d-1;
}
else{
d=d+1;	
}

if($(w).is(":input")===true){
$(w).val(d);
}
else if($(w).html()===undefined){
return d;
}
else{
$(w).html(d);	
}
return false;
}

function decrease(w){
var d=math_inc_dec(w,0); //math increase decrease

if(d){
return d;
}

}

function increase(w){
var d=math_in_dec(w,1);	

if(d){
return d;
}

}

function strpos (haystack, needle, offset) {
   var i = (haystack + "").indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}
function replace_all(txt, replace, with_this) {
  return txt.replace(new RegExp(replace, 'g'),with_this);
}
function ucwords (str) {
  return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
    return $1.toUpperCase();
  });
}
function in_array (needle, haystack, argStrict) {
  var key = "",
    strict = !! argStrict;

  if (strict) {
    for (key in haystack) {
      if (haystack[key] === needle) {
        return true;
      }
    }
  } else {
    for (key in haystack) {
      if (haystack[key] == needle) {
        return true;
      }
    }
  }

  return false;
}

function count (mixed_var, mode) {
  var key, cnt = 0;

  if (mixed_var === null || typeof mixed_var === 'undefined') {
    return 0;
  } else if (mixed_var.constructor !== Array && mixed_var.constructor !== Object) {
    return 1;
  }

  if (mode === 'COUNT_RECURSIVE') {
    mode = 1;
  }
  if (mode != 1) {
    mode = 0;
  }

  for (key in mixed_var) {
    if (mixed_var.hasOwnProperty(key)) {
      cnt++;
      if (mode == 1 && mixed_var[key] && (mixed_var[key].constructor === Array || mixed_var[key].constructor === Object)) {
        cnt += this.count(mixed_var[key], 1);
      }
    }
  }

  return cnt;
}

function is_empty(w){
if(w=="{}"){
return "undefined";
}
else{
return w;
}
}
function strtolower (str) {
return (str + "").toLowerCase();
}
function jsonConcat(o1, o2) {
 for (var key in o2) {
  o1[key] = o2[key];
 }
 return o1;
}

function str_replace (search, replace, subject, count) {
  var i = 0,
    j = 0,
    temp = '',
    repl = '',
    sl = 0,
    fl = 0,
    f = [].concat(search),
    r = [].concat(replace),
    s = subject,
    ra = Object.prototype.toString.call(r) === '[object Array]',
    sa = Object.prototype.toString.call(s) === '[object Array]';
  s = [].concat(s);
  if (count) {
    this.window[count] = 0;
  }

  for (i = 0, sl = s.length; i < sl; i++) {
    if (s[i] === '') {
      continue;
    }
    for (j = 0, fl = f.length; j < fl; j++) {
      temp = s[i] + '';
      repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
      s[i] = (temp).split(f[j]).join(repl);
      if (count && s[i] !== temp) {
        this.window[count] += (temp.length - s[i].length) / f[j].length;
      }
    }
  }
  return sa ? s : s[0];
}
<?php include("endf.php"); ?>