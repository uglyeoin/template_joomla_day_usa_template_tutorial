<?php
/**
 * @package    tpl_joomla_london
 *
 * @author     Eoin <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;

$app             = Factory::getApplication();
$doc             = Factory::getDocument();
$user            = Factory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Get the name of the template
$templateName = $app->getTemplate();

// Get the root of the domain name e.g. www.domainname.com and assign it to variable
$JURI = JURI::root();

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$format   = $app->input->getCmd('format', 'html');
$sitename = $app->get('sitename');

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/purecss@2.0.5/build/grids-responsive-min.css" rel="stylesheet" />
    <link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/error.css" rel="stylesheet" />
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
>
    <section id="navigation" role="navigation">
        <div class="container">
            <div class="pure-g">
                <?php
                    echo $this->loadRenderer('modules')->render('navigation', array('style' => 'pureCSS'));
                ?>
            </div>
        </div>
    </section>
    <section id="main" role="main">
        <div class="container">
            <div class="pure-g">
                <section id="component">
                    <jdoc:include type="message" />
                    <div class="container">
                        <div class="pure-g">
                            <div class="pure-u-md-12-24 pure-u-1">
                                <h1><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></h1>
                                <p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
                                <ul>
                                    <li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
                                    <li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
                                    <li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
                                    <li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
                                </ul>
                            </div>
                            <div class="pure-u-md-12-24 pure-u-1">
                                <?php if ($format === 'html' && JModuleHelper::getModule('mod_search')) : ?>
                                    <p><strong><?php echo JText::_('JERROR_LAYOUT_SEARCH'); ?></strong></p>
                                    <p><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></p>
                                    <?php $module = JModuleHelper::getModule('mod_search'); ?>
                                    <?php echo JModuleHelper::renderModule($module); ?>
                                <?php endif; ?>
                                <p><?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></p>
                                <p><a href="<?php echo $this->baseurl; ?>/index.php" class="btn"><span class="icon-home" aria-hidden="true"></span> <?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></p>
                            </div>
                        </div>
                        <hr />
                        <p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
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
                                        <p><strong><?php echo JText::_('JERROR_LAYOUT_PREVIOUS_ERROR'); ?></strong></p>
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
    <section id="footer">
        <div class="container">
            <div class="pure-g">
                <?php
                    echo $this->loadRenderer('modules')->render('footer', array('style' => 'pureCSS'));
                ?>
            </div>
        </div>
    </section>

    <section id="belowFooter">
        <div class="container">
            <div class="pure-g">
                <?php
                    echo $this->loadRenderer('modules')->render('belowFooter', array('style' => 'pureCSS'));
                ?>
            </div>
        </div>
    </section>
</body>
</html>