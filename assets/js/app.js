require('../scss/app.scss');
import lozad from 'lozad';
import Vue from 'vue'
import '@fancyapps/fancybox';
import 'slick-carousel';

new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
    },
});

const observer = lozad();
observer.observe();

jQuery('.fancybox').fancybox({

});

jQuery('.slick').slick({

});