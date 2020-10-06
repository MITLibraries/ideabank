<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>




<div id="container"><!-- main container; holds all the page elements within the viewable page -->




<div id="header" class="clearfix"><!-- holds header elements: title, MIT logo, searchbox  -->

<div id="logo-bar">
    <?php if (theme_get_setting('libraries_logo')): ?>
        <a href="http://libraries.mit.edu/"><div id="libraries-logo" /></div></a>
    <?php endif; ?>
    <div id="logo-holder">
        <a href="http://web.mit.edu"><div id="MIT-logo"></div></a>
    </div>
</div>

<div id="title">

<?php if ($site_name || $site_slogan): ?>
    <?php if ($site_name): ?>
        <?php if ($title): ?>
            <div id="org-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </div>
        <?php else: /* Use h1 when the content title is empty */ ?>
            <div id="org-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

</div>

<?php print render($page['header']); ?>

<?php if (theme_get_setting('search_header')): ?>
    <div id="searchbox"> <!--MIT-Google search open -->
        <?php
        $block = block_load('google_appliance','ga_block_search_form');
        $output = _block_get_renderable_array(_block_render_blocks(array($block)));
        print drupal_render($output);
        ?>
    </div><!-- MIT-Google search close -->
<?php endif; ?>



</div> <!-- header close -->

<div id="nav-holder">
<?php if ($main_menu): ?>
    <div id="main-menu" class="navigation">
        <?php print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
                'id' => 'nav',
                'class' => array('links', 'clearfix'),
            ),
            'heading' => array(
                'text' => t('Menu'),
                'level' => 'h2',
                'class' => array('head'),
            ),
        )); ?>
    </div>
<?php endif; ?>
</div>

<?php
/*
<div id="nav-holder"><!-- holds desktop and mobile nav -->
<ul id="nav"><li><div id="navbutton0"><a href="index.html">Home</a></div></li>
<li><div id="navbutton1"><a href="full-charge.html">Full Charge</a></div></li>
<li><div id="navbutton2"><a href="task-force-members.html">Task Force Members</a></div></li>
<li><div id="navbutton3"><a href="idea-bank.html">Idea Bank</a></div></li>
<li><div id="navbutton4"><a href="news-and-events">News & Events</a></div></li>


</ul></div> <!-- desktop nav -->
<div id="mobile-nav-holder"> <ul class="accordion" id="accordion-1">
<li class="dcjq-current-parent"><a href="#">Menu</a><ul>
<li><div id="navbutton0"><a href="index.html">Home</a></div></li>
<li><div id="navbutton1"><a href="full-charge.html">Full Charge</a></div></li>
<li><div id="navbutton2"><a href="task-force-members.html">Task Force Members</a></div></li>
<li><div id="navbutton3"><a href="idea-bank.html">Idea Bank</a></div></li>
<li><div id="navbutton4"><a href="news-and-events.html">News & Events</a></div></li>
</li>
</ul>
<!-- mobile nav -->
</div> <!-- nav holder close -->
*/
?>


<div id="content" class="clearfix"> <!-- holds elements in the central section of the page -->

<div id="contentbox" class="width56">

<?php if ($messages): ?>
    <div id="messages" class="clearfix"><?php print $messages; ?></div>
<?php endif; ?>

<?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>

<?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>

<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

<?php print render($page['content']); ?>

</div><!-- contentbox close tag -->

<div id="siderail" class="width30">

<?php print render($page['sidebar']); ?>

<div class="float-clear"></div>

</div>




</div><!-- central content section close tag  --->


<div id="footer-content"><!-- footer open tag  --->


<?php if ($page['footer']): ?>
    <div id="footer" class="clearfix"><?php print render($page['footer']); ?></div>
<?php endif; ?>

<div id="footer"  class="clearfix">
    <a href="http://web.mit.edu"><div id="footerlogo"></div></a>
    <div class="footertext"><?php print $site_name; ?><br />
        Massachusetts Institute of Technology<br />
        Cambridge MA 02139-4307
    </div>
    <div class="policies">
        <nav aria-label="MIT Libraries policy menu">
            <span class="item"><a href="https://libraries.mit.edu/accessibility" class="link-sub">Accessibility</a></span>
            <span class="item"><a href="https://libraries.mit.edu/privacy" class="link-sub">Privacy</a></span>
        </nav>
    </div>

</div>

</div><!-- footer close tag  --->

</div><!-- main container close tag -->
