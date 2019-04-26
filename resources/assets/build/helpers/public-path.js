/* eslint-env browser */
/* globals SAPLING_DIST_PATH */

/** Dynamically set absolute public path from current protocol and host */
if (SAPLING_DIST_PATH) {
  __webpack_public_path__ = SAPLING_DIST_PATH; // eslint-disable-line no-undef, camelcase
}
