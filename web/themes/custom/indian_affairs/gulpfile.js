/* gulpfile.js */

const uswds = require('@uswds/compile');

/**
 * USWDS version
 */
uswds.settings.version = 3;

/**
 * Path settings
 */
uswds.paths.dist.css = './css';
uswds.paths.dist.theme = './sass';
uswds.paths.dist.js = './assets/uswds/js';
uswds.paths.dist.img = './assets/uswds/img';
uswds.paths.dist.fonts = './assets/uswds/fonts';

/**
 * Exports
 */
exports.init = uswds.init;
exports.compile = uswds.compile;
exports.watch = uswds.watch;
exports.copyAssets = uswds.copyAssets;
exports.default = uswds.compile;
