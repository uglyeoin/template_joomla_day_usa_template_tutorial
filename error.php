<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

<<<<<<< HEAD
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
=======
/** @var JDocumentError $this */
>>>>>>> parent of 3628a6b (improved offline page, improved error page, added language string for offline page, added error.css)

use \Joomla\CMS\Factory;

$app  = Factory::getApplication();
$user = Factory::getUser();

// Getting params from template
$params = $app->getTemplate(true)->params;

<<<<<<< HEAD
// Get the name of the template
$templateName = $app->getTemplate();

// Get the root of the domain name e.g. www.domainname.com and assign it to variable
$JURI = Uri::root();

=======
>>>>>>> parent of 3628a6b (improved offline page, improved error page, added language string for offline page, added error.css)
// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$format   = $app->input->getCmd('format', 'html');
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');

if ($task === 'edit' || $layout === 'form')
{
    $fullWidth = 1;
}
else
{
    $fullWidth = 0;
}


?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <jdoc:include type="head" />
</head>
<body
    <?php echo "class='" .
        $option
        . ' view-' . $view
        . ($layout ? ' layout-' . $layout : ' no-layout')
        . ($task ? ' task-' . $task : ' no-task')
        . ($itemid ? ' itemid-' . $itemid : '')
        . ($params->get('fluidContainer') ? ' fluid' : '')
        . ($this->direction === 'rtl' ? ' rtl' : '')
        . "'";
    ?>
<<<<<<< HEAD
    <section id="logo">
        <div class="container">
            <div class="pure-g">
                <div class="pure-u-1">
                    <a class="dj-up_a active " href="/" aria-expanded="false"><span><img class="dj-icon pure-img padding" src="/images/brand-assets/GlowCare--logo--blue.svg" alt="Home" style="max-width: 400px;"></span></a>
                </div>
            </div>
        </div>
    </section>
>
<!--    <section id="navigation" role="navigation">-->
<!--        <div class="container">-->
<!--            <div class="pure-g">-->
<!--                --><?php
//                    echo $this->loadRenderer('modules')->render('navigation', array('style' => 'pureCSS'));
//                ?>
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
=======
>
    <?php if ($navigation) : ?>
        <section id="navigation">
            <div class="container">
                <div class="pure-g">
                    <jdoc:include type="modules" name="navigation" style="pureCSS" />
                </div>
            </div>
        </section>
    <?php endif ?>
>>>>>>> parent of 3628a6b (improved offline page, improved error page, added language string for offline page, added error.css)
    <section id="main" role="main">
        <div class="container">
            <div class="pure-g">
                <section id="component">
                    <jdoc:include type="message" />
                    <div class="container">
                        <div class="pure-g">
                            <div class="pure-u-md-12-24 pure-u-1">
                                <h1><?php echo Text::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></h1>
                                <p><?php echo Text::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
                                <ul>
                                    <li><?php echo Text::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
                                    <li><?php echo Text::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
                                    <li><?php echo Text::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
                                    <li><?php echo Text::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
                                </ul>
                            </div>
                            <div class="pure-u-md-12-24 pure-u-1">
                                <?php if ($format === 'html' && JModuleHelper::getModule('mod_search')) : ?>
                                    <p><strong><?php echo Text::_('JERROR_LAYOUT_SEARCH'); ?></strong></p>
                                    <p><?php echo Text::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></p>
                                    <?php $module = JModuleHelper::getModule('mod_search'); ?>
                                    <?php echo JModuleHelper::renderModule($module); ?>
                                <?php endif; ?>
                                <p><?php echo Text::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></p>
                                <p><a href="<?php echo $this->baseurl; ?>/index.php" class="btn"><span class="icon-home" aria-hidden="true"></span> <?php echo Text::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></p>
                            </div>
                        </div>
                        <hr />
                        <p><?php echo Text::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
                        <blockquote>
                            <span class="label label-inverse"><?php echo $this->error->getCode(); ?></span> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8');?>
                            <?php if ($this->debug) : ?>
                                <br/><?php echo htmlspecialchars($this->error->getFile(), ENT_QUOTES, 'UTF-8');?>:<?php echo $this->error->getLine(); ?>
                            <?php endif; ?>
                        </blockquote>
                        <?php if ($this->debug) : ?>
                            <div>
                                <?php echo $this->renderBacktrace(); ?>
                                <?php // Check if there are more Exceptions and render their data as well ?>
                                <?php if ($this->error->getPrevious()) : ?>
                                    <?php $loop = true; ?>
                                    <?php // Reference $this->_error here and in the loop as setError() assigns errors to this property and we need this for the backtrace to work correctly ?>
                                    <?php // Make the first assignment to setError() outside the loop so the loop does not skip Exceptions ?>
                                    <?php $this->setError($this->_error->getPrevious()); ?>
                                    <?php while ($loop === true) : ?>
                                        <p><strong><?php echo Text::_('JERROR_LAYOUT_PREVIOUS_ERROR'); ?></strong></p>
                                        <p>
                                            <?php echo htmlspecialchars($this->_error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
                                            <br/><?php echo htmlspecialchars($this->_error->getFile(), ENT_QUOTES, 'UTF-8');?>:<?php echo $this->_error->getLine(); ?>
                                        </p>
                                        <?php echo $this->renderBacktrace(); ?>
                                        <?php $loop = $this->setError($this->_error->getPrevious()); ?>
                                    <?php endwhile; ?>
                                    <?php // Reset the main error object to the base error ?>
                                    <?php $this->setError($this->error); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <?php if ($footer) : ?>
        <section id="footer">
            <div class="container">
                <div class="pure-g">
                    <jdoc:include type="modules" name="footer" style="pureCSS" />
                </div>
            </div>
        </section>
    <?php endif ?>

    <?php if ($belowFooter) : ?>
        <section id="belowFooter">
            <div class="container">
                <div class="pure-g">
                    <jdoc:include type="modules" name="belowFooter" style="pureCSS" />
                </div>
            </div>
        </section>
    <?php endif ?>
<?php if ($format === 'html') : ?>
    <?php echo $this->loadRenderer('modules')->render('debug', array('style' => 'none')); ?>
<?php endif; ?>
</body>
</html>