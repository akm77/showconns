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
function plugin_showconns_getAddSearchOptionsNew($itemtype) {
   $sopt = [];

   $plugin = new Plugin();

   if ($plugin->isInstalled('showconns')
       && $plugin->isActivated('showconns')) {

      $items_device_joinparams    = ['jointype'         => 'itemtype_item',
                                    'specific_itemtype' => $itemtype];

      switch ($itemtype) {
         case 'Peripheral' :
         case 'Phone'      :
         case 'Monitor'    :
         case 'Printer'    :
            $sopt[] = [
               'id' => 3311,
               'table'        => 'glpi_computers',
               'field'        => 'name',
               'name'         =>  'Conns - ' . __('Computer'),
               'datatype'     => 'itemlink',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin'    => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => $items_device_joinparams
                                    ]
                                 ]
               ];
            break;
         case 'Computer' :
            $sopt[] = [
               'id' => 3312,
               'table'        => 'glpi_printers',
               'field'        => 'name',
               'name'         =>  'Conns - ' . __('Printer'),
               'datatype'     => 'itemlink',
               'linkfield' => 'items_id',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin' => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => [
                                          'jointype' => 'child',
                                          'condition' => "AND NEWTABLE.`itemtype` = 'Printer'",
                                       ]
                                    ]
                                 ]
               ];
            $sopt[] = [
               'id' => 3313,
               'table'        => 'glpi_printers',
               'field'        => 'serial',
               'name'         =>  'Conns - ' . __('Printer') .' - ' . __('Serial number'),
               'datatype'     => 'text',
               'linkfield' => 'items_id',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin' => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => [
                                          'jointype' => 'child',
                                          'condition' => "AND NEWTABLE.`itemtype` = 'Printer'",
                                       ]
                                    ]
                                 ]
               ];
            $sopt[] = [
               'id' => 3314,
               'table'        => 'glpi_printers',
               'field'        => 'otherserial',
               'name'         =>  'Conns - ' . __('Printer') .' - ' . __('Inventory number'),
               'datatype'     => 'text',
               'linkfield' => 'items_id',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin' => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => [
                                          'jointype' => 'child',
                                          'condition' => "AND NEWTABLE.`itemtype` = 'Printer'",
                                       ]
                                    ]
                                 ]
               ];

            $sopt[] = [
               'id' => 3315,
               'table'        => 'glpi_monitors',
               'field'        => 'name',
               'name'         =>  'Conns - ' . __('Monitor'),
               'datatype'     => 'itemlink',
               'linkfield' => 'items_id',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin' => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => [
                                          'jointype' => 'child',
                                          'condition' => "AND NEWTABLE.`itemtype` = 'Monitor'",
                                       ]
                                    ]
                                 ]
               ];
            $sopt[] = [
               'id' => 3316,
               'table'        => 'glpi_monitors',
               'field'        => 'serial',
               'name'         =>  'Conns - ' . __('Monitor') .' - ' . __('Serial number'),
               'datatype'     => 'text',
               'linkfield' => 'items_id',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin' => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => [
                                          'jointype' => 'child',
                                          'condition' => "AND NEWTABLE.`itemtype` = 'Monitor'",
                                       ]
                                    ]
                                 ]
               ];
            $sopt[] = [
               'id' => 3317,
               'table'        => 'glpi_monitors',
               'field'        => 'otherserial',
               'name'         =>  'Conns - ' . __('Monitor') .' - ' . __('Inventory number'),
               'datatype'     => 'text',
               'linkfield' => 'items_id',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin' => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => [
                                          'jointype' => 'child',
                                          'condition' => "AND NEWTABLE.`itemtype` = 'Monitor'",
                                       ]
                                    ]
                                 ]
               ];

            $sopt[] = [
               'id' => 3318,
               'table'        => 'glpi_phones',
               'field'        => 'name',
               'name'         =>  'Conns - ' . __('Phone'),
               'datatype'     => 'itemlink',
               'linkfield' => 'items_id',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin' => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => [
                                          'jointype' => 'child',
                                          'condition' => "AND NEWTABLE.`itemtype` = 'Phone'",
                                       ]
                                    ]
                                 ]
               ];
            $sopt[] = [
               'id' => 3319,
               'table'        => 'glpi_phones',
               'field'        => 'serial',
               'name'         =>  'Conns - ' . __('Phone') .' - ' . __('Serial number'),
               'datatype'     => 'text',
               'linkfield' => 'items_id',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin' => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => [
                                          'jointype' => 'child',
                                          'condition' => "AND NEWTABLE.`itemtype` = 'Phone'",
                                       ]
                                    ]
                                 ]
               ];
            $sopt[] = [
               'id' => 3320,
               'table'        => 'glpi_phones',
               'field'        => 'otherserial',
               'name'         =>  'Conns - ' . __('Phone') .' - ' . __('Inventory number'),
               'datatype'     => 'text',
               'linkfield' => 'items_id',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin' => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => [
                                          'jointype' => 'child',
                                          'condition' => "AND NEWTABLE.`itemtype` = 'Phone'",
                                       ]
                                    ]
                                 ]
               ];

            $sopt[] = [
               'id' => 3321,
            'table'        => 'glpi_peripherals',
            'field'        => 'name',
            'name'         =>  'Conns - ' . __('Peripheral'),
            'datatype'     => 'itemlink',
            'linkfield' => 'items_id',
            'forcegroupby' => true,
            'splititems'   => true,
            'joinparams'   => [
                                 'beforejoin' => [
                                    'table'      => 'glpi_computers_items',
                                    'joinparams' => [
                                       'jointype' => 'child',
                                       'condition' => "AND NEWTABLE.`itemtype` = 'Peripheral'",
                                    ]
                                 ]
                              ]
            ];
            $sopt[] = [
               'id' => 3322,
               'table'        => 'glpi_peripherals',
               'field'        => 'serial',
               'name'         =>  'Conns - ' . __('Peripheral') .' - ' . __('Serial number'),
               'datatype'     => 'text',
               'linkfield' => 'items_id',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin' => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => [
                                          'jointype' => 'child',
                                          'condition' => "AND NEWTABLE.`itemtype` = 'Peripheral'",
                                       ]
                                    ]
                                 ]
               ];
            $sopt[] = [
               'id' => 3323,
               'table'        => 'glpi_peripherals',
               'field'        => 'otherserial',
               'name'         =>  'Conns - ' . __('Peripheral') .' - ' . __('Inventory number'),
               'datatype'     => 'text',
               'linkfield' => 'items_id',
               'forcegroupby' => true,
               'splititems'   => true,
               'joinparams'   => [
                                    'beforejoin' => [
                                       'table'      => 'glpi_computers_items',
                                       'joinparams' => [
                                          'jointype' => 'child',
                                          'condition' => "AND NEWTABLE.`itemtype` = 'Peripheral'",
                                       ]
                                    ]
                                 ]
               ];
         break;
      }

   }
   return $sopt;
}

/**
 * Plugin uninstall process
 *
 * @return boolean
 */
function plugin_showconns_uninstall() {

   return true;
}
