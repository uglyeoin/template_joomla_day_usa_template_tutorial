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

        <div class="pure-g" id="navigation">
            <div class="pure-u-1-1"><p>Navigation</p></div>
        </div>

        <div class="pure-g" id="hero">
            <div class="pure-u-1-1"><p>hero</p></div>
        </div>

        <div class="pure-g" id="belowHero">
            <div class="pure-u-1-1"><p>belowHero</p></div>
        </div>

        <div class="pure-g" id="feature">
            <div class="pure-u-1-1"><p>feature</p></div>
        </div>

        <div class="pure-g" id="services">
            <div class="pure-u-1-1"><p>services</p></div>
        </div>

        <div class="pure-g" id="reviews">
            <div class="pure-u-1-1"><p>reviews</p></div>
        </div>

        <div class="pure-g" id="callToAction">
            <div class="pure-u-1-1"><p>callToAction</p></div>
        </div>

        <div class="pure-g" id="footer">
            <div class="pure-u-1-1"><p>footer</p></div>
        </div>

        <div class="pure-g" id="belowFooter">
            <div class="pure-u-1-1"><p>belowFooter</p></div>
        </div>

    </body>
</html>