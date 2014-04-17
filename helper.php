<?php

/**
 * @package	mod_db8latestweblinks
 * @author	Peter Martin, www.db8.nl
 * @copyright	Copyright (C) 2014 Peter Martin. All rights reserved.
 * @license	GNU General Public License version 2 or later.
 */
defined('_JEXEC') or die;


/**
* db8 Latest Weblinks Module Helper
*/
class modDB8LatestWeblinksHelper
{
    /**
    * Gets a list of latest added Weblinks
    */
    public static function getItems(&$params)
    {
        $count = intval( $params->def( 'count', 5 ) );
        $catid = $params->get( 'catid' );

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('a.id, a.title, a.url, a.description, a.catid');
        $query->from('#__weblinks AS a');
        $query->leftJoin('#__categories AS cc ON cc.id = a.catid');
        $query->where('cc.published = 1');

        if(array($catid)){
            $query->where('a.catid IN ('.implode(",", $catid).')');
        }else{
            $query->where('a.catid = '.$catid);
        }
        $query->order('a.created DESC');
        
        $db->setQuery($query,0,$count);
        $list = $db->loadObjectList();
        
        return $list;
    }
}