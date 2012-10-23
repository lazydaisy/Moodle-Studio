THE TINY BOOTSTRAP PROJECT: A work in progress

------------------------------------

Tiny, is a fluid width, fully responsive, Moodle theme built using Twitter Bootstrap 2.0 with a basic grid scafolding layout, which is based on 960 Grid System (960.gs), and combined with javascript plugins, typography, form controls, and more.

Tiny is, however, only intended as a starting point for other themes to build upon.

It is not recommend to use this theme on a production site!

UPDATE: 23 October 2012
---------------------------------------
Added some @media queries that helps clear up the responsive design feature, which was not working as expected, with respect to moodle page layouts side-pre-only/side-post-only/content-only. Probably needs more work and testing with real mobile/tablet devices, but looking good none the less.

UPDATE: 22 October 2012
---------------------------------------

Added renderers taken from Bas Brands' Bootstrap which incorporates contributed work by Stuart Lamour and David Scotson, and helped getting the custommenu to work correctly in top menu navbar.
The icon renderer code that replaces Moodle standard icons with a Glyphicons sprite image. I have added &nbsp; to the icon renderer code which now places a space between the icon and the title of its associated hyperlink.

Applied more changes to the topmenu navbar, including adding icons to all top level custommenu menu items (see: tiny/renderers.php) amd also resited the Lang menu when logged in (now under username dropdown).

NEW FEATURE: Added a theme specific custommenu, which you will find in Tiny's Custom settings page. It works in the same way the as before, the only difference it is that it is set in the theme's Custom settings page and NOT in Theme settings. This means you could have lots of child themes based on tiny and each have it;s own menu. Which could be good for Course specific themes.
See http://tracker.moodle.org/browse/MDL-31043 for more information about this feature


UPDATE: 09 October 2012
---------------------------------------

Fixed a few more issues with respect to the layout which was casuing problems with the responsive design. All seems to be working well now.


UPDATE: 07 October 2012
---------------------------------------

Finally fixed vanishing blocks thanks to John Stabinger who spotted it was a CSS issue and not Javascript as I had imagined.
Added more customization in the shape of @font-face css which use Custom settings to call the fonts. I have added two free fonts to test it with.
I also added some more renderers so I could style the buttons.
I'm quite pleased with it now as it's beginning to take shape at last.


UPDATE: 30 September 2012
---------------------------------------

Fixed vanishing blocks.
Added more customization.