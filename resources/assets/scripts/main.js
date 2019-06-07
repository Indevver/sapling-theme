// import external dependencies
import 'jquery';
import '@fancyapps/fancybox';
import 'slick-carousel';
import 'bootstrap';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';

/** Populate Router instance with DOM routes */
const routes = new Router({
  common,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
