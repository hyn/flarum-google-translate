

function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: '%%DEFAULT_LOCAL%%', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
}

var script = document.createElement('script');
script.type = 'text/javascript';
script.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';

document.getElementsByTagName('head')[0].appendChild(script);