<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Templates.joomla_day_usa
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */
/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_pureCSS($module, &$params, &$attribs)
{
    if ($module->content)
    {
        // Get module params
        $headerTag     = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
        $headerClass   = htmlspecialchars($params->get('header_class', 'module-title'), ENT_COMPAT, 'UTF-8');

        /* if module class exists use it, or else use 5-5 (100% width) by default */
        $moduleClass   = htmlspecialchars(ltrim($params->get('moduleclass_sfx', "5-5")), ENT_COMPAT, 'UTF-8');
        ?>

        <!-- the column -->
        <div class="<?php echo $moduleClass; ?>">
            <?php
            /* If there is a title and it's set to show create it using the joomla parameters */
            if ($module->showtitle)
            {
                echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
            }
            ?>
            <div class="module-content">
                <?php echo $module->content; ?>
            </div>
        </div><!-- close the column -->

        <?php
    }
}
?>