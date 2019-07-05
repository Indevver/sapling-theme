import lozad from 'lozad';
import Vue from 'vue'

export default {
  init() {
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
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
