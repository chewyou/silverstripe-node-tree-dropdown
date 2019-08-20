<?php

namespace Chewyou\NodeTreeDropdown;

use SilverStripe\ORM\DataExtension;

class PageExtension extends DataExtension
{
    private static $db = [
        'SelectedNodes' => 'Varchar(510)'
    ];

}
