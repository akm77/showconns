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
   if ($itemtype != 'Computer') {
      return $sopt;
   }

   $plugin = new Plugin();

   if ($plugin->isInstalled('ldapcomputers')
       && $plugin->isActivated('ldapcomputers')
       && Session::haveRight("plugin_ldapcomputers_view", READ)) {
        $sopt[3210]['table']         = 'glpi_plugin_ldapcomputers_computers';
        $sopt[3210]['field']         = 'name';
        $sopt[3210]['linkfield']     = '';
        $sopt[3210]['name']          = "LDAP " . __("Name");
        $sopt[3210]['joinparams']  = ['jointype' => 'child'];
        $sopt[3210]['forcegroupby']  = true;

        $sopt[3211]['table']         = 'glpi_plugin_ldapcomputers_computers';
        $sopt[3211]['field']         = 'lastLogon';
        $sopt[3211]['linkfield']     = '';
        $sopt[3211]['name']          = "LDAP " . __('Last logon', 'ldapcomputers');
        $sopt[3211]['joinparams']  = ['jointype' => 'child'];
        $sopt[3211]['forcegroupby']  = true;
        $sopt[3211]['datatype']      = 'datetime';

        $sopt[3212]['table']         = 'glpi_plugin_ldapcomputers_computers';
        $sopt[3212]['field']         = 'distinguishedName';
        $sopt[3212]['linkfield']     = '';
        $sopt[3212]['name']          = "LDAP " . __('Distinguished name', 'ldapcomputers');
        $sopt[3212]['joinparams']  = ['jointype' => 'child'];
        $sopt[3212]['forcegroupby']  = true;

        $sopt[3213]['table']         = 'glpi_plugin_ldapcomputers_computers';
        $sopt[3213]['field']         = 'operatingSystem';
        $sopt[3213]['linkfield']     = '';
        $sopt[3213]['name']          = "LDAP " . __('OS', 'ldapcomputers');
        $sopt[3213]['joinparams']  = ['jointype' => 'child'];
        $sopt[3213]['forcegroupby']  = true;
   }
   return $sopt;
}

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


/**
 * Plugin uninstall process
 *
 * @return boolean
 */
function plugin_ldapcomputers_uninstall() {

   return true;
}
