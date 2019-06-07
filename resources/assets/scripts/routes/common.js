import lozad from 'lozad';

export default {
  init() {
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
