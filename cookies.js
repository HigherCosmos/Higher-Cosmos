setCookie = (cName, cValue, expDays) => {
    let date = new Date();
    date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + ";" + expires + "; path=/";
}

getCookie = (cName) => {
    const name = cName + "=";
    const cDecoded = decodeURIComponent(document.cookie);
    const cArr = cDecoded.split(";");
    let value;
    cArr.forEach(value =>{
        if(value.indexOf(name) === 0) value = val.substring(name.length);
    })

    return value;
}
document.querySelector("#cookies-btn").addEventListener("click", () => {
    document.querySelector("#cookies").style.display = "none";
    setCookie("cookie", true, 90)
     
})

cookieMessege = () => {
    if(!getCookie("cookie"))
    document.querySelector("#cookie").style.display = "block"
}

// This should make the popup disappear on click

function acceptCookies() {
    document.getElementById('cookies').style.display = 'none';
    // Set a cookie to remember user's consent
    document.cookie = "cookiesAccepted=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
}

// the fuctions below are optinol not sure if it fully works or not

window.onload = function() {
    if (!getCookie("cookiesAccepted")) {
        document.getElementById('cookieConsent').style.display = 'block';
    }
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}


