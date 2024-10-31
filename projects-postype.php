<?php


/*
Plugin Name:  Projects Postype
Plugin URI:   https://950dsgn.com/plugins/
Description:  Free plugin to create Projects/Portfolio Post Type with Custom Taxonomies and Custom Meta Boxes
Version:      1.0
Author:       950DSGN
Author URI:   https://950dsgn.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  projects-postype
Domain Path:  /languages

Projects Postype is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Projects Postype is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Projects Postype. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/



/* Required files
----------------------------------------------------------- */

require plugin_dir_path( __FILE__ ) . 'inc/projects-postype-admin.php';
require plugin_dir_path( __FILE__ ) . 'inc/projects-postype-post-types.php';
require plugin_dir_path( __FILE__ ) . 'inc/projects-postype-custom-taxonomies.php';
require plugin_dir_path( __FILE__ ) . 'inc/projects-postype-meta-boxes.php';


?>
