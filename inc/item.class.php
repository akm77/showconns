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
if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access directly to this file");
}

/**
 *  Class Show connected items - plugin for GLPI
 */
class PluginShowconnsItem extends CommonDBTM {
   static $types = ['Monitor', 'Peripheral', 'Phone', 'Printer'];
}