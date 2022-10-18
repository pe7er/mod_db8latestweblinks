<?php
/**
 * @package     mod_db8latestweblinks
 * @author      Peter Martin, https://db8.nl
 * @copyright   Copyright (C) 2014-2022 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

namespace Db8\Module\Db8latestweblinks\Site\Helper;

\defined('_JEXEC') or die;

use Exception;
use Joomla\CMS\Factory;
use Joomla\Registry\Registry;

/**
 * Helper for module db8 Latest Weblinks
 *
 * @since  3.0.0
 */
abstract class Db8Helper
{
	/**
	 * Get a formatted date of most recently created or modified article
	 *
	 * @param   Registry  $params  object holding the models parameters
	 *
	 * @return  string
	 * @throws  Exception
	 * @since   3.0.0
	 */
	public static function getItems($params)
	{
		$count = intval($params->def('count', 5));
		$catid = $params->get('catid');

		$db    = Factory::getContainer()->get('DatabaseDriver');
		$query = $db->getQuery(true)
			->select(
				$db->quoteName(
					[
						'weblinks.id',
						'weblinks.title',
						'weblinks.url',
						'weblinks.description',
						'weblinks.catid'
					]
				)
			)
			->from($db->quoteName('#__weblinks', 'weblinks'))
			->leftJoin(
				$db->quoteName('#__categories', 'categories')
				. ' ON ' . $db->quoteName('categories.id')
				. ' = ' . $db->quoteName('weblinks.catid')
			)
			->where($db->quoteName('categories.published') . ' = 1');

		if (array($catid))
		{
			$query->where($db->quoteName('weblinks.catid') . ' IN (' . implode(",", $catid) . ')');
		}
		else
		{
			$query->where($db->quoteName('weblinks.catid') . ' = ' . (int) $catid);
		}

		$query->order($db->quoteName('weblinks.created') . ' DESC');
		$db->setQuery($query, 0, $count);

		return $db->loadObjectList();
	}
}
