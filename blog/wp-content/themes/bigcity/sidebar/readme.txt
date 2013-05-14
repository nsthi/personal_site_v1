=== Per Page Sidebars ===
Contributors: BrianLayman
Tags: posts, pages, sidebars, widgets
Donate: http://thecodecave.com/did
Requires at least: 2.5
Tested up to: 3.0.1
Stable tag: 1.0

The Per Page Sidebars (PPS) plugin allows blog administrators to create a unique sidebar for each Page. No template editing is required.

== Description ==
This plugin allows the creation and display of custom sidebars for any page on your site. On each page, you can choose which of your current theme's sidebars will be replaced. The replacement works for all descendants of a replaced page. 

In this fashion you can:
1. Easily create a CMS like site with unique sidebars for every page, even if your theme doesn't support it.
2. Create a sidebar with a Cart widget that displays on store pages created by the WP-E-Commerce page, but not anywhere else on the site.
3. Use parent pages to create themed areas of your site, without creating custom page templates.

This plugin is compatible with every theme and all widgets because it hijacks your theme's sidebars instead of replacing them. 

== Installation ==

1. Upload the `tcc-pps` directory to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Modify the display settings as needed on the Settings > Per Page Sidebar page.

== Screenshots ==

1. custom_sidebar.png
2. widget-box.png

== Use ==

1. Edit a page or create and save one. It must at least have a title.
2. In the “Custom Sidebar” section, check “Activate a custom sidebar” and select the sidebar to replace.
3. On the Appearance->Widgets screen, place the widgets on the newly created sidebar that matches your post. 

That’s it. No code. No CSS changes. No custom templates.

== Frequently Asked Questions ==

= My left sidebar was replaced on the parent but it not on the child, why? = 

Some themes allow you to chose different sidebar layouts on each page.  Sometimes these themes rely on a Primary/Secondary Sidebar configuration rather than a Right/Left sidebar convention. This may lead to confusion when the parent displays two sidebars and the child only displays one.  This plugin replaces the sidebar by name not by position.  In a 2 column layout, the only sidebar is by definition the "Primary" sidebar. Replacing a "Secondary" sidebar in the parent page will not alter the appearance of 2 column child page if the "Secondary" sidebar is never displayed.

= Can I replace more than one sidebar per page? = 
Currently only one sidebar can be replaced per page.  If you wish to replace multiple sidebars per page, leave a commment and I may add this feature.

= Can I replace sidebars on posts or custom post types? = 
Currently only one pages can have their sidebars replaced.  If this is a disired feature, leave comments requesting it and I can add the feature fairly easily.

= Can my authors & contributors replace the sidebar on a page? = 
A user can only replace a sidebar on a page if their role has the *edit_theme_options* capability. A user can edit a page that has been assigned custom sidebar and that custom sidebar will not be dropped. A user without the *edit_theme_options* capability simply cannot turn that functionality on or off.

== Changelog ==

= 0.1 =
* Initial release.