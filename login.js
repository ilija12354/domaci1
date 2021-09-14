var xmlHttp
const regex = RegExp('[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$');

function login() {

    var username = $('#userUnos').val();
    var password = $('#passwordUnos').val();

    if (username.length == 0 || !regex.test(username)) {
        return
    }

    if (password.length == 0 || !regex.test(username)) {
        return
    }

    xmlHttp = GetXmlHttpObject()
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "prijava.php";
    url = url + "?username=" + email;
    url = url + "&password=" + password;
    url = url + "&sid=" + Math.random();
    xmlHttp.open("GET", url, true);
    //xmlHttp.onreadystatechange = stateChanged;
    xmlHttp.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            console.log('cao');
        } 
    };
    xmlHttp.send(null);
}

function stateChanged() {

    if (xmlHttp.readyState === 4) {
        window.location.replace('index.php');
    }
}

function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        //Internet Explorer
        try {

            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}
