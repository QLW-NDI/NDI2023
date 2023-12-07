var keys='';

var input = new Array();

var konamiCode = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];

document.onkeyup = function(e) {
    get = window.event?event:e;
    key = get.keyCode?get.keyCode:get.charCode;
    input[input.length+1] = key
    console.log(input)
    keys+=key;
}
window.setInterval(function(){
    console.log("ratio")
}, 100000);