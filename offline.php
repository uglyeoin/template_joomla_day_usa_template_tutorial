<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/** @var JDocumentHtml $this */
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;


$twofactormethods   = JAuthenticationHelper::getTwoFactorMethods();
$app                = Factory::getApplication();
$doc                = Factory::getDocument();
$user               = Factory::getUser();
$this->language     = $doc->language;
$this->direction    = $doc->direction;

// Output as HTML5
$this->setHtml5(true);

// Get the name of the template
$templateName = $app->getTemplate();

// Get the root of the domain name e.g. www.domainname.com and assign it to variable
$JURI = Uri::root();


/* Pure CSS Grids */
HTMLHelper::_('stylesheet', 'https://unpkg.com/purecss@2.0.5/build/grids-responsive-min.css', ['version' => 'auto', 'relative' => true, 'crossorigin' => 'anonymous']);

/* Our custom CSS based on SCSS */
HTMLHelper::_('stylesheet', $JURI . 'templates/' . $templateName . '/css/custom.css', ['version' => 'auto', 'relative' => true, 'crossorigin' => 'anonymous']);

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <jdoc:include type="head" />
</head>
<body>
<div class="container">
    <div class="pure-g">
        <div class="pure-u-1">
            <a class="dj-up_a active " href="/" aria-expanded="false"><span><img class="dj-icon pure-img padding" src="/images/brand-assets/GlowCare--logo--blue.svg" alt="Home" style="max-width: 400px;"></span></a>
        </div>
    </div>
    <div class="pure-g">
        <div class="pure-u-1">
            <div class="padding">
                <p><?php echo Text::_('JDAY_USA_SITE_OFFLINE_MESSAGE'); ?></p>
            </div>
        </div>
    </div>
    <div class="pure-g">
        <div class="pure-u-1">
            <jdoc:include type="message" />
            <form action="<?php echo Route::_('index.php', true); ?>" method="post" id="form-login">
                <fieldset>
                    <label for="username"><?php echo Text::_('JGLOBAL_USERNAME'); ?></label>
                    <input name="username" id="username" type="text" title="<?php echo Text::_('JGLOBAL_USERNAME'); ?>" />

                    <label for="password"><?php echo Text::_('JGLOBAL_PASSWORD'); ?></label>
                    <input type="password" name="password" id="password" title="<?php echo Text::_('JGLOBAL_PASSWORD'); ?>" />

                    <?php if (count($twofactormethods) > 1) : ?>
                        <label for="secretkey"><?php echo Text::_('JGLOBAL_SECRETKEY'); ?></label>
                        <input type="text" name="secretkey" autocomplete="one-time-code" id="secretkey" title="<?php echo Text::_('JGLOBAL_SECRETKEY'); ?>" />
                    <?php endif; ?>

                    <input type="submit" name="Submit" class="btn btn-primary" value="<?php echo Text::_('JLOGIN'); ?>" />

                    <input type="hidden" name="option" value="com_users" />
                    <input type="hidden" name="task" value="user.login" />
                    <input type="hidden" name="return" value="<?php echo base64_encode(Uri::base()); ?>" />
                    <?php echo HTMLHelper::_('form.token'); ?>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>