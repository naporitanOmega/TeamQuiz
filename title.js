var word = document.querySelector('#word');

addEventListener("keydown", keydownfunc, false);

function keydownfunc(event) {
    drawWord(String.fromCharCode(event.keyCode));
}

/* 文字埋め */
var mojiume = new Object();

mojiume.count = 0;
mojiume.limit = 1000;

mojiume.set = function () {
    //var span = document.body.get;

    //var i = 0;
    //for (i = 0; i < spans.length; i++) {
    //    spans[i].style.opacity -= 0.1;
    //}

    //alert(span.length);
};

function drawWord(string) {
    const div1 = document.getElementById("div1");

    var span = document.createElement("span");
    span.className = "mojiume";
    span.style.left = (Math.random() * 100) + "%";
    span.style.top = (Math.random() * 100) + "%";
    span.style.transform =
        "rotate(" + ((Math.random() * 120) - 60) + "deg)";
    span.textContent = string;

    document.body.appendChild(span);
    if (document.querySelectorAll(".mojiume").length >= mojiume.limit) {
        clearInterval(mojiume.tmr);
    }
};

mojiume.tmr = setInterval(mojiume.set, 5000);