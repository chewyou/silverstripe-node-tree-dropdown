<?php

namespace Chewyou\NodeTreeDropdown;

use SilverStripe\Forms\LiteralField;
use SilverStripe\View\Requirements;

class NodeTreeDropdownField extends LiteralField {

    public function __construct($name, $pageID) {
        $content = '<div class="js-node-tree-container" data-id="' . $pageID . '"></div>';

        //Libraries
        Requirements::css(NODE_TREE_DIR . '/css/jquery.treeSelector.css');
        Requirements::javascript(NODE_TREE_DIR . '/js/lib/jquery.treeSelector.js');

        // Module
        Requirements::javascript(NODE_TREE_DIR . '/js/node-tree-dropdown.js');

        Requirements::set_force_js_to_bottom(true);

        parent::__construct($name, $content);
    }
}
