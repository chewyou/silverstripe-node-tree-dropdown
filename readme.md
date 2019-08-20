# Silverstripe Node Tree Dropdown

## Synopsis
A Node Tree Dropdown extension for the Silverstripe CMS. 
Allows users to select page 'nodes' from a simple to use file-like 
structure dropdown view. 
Much like the 'Batch Actions' view in the CMS.

## Requirements 
- SilverStripe 4+
- PHP 7+

## Screenshots
#### Closed with selections made
![Closed with selections made](/images/screenshots/closed-with-selections.png?raw=true)
#### Open with selections made
![Open with selections made](/images/screenshots/open-with-selections.png?raw=true)

## Installation
#### Composer
`composer require chewyou/silverstripe-node-tree-dropdown`

## Configuration
In the `routes.yml` file, add:
```

---
 Name: nodetree-route
 After:
   - '#rootroutes'
   - '#coreroutes'
 ---
 SilverStripe\Control\Director:
   rules:
     'api/nodetree//$Action': 'Chewyou\NodeTreeDropdown\NodeTreeController'
```

## Use
```
use Chewyou\NodeTreeDropdown\NodeTreeDropdownField;
use SilverStripe\Forms\HiddenField;
.
.
.
$fields->addFieldsToTab('Root.NodeTree', [
    HiddenField::create('SelectedNodes', 'SelectedNodes')->addExtraClass('selected-nodes'),
    NodeTreeDropdownField::create('NodeTreeDropdown', {{PageID}})
]);
```
where `PageID` is the parent page wanted to display its children as a node tree

e.g The below shows the parent and its children. Use the Parents ID in the 
NodeTreeDropdownField to show its two children (and its children, if any)

- Parent ($PageID)
  - Child
  - Child
