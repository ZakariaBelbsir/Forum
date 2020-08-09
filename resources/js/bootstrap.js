window._ = require('lodash');
window.Vue = require('vue');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.events = new Vue();

window.flash= function(message){
    window.events.$emit('flash', message)
}
