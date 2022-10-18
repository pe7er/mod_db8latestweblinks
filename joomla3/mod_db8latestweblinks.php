<?php

/**
 * @package	mod_db8latestweblinks
 * @author	Peter Martin, www.db8.nl
 * @copyright	Copyright (C) 2014 Peter Martin. All rights reserved.
 * @license	GNU General Public License version 2 or later.
 */
defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';


$list = modDB8LatestWeblinksHelper::getItems($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_db8latestweblinks', $params->get('layout', 'default'));

