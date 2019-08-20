<?php

namespace Chewyou\NodeTreeDropdown;

use SilverStripe\Forms\LiteralField;

class NodeTreeDropdownField extends LiteralField {

    public function __construct($name, $pageID) {
        $content = '<div class="js-node-tree-container" data-id="' . $pageID . '"></div>';

        parent::__construct($name, $content);
    }
}
