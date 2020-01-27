var word = document.querySelector('#word');

addEventListener("keydown", keydownfunc, false);

function keydownfunc(event) {

    word.innerHTML = String.fromCharCode(event.keyCode);
    b();
}

var x = 0;
function b() {
    x++;
    document.all.word.style.fontSize = x + 'px';
    if (x < 45) {
        setTimeout("b()", 50);
    }
}