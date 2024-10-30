=== Cite-This-Post ===
Contributors: grafchitaru
Donate link: http://grafchita.ru
Tags: cite, social button
Requires at least: 1.0.0
Tested up to: 3.0.4
Stable tag: 2011.0209

Plug-in for citing of posts from WordPress by means of buttons and a citing window

== Description ==

* Author: [grafchitaru](http://grafchita.ru)
* Project URI: <http://grafchita.ru/blog/category/cites-this/>
* License: GPL 2. See License below for copyright jots and tittles.

The plug-in adds a field in which the citation for citing, viewing of this of citations under a spoiler, and as buttons of social bookmarks and services in which one click it is possible posting the citation from a blog contains on a blog.

== Installation ==

To use Cite-This, you will need:

* 	an installed and configured copy of WordPress version 3.0.x, 2.9.x, 2.8.x, 2.7.x, 2.6.x, 2.5.x, 2.3.x, 2.2.x, 2.1.x, 2.0.x (Cite-This will also work with the equivalent versions of WordPress MU.)
*	FTP or SFTP access to your web host

= New Installations =

1.	Download the Cite-This archive in zip or gzipped tar format and extract the files on your computer. 
2.	Create a new directory named `Cites-This` in the `wp-content/plugins` directory of your WordPress installation. Use an FTP or SFTP client to upload the contents of your Cite-This archive to the new directory 	that you just created on your web host.	
3.	Log in to the WordPress Dashboard and activate the Cite-This plugin.
4.  In the editor of a theme (a file single.php) to add a line `<? php widget_grafchitaru ();?>` after a line `<? php the_content ();?>`
5.	Configure the plugin and add it to the plugin settings page.

== Screenshots ==

1. Administrative part of a plug-in
2. The user part of a plug-in

== Changelog ==

= 1.0 =
Plugin release. Operate all the basic functions.

== License ==

The Cite-This plugin is copyright © 2011 with [GNU General Public License][] by grafchitaru. 

This program is free software; you can redistribute it and/or modify it under
the terms of the [GNU General Public License][] as published by the Free
Software Foundation; either version 2 of the License, or (at your option) any
later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE. See the GNU General Public License for more details.

  [GNU General Public License]: http://www.gnu.org/copyleft/gpl.html
  
== ToDo ==
The next version or later:
1. The possibility of replacing references output instead of an anchor (part of it, framed by the symbols # #).