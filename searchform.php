<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package verycoolstudio
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <input class="input-text input-white" style="max-width: 300px;" type="text" value="" name="s" id="s" placeholder="Put your words here" />
        <input type="submit" class="chamfered-button" id="searchsubmit" value="Search" />
    </div>
</form>
