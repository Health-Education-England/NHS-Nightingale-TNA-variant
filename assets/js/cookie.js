import cookie from './helpers/cookie';

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
