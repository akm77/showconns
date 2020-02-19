<?php
/*
 -------------------------------------------------------------------------
 ldapcomputers plugin for GLPI
 Copyright (C) 2019 by the ldapcomputers Development Team.

 https://github.com/pluginsGLPI/ldapcomputers
 -------------------------------------------------------------------------

 LICENSE

 This file is part of ldapcomputers.

 ldapcomputers is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 ldapcomputers is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with ldapcomputers. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

 /**
 * Plugin install process
 *
 * @return boolean
 */
function plugin_showconns_install() {
   return true;
}

////// SEARCH FUNCTIONS ///////(){

// Define search option for types of the plugins
function plugin_showconns_getAddSearchOptions($itemtype) {
   $sopt = [];

   Toolbox::logInFile('itemtype', "itemtype - " . $itemtype . "\n");
   $plugin = new Plugin();

   if ($plugin->isInstalled('showconns')
       && $plugin->isActivated('showconns')) {

      $items_device_joinparams    = ['jointype'          => 'itemtype_item',
                                    'specific_itemtype' => $itemtype];

      switch ($itemtype) {
         case 'Peripheral' :
         case 'Phone'      :
         case 'Monitor'    :
         case 'Printer'    :
            $sopt[3311]['table']        = 'glpi_computers';
            $sopt[3311]['field']        = 'name';
            $sopt[3311]['name']         =  'Conns - ' . __('Computer');
            $sopt[3311]['datatype']     = 'itemlink';
            $sopt[3311]['forcegroupby'] = true;
            $sopt[3311]['joinparams']   = [
                           'beforejoin'    => [
                              'table'      => 'glpi_computers_items',
                              'joinparams' => $items_device_joinparams
                           ]
                       ];
            break;
         case 'Computer' :
            $sopt[3311]['table']        = 'glpi_printers';
            $sopt[3311]['field']        = 'name';
            $sopt[3311]['field']        = `computers_id`;
            $sopt[3311]['name']         =  'Conns - ' . __('Printer');
            $sopt[3311]['datatype']     = 'itemlink';
            //$sopt[3311]['forcegroupby'] = true;
            //$sopt[3311]['usehaving']    = true;
            $sopt[3311]['joinparams']   = [
                           'beforejoin'    => [
                              'table'      => 'glpi_computers_items',
                              'joinparams' => [
                                 'jointype'           => 'item_item',
                                 'specific_itemtype'  => 'Printer'
                              ]
                           ]
                       ];
            break;
      }

   }
   return $sopt;
}
/*
function plugin_ldapcomputers_addLeftJoin($type, $ref_table, $new_table, $linkfield, &$already_link_tables) {
   $out = "";
   switch ($new_table) {
      case "glpi_plugin_ldapcomputers_computers": // From order list
         $out = " LEFT JOIN `glpi_plugin_ldapcomputers_computers`
                     ON `glpi_plugin_ldapcomputers_computers`.`name` = `glpi_computers`.`name` ";
         break;
   }

   return $out;
}
*/


/**
 * Plugin uninstall process
 *
 * @return boolean
 */
function plugin_showconns_uninstall() {

   return true;
}
