# Silverstripe Node Tree Dropdown

### Note
This repo is in beta and code is still being written and tested

## Requirements 

- SilverStripe 4+
- PHP 5.7+

## Installation
`composer require chewyou/silverstripe-node-tree-dropdown`

## Use
`HiddenField::create('SelectedNodes', 'SelectedNodes')->addExtraClass('selected-nodes'),`
`NodeTreeDropdownField::create('NodeTreeDropdown', $PageID)` 

where `$PageID` is the parent page wanted to display its children

e.g The below shows the parent and its children. Use the Parents ID in the 
NodeTreeDropdownField to show its two children (and its children, if any)

- Parent ($PageID)
  - Child
  - Child
