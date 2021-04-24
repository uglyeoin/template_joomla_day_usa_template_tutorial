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
$year     = JFactory::getDate()->format('Y');

/* Component? */
$component = ($this->params->get('mainoutput'));

/* How to add a Stylesheet */
/* Help file: https://api.joomla.org/cms-3/classes/Joomla.CMS.HTML.HTMLHelper.html */
/*
 * example code
 * HTMLHelper::_('stylesheet', $file, $options, $attributes);
 *
Arguments
$file (string)
    Path to file
$options (array)
    Array of options. Example: array('version' => 'auto', 'conditional' => 'lt IE 9')
$attribs (array)
    Array of attributes. Example: array('id' => 'scriptid', 'async' => 'async', 'data-test' => 1)
Response (array|string|null)
nothing if $returnPath is false, null, path or array of path if specific CSS browser files were detected
*/

/* Pure CSS Grids */
HTMLHelper::_('stylesheet', 'https://unpkg.com/purecss@2.0.5/build/grids-responsive-min.css', ['version' => 'auto', 'relative' => true, 'crossorigin' => 'anonymous']);

/* Our custom CSS based on SCSS */
HTMLHelper::_('stylesheet', $JURI . 'templates/' . $templateName . '/css/custom.css', ['version' => 'auto', 'relative' => true, 'crossorigin' => 'anonymous']);

/* How to add JavaScript */
/* HTMLHelper::_('script', $file,$options, $attributes); */
//HTMLHelper::_('script', 'mod_xxx/custom.js', ['version' => 'auto', 'relative' => true]);

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
    <div>Just some div</div>

</body>
</html>