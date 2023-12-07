var keys='';
document.onkeyup = function(e) {
    get = window.event?event:e;
    key = get.keyCode?get.keyCode:get.charCode;
    console.log(key)
    key = String.fromCharCode(key);
    //console.log(key)
    keys+=key;
}
window.setInterval(function(){
    console.log("ratio")
}, 100000);