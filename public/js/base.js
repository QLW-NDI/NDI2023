const handleOnMouseMove = e => {
    const {currentTarget: target } = e;

    const rect = target.getBoundingClientRect(),
        x = e.clientX - rect.left,
        y = e.clientY - rect.top;

    target.style.setProperty("--mouse-x", `${x}px`);
    target.style.setProperty("--mouse-y", `${y}px`);
}

for(const card of document.querySelectorAll(".light")) {
    card.onmousemove = e => handleOnMouseMove(e);
}

let wallpaper = document.getElementById("wallpaper");
let jo = document.getElementById("j-o");
let root = document.querySelector(':root');
let joBool = false;

function joTheme() {
    wallpaper.style.filter = "opacity(1)";
    root.style.setProperty('--left-card-color', 'rgb(15, 165, 224, 0.3)')
    root.style.setProperty('--right-card-color', 'rgb(255, 0, 0, 0.3)')
    // root.style.setProperty('--police-color', 'rgb(255, 0, 0, 0.3)')

}

function joThemeUnset() {
    wallpaper.style.filter = "opacity(0)";
    root.style.setProperty('--left-card-color', 'rgb(15, 165, 224)')
    root.style.setProperty('--right-card-color', 'rgb(255, 0, 0)')
    // root.style.setProperty('--police-color', 'rgb(255, 0, 0, 0.3)')

}

jo.onclick = function (){
    if (!joBool)
    {
        joTheme();
        joBool = true;
    }
    else {
        joThemeUnset();
        joBool = false;
    }
}