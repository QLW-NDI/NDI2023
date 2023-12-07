var input = new Array();

var konamiCode = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];

document.onkeyup = function(e) {
    get = window.event?event:e;
    key = get.keyCode?get.keyCode:get.charCode;
    input.push(key);

    if (JSON.stringify(konamiCode) === JSON.stringify(input)){
        console.log("KONAMI CODE REUSSI");
    }
    if (input.length >= konamiCode.length){
        input.shift();
    }
}
