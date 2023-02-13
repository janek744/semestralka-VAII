async function getFilters() {
    var xmlHttp = new XMLHttpRequest();
    //onreadystatechange - defines a function to be called when the readyState property changes
    xmlHttp.onreadystatechange = function () {
        //4: request finished and response is ready, 200: "OK"
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            //if (id == )
                document.getElementById('filters').innerHTML = this.responseText;
        }
    }
    xmlHttp.open("GET", "?c=prispevky&a=refresh", true);
    xmlHttp.send();
}
//window.onload = getFilters();
/*window.onload = function() {
    let tlacitko = document.getElementById("tlacitko");
    getFilters();
    tlacitko.onclick = function () {
        print("aaaaaaaaaaaaa");
        getFilters();
    }
}*/
