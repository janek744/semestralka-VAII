async function getFilters() {
    var xmlHttp = new XMLHttpRequest();
    //onreadystatechange - defines a function to be called when the readyState property changes
    xmlHttp.onreadystatechange = function () {
        //4: request finished and response is ready, 200: "OK"
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            document.getElementById('filters').innerHTML = this.responseText;
        }
    }
    let postId = document.getElementById('opt').value;

    console.log(postId);
    xmlHttp.open("GET", "?c=prispevky&a=refresh&postID=3", true);
    xmlHttp.send();
}