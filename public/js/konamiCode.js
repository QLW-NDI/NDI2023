var input = new Array();

var konamiCode = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];

document.onkeyup = function(e) {
    get = window.event?event:e;
    key = get.keyCode?get.keyCode:get.charCode;
    input[input.length] = key

    console.log(JSON.stringify(konamiCode) === JSON.stringify(input));
    console.log(JSON.stringify(konamiCode));
    console.log(JSON.stringify(input));

    if (JSON.stringify(konamiCode) === JSON.stringify(input)){
        console.log("KONAMI CODE REUSSI");
    }

    console.log(input)
}
