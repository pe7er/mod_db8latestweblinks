<?php

/**
 * @package	mod_db8latestweblinks
 * @author	Peter Martin, www.db8.nl
 * @copyright	Copyright (C) 2014 Peter Martin. All rights reserved.
 * @license	GNU General Public License version 2 or later.
 */
defined('_JEXEC') or die;
?>
<ul class="db8latestweblinks<?php echo $moduleclass_sfx; ?>">
    <?php foreach ($list as $item) :
        ?>
        <li>
            <a href="<?php echo JURI::root(); ?>index.php?option=com_weblinks&task=weblink.go&id=<?php echo $item->id; ?>" 
               target="_blank" title="<?php echo $item->description; ?>" class="db8latestweblinks<?php echo $moduleclass_sfx; ?>">
                <?php echo $item->title; ?></a>
        </li>
    <?php endforeach; ?>
</ul>