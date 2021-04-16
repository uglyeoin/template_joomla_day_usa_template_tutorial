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

$twofactormethods = JAuthenticationHelper::getTwoFactorMethods();
$app              = JFactory::getApplication();

// Output as HTML5
$this->setHtml5(true);

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
            <jdoc:include type="message" />
            <form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="form-login">
                <fieldset>
                    <label for="username"><?php echo JText::_('JGLOBAL_USERNAME'); ?></label>
                    <input name="username" id="username" type="text" title="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" />

                    <label for="password"><?php echo JText::_('JGLOBAL_PASSWORD'); ?></label>
                    <input type="password" name="password" id="password" title="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" />

                    <?php if (count($twofactormethods) > 1) : ?>
                        <label for="secretkey"><?php echo JText::_('JGLOBAL_SECRETKEY'); ?></label>
                        <input type="text" name="secretkey" autocomplete="one-time-code" id="secretkey" title="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>" />
                    <?php endif; ?>

                    <input type="submit" name="Submit" class="btn btn-primary" value="<?php echo JText::_('JLOGIN'); ?>" />

                    <input type="hidden" name="option" value="com_users" />
                    <input type="hidden" name="task" value="user.login" />
                    <input type="hidden" name="return" value="<?php echo base64_encode(JUri::base()); ?>" />
                    <?php echo JHtml::_('form.token'); ?>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>