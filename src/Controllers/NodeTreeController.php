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
        $children = $page->Children();

        $selected = [];
        if ($page) {
            $pageSelected = $page->SelectedNodes;
            $selected = explode(',', $pageSelected);
        }

        $childrenArray = [];
        if ($children) {
            foreach ($children as $child) {
                $childTemp = [
                    "id" => $child->ID,
                    "title" => $child->Title,
                    "value" => $child->ID,
                    "children" => $this->getChildren($child->ID)
                ];
                array_push($childrenArray, $childTemp);
            }
        }

        return json_encode(["tree" => $childrenArray, "selected" => $selected]);
    }

    private function getChildren($pageID) {
        $page = SiteTree::get_by_id($pageID);

        $children = $page->Children();

        $childrenArray = [];
        if ($children) {
            foreach ($children as $child) {
                $childTemp = [
                    "id" => $child->ID,
                    "title" => $child->Title,
                    "value" => $child->ID,
                    "children" => $this->getChildren($child->ID)
                ];
                array_push($childrenArray, $childTemp);
            }
        }

        return $childrenArray;
    }

}