window.onload = function () {
    let tlacitkoForm = document.getElementById("tlacitkoForm");
    tlacitkoForm.onclick = function () {
        let fnazov = document.getElementById("nazovForm").value;
        let fobrazok = document.getElementById("obrazokForm").value;
        let ftext = document.getElementById("textForm").value;

        if (!fnazov) {
            confirm("Nebol zadaný názov, príspevok nebude pridaný");
        } else if ( !fobrazok) {
            confirm("Nebol zadaný obrázok, príspevok nebude pridaný");
        } else if ( !ftext) {
            confirm("Nebol zadaný text, príspevok nebude pridaný");
        }
    }
}