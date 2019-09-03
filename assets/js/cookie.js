const cookie = {
    getCookie(name) {
        let v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
        return v ? v[2] : null;
    },
    setCookie(name, value, days) {
        let d = new Date;
        d.setTime(d.getTime() + 24*60*60*1000*days);
        document.cookie = name + "=" + value + ";path=/;expires=" + d.toUTCString();
    },
    deleteCookie(name) { this.setCookie(name, '', -1); }
};

const confirm = document.getElementById('nhsuk-cookie-banner');
if(cookie.getCookie('nhstna-consent-ok') && confirm){
    confirm.remove();
} else if(confirm) {
    confirm.addEventListener('click', function(e){
        e.preventDefault();
        cookie.setCookie('nhstna-consent-ok', true, 30);
        confirm.remove();
    });
}
