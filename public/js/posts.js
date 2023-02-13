window.onresize = function() {
    /*let text = "fdsdsf";
    document.getElementById("formtext").innerHTML = text;*/
    //document.getElementById('formtext').innerHTML=editedText;
    //document.getElementById("formtext").innerHTML = name;
    //540
    /*let fname = document.getElementById("formtext");

    if (window.innerWidth > 720) {
        fname.style.fontSize = "40px";
    }
    if (window.innerWidth > 960) {
        fname.style.fontSize = "60px";
    }
    if (window.innerWidth > 1140) {
        fname.style.fontSize = "20px";
    }*/
    let fname = document.getElementById("formtext");

    if (window.innerWidth > 720) {
        fname.style.fontSize = "40px";
    }
    if (window.innerWidth > 960) {
        fname.style.fontSize = "60px";
    }
    if (window.innerWidth > 1140) {
        fname.style.fontSize = "20px";
    }
}

function deletePost(id) {
    if (confirm("Chcete zamazať príspevok?")) {
        window.location.href = "?c=prispevky&a=delete&id="+ id;
    }
    return false;
}

function myFunction() {
    let fname = document.getElementById("formtext");

    if (window.innerWidth > 720) {
        fname.style.fontSize = "40px";
    }
    if (window.innerWidth > 960) {
        fname.style.fontSize = "60px";
    }
    if (window.innerWidth > 1140) {
        fname.style.fontSize = "20px";
    }
    /*postText.style.fontSize = "px";
    canvas = document.createElement("canvas");
    context = canvas.getContext("2d");
    width = context.measureText(text).width;
    formattedWidth = Math.ceil(width);

    if (window.innerWidth > 1140) {
    editedText = text.slice(0, 2)
        postText.style.fontSize = "20px";
    }*/

    //document.getElementById("formtext").innerHTML = editedText;
    return false;
}