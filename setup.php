<?php
/*
 -------------------------------------------------------------------------
 Show connected items - plugin for GLPI
 Copyright (C) 2019 by the Aleksey Kotryakhov.

 https://github.com/akm77/showconns
 -------------------------------------------------------------------------

 LICENSE

 This file is part of Show connected items - plugin for GLPI.

 Show connected items - plugin for GLPI is free software; you can
 redistribute it and/or modify it under the terms of the GNU General
 Public License as published by the Free Software Foundation; either
 version 2 of the License, or (at your option) any later version.

 Show connected items - plugin for GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with Show connected items - plugin for GLPI.
 If not, see <http://www.gnu.org/licenses/>.

------------------------------------------------------------------------

   @package   Show connected items - plugin for GLPI
   @author    Aleksey Kotryakhov
   @co-author
   @copyright Copyright (c) 2020-2020 Aleksey Kotryakhov
   @license   AGPL License 3.0 or (at your option) any later version
              http://www.gnu.org/licenses/agpl-3.0-standalone.html
   @link      https://github.com/akm77/showconns
   @since     2019


 --------------------------------------------------------------------------
 */

define('PLUGIN_SHOWCONNS_VERSION', '0.2');
// Minimal GLPI version, inclusive
define('PLUGIN_SHOWCONNS_MIN_GLPI', '9.2');
// Maximum GLPI version, exclusive
define('PLUGIN_SHOWCONNS_MAX_GLPI', '9.5');

/**
 * Init hooks of the plugin.
 * REQUIRED
 *
 * @return void
 */
function plugin_init_showconns() {
   global $PLUGIN_HOOKS;

   $PLUGIN_HOOKS['csrf_compliant']['showconns'] = true;

}


/**
 * Get the name and the version of the plugin
 * REQUIRED
 *
 * @return array
 */
function plugin_version_showconns() {
   return [
      'name'           => __('Show connected items', 'showconns'),
      'version'        => PLUGIN_SHOWCONNS_VERSION,
      'author'         => '<a href="https://github.com/akm77/showconns">Aleksey Kotryakhov</a>',
      'license'        => 'AGPLv3+',
      'homepage'       => 'https://github.com/akm77/showconns',
      'requirements'   => [
         'glpi' => [
            'min' => PLUGIN_SHOWCONNS_MIN_GLPI,
            'max' => PLUGIN_SHOWCONNS_MAX_GLPI,
         ]
      ]
   ];
}

/**
 * Check pre-requisites before install
 * OPTIONNAL, but recommanded
 *
 * @return boolean
 */
function plugin_showconns_check_prerequisites() {

   //Version check is not done by core in GLPI < 9.2 but has to be delegated to core in GLPI >= 9.2.
   $version = preg_replace('/^((\d+\.?)+).*$/', '$1', GLPI_VERSION);
   echo $version;
   if (version_compare($version, '9.2', '<')) {
      $matchMinGlpiReq = version_compare($version, PLUGIN_SHOWCONNS_MIN_GLPI, '>=');
      $matchMaxGlpiReq = version_compare($version, PLUGIN_SHOWCONNS_MAX_GLPI, '<');

      if (!$matchMinGlpiReq || !$matchMaxGlpiReq) {
         echo vsprintf(
            'This plugin requires GLPI >= %1$s and < %2$s. Current version is %3$s.',
            [
               PLUGIN_SHOWCONNS_MIN_GLPI,
               PLUGIN_SHOWCONNS_MAX_GLPI,
               $version,
            ]
         );
         return false;
      }
   }
   return true;
}

/**
 * Check configuration process
 *
 * @param boolean $verbose Whether to display message on failure. Defaults to false
 *
 * @return boolean
 */
function plugin_showconns_check_config($verbose = false) {
   if (true) { // Your configuration check
      return true;
   }

   if ($verbose) {
      echo __('Installed / not configured', 'showconns');
   }
   return false;
}
