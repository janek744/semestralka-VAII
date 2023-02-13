async function getMaterials() {
    var xmlHttp = new XMLHttpRequest();
    //onreadystatechange - defines a function to be called when the readyState property changes
    xmlHttp.onreadystatechange = function () {
        //4: request finished and response is ready, 200: "OK"
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            document.getElementById('opt').innerHTML = this.responseText;
        }
    }
    xmlHttp.open("GET", "?c=prispevky&a=filteredPosts", true);
    xmlHttp.send();
}
