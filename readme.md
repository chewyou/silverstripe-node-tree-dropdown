# Silverstripe Node Tree Dropdown

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/2a0182f5bc454acb80afc65cd6ee0537)](https://app.codacy.com/app/benspickett/silverstripe-node-tree-dropdown?utm_source=github.com&utm_medium=referral&utm_content=chewyou/silverstripe-node-tree-dropdown&utm_campaign=Badge_Grade_Dashboard)
[![CircleCI](https://circleci.com/gh/chewyou/silverstripe-node-tree-dropdown.svg?style=shield)](https://circleci.com/gh/chewyou/silverstripe-node-tree-dropdown)

## Synopsis
A Node Tree Dropdown extension for the Silverstripe CMS. 
Allows users to select page 'nodes' from a simple to use file-like 
structure dropdown view. 
Much like the 'Batch Actions' view in the CMS.

## Requirements 
* SilverStripe 4+
* PHP 7+

## Screenshots
### Closed with selections made
![Closed with selections made](https://github.com/chewyou/silverstripe-node-tree-dropdown/blob/master/images/screenshots/closed-with-selections.PNG)
### Open with selections made
![Open with selections made](https://github.com/chewyou/silverstripe-node-tree-dropdown/blob/master/images/screenshots/open-with-selections.PNG)

## Installation
### Composer
`composer require chewyou/silverstripe-node-tree-dropdown`

You may need to add the repository to the `repositories` list in composer.json
and add 

`"chewyou/silverstripe-node-tree-dropdown": "dev-master"` 

manually. Then run `composer update`

```json
"repositories": 
    [
        {
            "type": "vcs",
            "url": "https://github.com/chewyou/silverstripe-node-tree-dropdown.git"
        }
    ],
```

## Configuration
In your `_config/routes.yml` file (if existing, otherwise create the file), add:
```yaml

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

## Usage
```php
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

* Parent ($PageID)
    * Child
    * Child

## Future work
* Enable/Disable node toggles in CMS Site Settings/YAML file to collapse nodes, hiding their children (for large site trees)
* Update theme - especially the checkboxes