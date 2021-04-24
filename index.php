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

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');
$year     = Factory::getDate()->format('Y');

/* Component? */
$component = ($this->params->get('mainoutput'));

/* Pure CSS Grids */
HTMLHelper::_('stylesheet', 'https://unpkg.com/purecss@2.0.5/build/grids-responsive-min.css', ['version' => 'auto', 'relative' => true, 'crossorigin' => 'anonymous']);

$debug           = $this->countModules('debug');
$navigation      = $this->countModules('navigation');
$hero            = $this->countModules('hero');
$belowHero       = $this->countModules('belowHero');
$feature         = $this->countModules('feature');
$services        = $this->countModules('services');
$reviews         = $this->countModules('reviews');
$callToAction    = $this->countModules('callToAction');
$belowFooter     = $this->countModules('footer');
$belowFooter     = $this->countModules('belowFooter');

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
        <section id="navigation">
            <div class="pure-g">
                <div class="pure-u-1-1"><p>Navigation</p></div>
            </div>
        </section>
        <section id="hero">
            <div class="pure-g">
                <div class="pure-u-1-1"><p>hero</p></div>
            </div>
            </section>
        <section id="belowHero">
            <div class="pure-g">
                <div class="pure-u-1-5"><p>belowHero - Column 1</p></div>
                <div class="pure-u-4-5"><p>belowHero - Column 2</p></div>
            </div>
        </section>
        <section id="feature">
            <div class="pure-g">
                <div class="pure-u-3-5"><p>feature - column 1</p></div>
                <div class="pure-u-2-5"><p>feature - column 2</p></div>
            </div>
        </section>
        <section id="services">
            <div class="pure-g">
                <div class="pure-u-1-1"><p>services</p></div>
            </div>
        </section>
        <section id="reviews">
            <div class="pure-g">
                <div class="pure-u-1-1"><p>reviews</p></div>
            </div>
        </section>
        <section id="callToAction">
            <div class="pure-g">
                <div class="pure-u-2-5"><p>callToAction - column 1</p></div>
                <div class="pure-u-3-5"><p>callToAction - column 2</p></div>
            </div>
        </section>
        <section id="footer">
            <div class="pure-g">
                <div class="pure-u-4-12"><p>footer</p></div>
                <div class="pure-u-4-12"><p>footer</p></div>
                <div class="pure-u-6-12"><p>footer</p></div>
            </div>
            <div class="pure-g">
                <div class="pure-u-4-12"><p>footer</p></div>
                <div class="pure-u-4-12"><p>footer</p></div>
                <div class="pure-u-4-12"><p>footer</p></div>
                <div class="pure-u-4-12"><p>footer</p></div>
            </div>
        </section>
        <section id="belowFooter">
            <div class="pure-g">
                <div class="pure-u-1-1"><p>belowFooter</p></div>
            </div>
        </section>

    </body>
</html>