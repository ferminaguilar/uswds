<?php

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt files in the "core" directory.
 */

use Drupal\Core\DrupalKernel;

if (isset($_SERVER['SCRIPT_NAME']) && str_starts_with($_SERVER['SCRIPT_NAME'], '/uswds/web/')) {
  $_SERVER['SCRIPT_NAME'] = str_replace('/uswds/web/', '/uswds/', $_SERVER['SCRIPT_NAME']);
}
if (isset($_SERVER['PHP_SELF']) && str_starts_with($_SERVER['PHP_SELF'], '/uswds/web/')) {
  $_SERVER['PHP_SELF'] = str_replace('/uswds/web/', '/uswds/', $_SERVER['PHP_SELF']);
}

require_once 'autoload_runtime.php';

return static function () {
  return new DrupalKernel('prod', require 'autoload.php');
};

