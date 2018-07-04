<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_sponsorslider
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('jquery.framework', false);

// Include the advertenties functions only once
JLoader::register('ModSponsorSlidersHelper', __DIR__ . '/helper.php');

$headerText = trim($params->get('header_text'));
$footerText = trim($params->get('footer_text'));

$title = $module->title;


JLoader::register('BannersHelper', JPATH_ADMINISTRATOR . '/components/com_banners/helpers/banners.php');
BannersHelper::updateReset();
$list = &ModSponsorSlidersHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

// Add CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base().'modules/mod_sponsorslider/tmpl/style.css');
$document->addStyleSheet(JUri::base().'modules/mod_sponsorslider/tmpl/slick.css');
$document->addStyleSheet(JUri::base().'modules/mod_sponsorslider/tmpl/slick-theme.css');


// Add Slick JS
$document->addScript(JUri::base().'modules/mod_sponsorslider/tmpl/slick.min.js');

require JModuleHelper::getLayoutPath('mod_sponsorslider', $params->get('layout', 'default'));
