let i = 0;
let leftAnswer = document.getElementById("left-answer");
let rightAnswer = document.getElementById("right-answer");

let answers = document.getElementById("answers");
let explanation = document.getElementById("explanation");
let mainContent = document.getElementById("main-content");

function resizeAnswers(leftPercentage, rightPercentage) {
    leftAnswer.style.width = leftPercentage;
    leftAnswer.innerHTML = "<h1>"+leftPercentage+"</h1>";
    rightAnswer.style.width = rightPercentage;
    rightAnswer.innerHTML = "<h1>"+rightPercentage+"</h1>";
}

function showExplanation() {
    answers.style.flex = "0 1 50px";
    // mainContent.style.margin = "0 10vw 0 10vw";
    setTimeout(function(){
        mainContent.style.height = "100%";
        explanation.style.flex = "0 1 500px";
        // explanation.childNodes
    }, 500);
}

const handleOnLeftAnswerClick = e => {
    resizeAnswers("20%", "80%");
    // showExplanation();
    setTimeout(showExplanation, 1000);
}

const handleOnRightAnswerClick = e => {
    resizeAnswers("80%", "20%")
}

leftAnswer.onclick = e => handleOnLeftAnswerClick(e);
rightAnswer.onclick = e => handleOnRightAnswerClick(e);