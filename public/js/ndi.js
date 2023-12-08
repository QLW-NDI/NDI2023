let validAnswer = 0;
let leftAnswer = document.getElementById("left-answer");
let rightAnswer = document.getElementById("right-answer");
let question = document.getElementById("question")

let answers = document.getElementById("answers");
let explanation = document.getElementById("explanation");
let mainContent = document.getElementById("main-content");
let next = document.getElementById("next");
let contentBox = document.getElementById("content-box");
let answerBox = document.getElementById("answer-box");

let explanationText = document.getElementById("explanationText");

window.onload = function () {
    loadQuestionsData();
};

let array;

function resizeAnswers() {
    leftAnswer.style.pointerEvents = "none";
    rightAnswer.style.pointerEvents = "none";
    leftAnswer.style.width = leftPercentage;
    leftAnswer.innerHTML = "<h1>"+leftPercentage+"</h1>";
    rightAnswer.style.width = rightPercentage;
    rightAnswer.innerHTML = "<h1>"+rightPercentage+"</h1>";
    resetPercent();
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
        explanationText.style.fontSize = "large";
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
        rightAnswer.style.width = "50%";
        leftAnswer.style.pointerEvents = "auto";
        rightAnswer.style.pointerEvents = "auto";
        setTimeout(fillQuestionsFields, 500);
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

function resetPercent(){
    leftPercentage = 0;
    rightPercentage = 0;
}

function fillLeftPanel(strToPut) {
    leftAnswer.innerHTML = "<h1>" + strToPut + "</h1>";
}

function fillRightPanel(strToPut) {
    rightAnswer.innerHTML = "<h1>" + strToPut + "</h1>";
}

function loadQuestionsData() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            array = data.array;
            console.log(array);
        }
    };

    xhr.open('POST', 'getQuestionContent', false);
    xhr.send();

    fillQuestionsFields();

}

function fillQuestionsFields() {
    if (array.length !== 0) {
        question.innerHTML = "<h1>" + array[0].question + "</h1>";
        if (Math.random() < 0.5) {
            rightAnswer.innerHTML = "<h1>" + array[0].answerFalse + "</h1>";
            leftAnswer.innerHTML = "<h1>" + array[0].answerTrue + "</h1>";
            leftPercentage =  array[0].nbClickTrue / (array[0].nbClickTrue + array[0].nbClickFalse) * 100;
            rightPercentage =  array[0].nbClickFalse / (array[0].nbClickTrue + array[0].nbClickFalse) * 100;
            rightPercentage = Math.round(rightPercentage)+"%";
            leftPercentage = Math.round(leftPercentage)+"%";

        } else {
            rightAnswer.innerHTML = "<h1>" + array[0].answerTrue + "</h1>";
            leftAnswer.innerHTML = "<h1>" + array[0].answerFalse + "</h1>";
            rightPercentage =  array[0].nbClickTrue / (array[0].nbClickTrue + array[0].nbClickFalse) *100;
            leftPercentage =  array[0].nbClickFalse / (array[0].nbClickTrue + array[0].nbClickFalse) *100;
            rightPercentage = Math.round(rightPercentage)+"%";
            leftPercentage = Math.round(leftPercentage)+"%";
        }
        explanationText.innerHTML = array[0].explanation;
        array.shift();
    }
}


leftAnswer.onclick = e => {
    if (leftAnswer.innerText === array[0].answerTrue) {
        validAnswer ++;
        incrementValid();
    } else {
        incrementFalse();
    }
    handleOnLeftAnswerClick(e);
};
rightAnswer.onclick = e => {
    if (rightAnswer.innerText === array[0].answerTrue) {
        validAnswer ++;
        incrementValid();
    } else {
        incrementFalse();
    }
    handleOnRightAnswerClick(e);
};

next.onclick = function (){
    fillQuestionsFields();
}
next.onclick = e => {
    array.shift();
    handleOnNextClick(e);
};

function incrementValid() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            array = data.array;
        }
    };
    xhr.open('POST', 'incrementTrue/' + array[0].id, false);
    xhr.send();
}

function incrementFalse() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            array = data.array;
        }
    };
    xhr.open('POST', 'incrementFalse/' + array[0].id, false);
    xhr.send();
}