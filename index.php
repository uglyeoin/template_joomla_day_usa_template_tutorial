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

use \Joomla\CMS\Factory;

$app             = Factory::getApplication();
$doc             = Factory::getDocument();
$user            = Factory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');
$year     = JFactory::getDate()->format('Y');

/* Component? */
$component = ($this->params->get('mainoutput'));

$doc->addScript('https://unpkg.com/purecss@2.0.5/build/pure-min.css',array('integrity' => 'sha384-LTIDeidl25h2dPxrB2Ekgc9c7sEC3CWGM6HeFmuDNUjX76Ert4Z4IY714dhZHPLd', 'crossorigin' => 'anonymous'));


$debug           = ($this->countModules('debug'));
$navigation      = ($this->countModules('navigation'));
$hero            = ($this->countModules('hero'));
$belowHero       = ($this->countModules('belowHero'));
$feature         = ($this->countModules('feature'));
$services        = ($this->countModules('services'));
$reviews         = ($this->countModules('reviews'));
$callToAction    = ($this->countModules('callToAction'));
$belowFooter     = ($this->countModules('footer'));
$belowFooter     = ($this->countModules('belowFooter'));

?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
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
>

        <?php if ($navigation) : ?>
            <section id="navigation">
                <div class="pure-g">
                        <jdoc:include type="modules" name="navigation" />
                </div>
            </section>
        <?php endif ?>

        <?php if ($hero) : ?>
            <section id="hero">
                <div class="pure-g">
                        <jdoc:include type="modules" name="hero" />
                </div>
            </section>
        <?php endif ?>

        <?php if ($belowHero) : ?>
        <section id="belowHero">
            <div class="pure-g">
                    <jdoc:include type="modules" name="belowHero" />
            </div>
        </section>
        <?php endif ?>

        <?php if ($feature) : ?>
            <section id="feature">
                <div class="pure-g">
                        <jdoc:include type="modules" name="feature" />
                </div>
            </section>
        <?php endif ?>

        <?php if ($services) : ?>
            <section id="services">
                <div class="pure-g">
                        <jdoc:include type="modules" name="services" />
                </div>
            </section>
        <?php endif ?>

        <?php if ($reviews) : ?>
            <section id="reviews">
                <div class="pure-g">
                        <jdoc:include type="modules" name="reviews" />
                </div>
            </section>
        <?php endif ?>

        <?php if ($callToAction) : ?>
            <section id="callToAction">
                <div class="pure-g">
                        <jdoc:include type="modules" name="callToAction" />
                </div>
            </section>
        <?php endif ?>

        <?php if ($footer) : ?>
            <section id="footer">
                <div class="pure-g">
                        <jdoc:include type="modules" name="reviews" />
                </div>
            </section>
        <?php endif ?>

        <?php if ($belowFooter) : ?>
            <section id="belowFooter">
                <div class="pure-g">
                        <jdoc:include type="modules" name="belowFooter" />
                </div>
            </section>
        <?php endif ?>
    </body>
</html>