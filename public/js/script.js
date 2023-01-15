window.onload = function () {
    let tlacitkoLogin = document.getElementById("logBtn");
    tlacitkoLogin.onclick = function () {
        let fname = document.getElementById("login").value;
        let fpassword = document.getElementById("password").value;

        if (!fname) {
            confirm("Nebol zadaný login");
        } else if (!fpassword) {
            confirm("Nebolo zadané heslo");
        }

        if (fname != null) {
            if (!/^[A-Za-z0-9]*$/.test(fname)) {
                confirm("V logine boli zadané nepovolené znaky");
            }
        }
        if (fpassword != null) {
            if (!/^[A-Za-z0-9]*$/.test(fpassword)) {
                confirm("V hesle boli zadané nepovolené znaky");
            }
        }
    }
}