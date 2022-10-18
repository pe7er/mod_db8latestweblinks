<?php
/**
 * @package     mod_db8latestweblinks
 * @author      Peter Martin, https://db8.nl
 * @copyright   Copyright (C) 2014-2022 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

if (!$formattedDate)
{
    return;
}

?>
<ul class="db8sitelastmodified">
    <li>
        <?php echo $formattedDate;?>
    </li>
</ul>
<?php
