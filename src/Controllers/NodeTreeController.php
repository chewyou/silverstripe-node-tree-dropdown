<?php

namespace Chewyou\NodeTreeDropdown;

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;

class NodeTreeController extends Controller {

    private static $allowed_actions = [
        "getTreeData"
    ];

    public function init() {
        parent::init();
    }

    public function getTreeData(HTTPRequest $request) {
        $pageID = $request->getVar('pageID');

        $page = SiteTree::get_by_id($pageID);

        return json_encode(["tree" => [], "selected" => []]);
    }

}