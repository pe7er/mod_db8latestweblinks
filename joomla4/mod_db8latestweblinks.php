<?php
/**
 * @package     mod_db8latestweblinks
 * @author      Peter Martin, https://db8.nl
 * @copyright   Copyright (C) 2014-2022 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

use Db8\Module\Db8latestweblinks\Site\Helper\Db8Helper;
use Joomla\CMS\Helper\ModuleHelper;

$formattedDate = Db8Helper::getItems($params);

require ModuleHelper::getLayoutPath('mod_db8latestweblinks', $params->get('layout', 'default'));
