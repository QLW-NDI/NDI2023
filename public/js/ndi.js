let i = 0;
let leftAnswer = document.getElementById("left-answer");
let rightAnswer = document.getElementById("right-answer");
let answers = document.getElementById("answers");
let explanation = document.getElementById("explanation");
let mainContent = document.getElementById("main-content");
let next = document.getElementById("next");
let contentBox = document.getElementById("content-box");
let answerBox = document.getElementById("answer-box");

function resizeAnswers(leftPercentage, rightPercentage) {
    leftAnswer.style.pointerEvents = "none";
    rightAnswer.style.pointerEvents = "none";
    leftAnswer.style.width = leftPercentage;
    leftAnswer.innerHTML = "<h1>"+leftPercentage+"</h1>";
    rightAnswer.style.width = rightPercentage;
    rightAnswer.innerHTML = "<h1>"+rightPercentage+"</h1>";
}

function showExplanation() {
    let children = explanation.children;
    answers.style.flex = "0 1 50px";
    setTimeout(function(){
        mainContent.style.height = "100%";
        explanation.style.padding = "20px 40px 20px 40px";
        explanation.style.height = "auto";
        contentBox.style.flex = "none";
        answerBox.style.width = "100%";
        Array.from(children).forEach(child => {
            child.style.fontSize = "initial"
        });
        setTimeout(function() {
            answerBox.style.width = "calc(100% - 100px)";
            next.style.width = "100px";
            next.style.marginLeft = "10px";
            next.style.fontSize = "xxx-large";
        }, 2000);
    }, 500);
}

function resetAnswers() {
    let children = explanation.children;
    next.style.width = "0";
    next.style.marginLeft = "0";
    next.style.fontSize = "0";
    answerBox.style.width = "100%";
    setTimeout(function(){
        contentBox.style.flex= "1 1 auto";
        Array.from(children).forEach(child => {
            child.style.fontSize = "0"
        });
        explanation.style.padding = "0";
        explanation.style.height = "0";
        mainContent.style.height = "calc(100% - 10vw)";
        answers.style.flex= "1 1 auto";
        leftAnswer.style.width = "50%";
        leftAnswer.innerHTML = "<h1>"+"réponse 1"+"</h1>";
        rightAnswer.style.width = "50%";
        rightAnswer.innerHTML = "<h1>"+"réponse 2"+"</h1>";
        leftAnswer.style.pointerEvents = "auto";
        rightAnswer.style.pointerEvents = "auto";
    }, 500);
}

const handleOnLeftAnswerClick = e => {
    resizeAnswers("20%", "80%");
    setTimeout(showExplanation, 1000);
}

const handleOnRightAnswerClick = e => {
    resizeAnswers("100%", "0%");
    setTimeout(showExplanation, 1000);
}

const handleOnNextClick = e => {
    resetAnswers();
}

leftAnswer.onclick = e => handleOnLeftAnswerClick(e);
rightAnswer.onclick = e => handleOnRightAnswerClick(e);
next.onclick = e => handleOnNextClick(e);