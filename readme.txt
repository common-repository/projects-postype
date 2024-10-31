=== Projects Postype ===
Contributors: 950dsgn
Tags: projects, portfolio, post type, taxonomies, meta boxes
Requires at least: 4.6
Tested up to: 4.9.4
Stable tag: trunk
Requires PHP: 
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

A simple plugin to create Projects/Portfolio Post Type with Custom Taxonomies and Custom Meta Boxes.

== Screenshots ==

1. The Admin Page

== Installation ==

Just install and activate.

== Frequently Asked Questions ==

= How can I display Projects? =

To display your projects in your theme, you can create custom templates or you can use 'single-projects.php' and
'archive-projects.php'.

= How can I display 'Project Type' Taxonomy? =

To display the taxonomy in your theme you can use:

the_terms( $id, $taxonomy, $before, $sep, $after )

$taxonomy = 'project-type'

= How can I display Meta Boxes? =

To display colors and client information in your theme you can use:

echo get_post_meta( int $post_id, string $key = '', bool $single = false )

Color 1: $key = 'color_1'
Color 2: $key = 'color_2'
Client Name: $key = 'client_name'
Client Website Link: $key = 'client_website_link'
Client Website Name: $key = 'client_website_name'

== Changelog ==

= 1.0 =

* Release
