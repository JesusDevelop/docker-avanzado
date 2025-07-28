function get_action() {
    var v = grecaptcha.getResponse();
    console.log("Resp" + v);
    if (v == '') {
        document.getElementById('captcha').innerHTML = "Debes Completar el captcha";
        return false;
    }
    else {
        return true;
    }
}