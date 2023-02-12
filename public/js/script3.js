function showSuggestion(str){
    if (str.length == 0) {
        document.getElementById('output').innerHTML = '';
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById('output').innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","App\\Views\\Event\\eventy.php?q="+str, true);
        xmlhttp.send();
    }
}