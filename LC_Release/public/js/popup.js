var check_popup = 0;

function CookieAcc(){
    document.cookie = "check_popup=1";
    var PopUp = document.getElementById("PopUp");
    PopUp.style.display = "none";
}

function PopUp(name){
    check_popup = document.cookie.split('=').splice(2);
    if (check_popup < 1) {
        var PopUp = document.getElementById(name);
        PopUp.style.display = "block";
    }
}