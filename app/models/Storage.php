<?php

use Baum\Node;

/**
 * Storage
 */
class Storage extends Node {
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'storages';

//build rescursive tree 
    public function buildTree($root = array()) {
        if ($root->isLeaf()) {
            return '<option value="' . $root->id . '">' . $root->name . '</option>';
        } else {
            $content = '<optgroup label="' . $root->name . '">';
            foreach ($root->children()->get() as $children) {
                $content.= $this->buildTree($children);
            }
            $content.= '</optgroup>';
            return $content;
        }
    }

    public function buildList($root = array()) {
        if ($root->isLeaf()) {
            return '<li><a href="' . route('fe.search', array('storage' => $root->id)) . '">' . $root->name . '</a></li>';
        } else {
            $content = '<li class="dropdown-submenu">';
            $content.= '<a href="#">' . $root->name . '</a>';
            $content.= '<ul class="dropdown-menu">';
            foreach ($root->children()->get() as $children) {
                $content.= $this->buildList($children);
            }
            $content.= '</ul></li>';
            return $content;
        }
    }

    public function renderList() {
        $roots = $this->roots()->get();
        $html = '';
        foreach ($roots as $root) {
            $html.= $this->buildList($root);
        }
        return $html;
    }

//render html for select field
    public function render() {
        $roots = $this->roots()->get();
        $html = '';
        foreach ($roots as $root) {
            $html.= $this->buildTree($root);
        }
        return $html;
    }

//get tree form leaf to root
    public function getPath($node) {
        if ($node->isRoot()) {
            return $node->name;
        } else {
            return $this->getPath($node->parent()->first()) . '/' . $node->name;
        }
    }

    public function isContain($rootId, $leafId) {
        $leafNode = $this->find($leafId);
        if (empty($leafNode)) {
            return false;
        }
        while (!$leafNode->isRoot()) {
            $parentId = $leafNode->parent_id;
            $leafNode = $this->find($parentId);
        }
        if ($leafNode->id == $rootId) {
            return true;
        } else {
            return false;
        }
    }

    public function getLeavesOfRoot($rootId, &$leaves = array()) {
        $rootNode = $this->find($rootId);
        foreach ($rootNode->children()->get() as $child) {
            if ($child->isLeaf()) {
                array_push($leaves, $child->id);
            }
        }
        foreach ($rootNode->children()->get() as $child) {
            if (!$child->isLeaf()) {
                $this->getLeavesOfRoot($child->id, $leaves);
            }
        }
    }

    public function buildJson($rootId, &$result = array()) {
        $rootNode = $this->find($rootId);
        array_push($result, array(
            'id' => $rootId,
            'text' => $rootNode->name,
        ));
        if (!$rootNode->isLeaf()) {
            $result['children'] = array();
            foreach ($rootNode->children()->get() as $child) {                
                if (!$child->isLeaf()) {
                    $this->buildJson($child->id, $result['children']);
                } else {
                    array_push($result['children'], array(
                        'id' => $child->id,
                        'text' => $child->name,
                    ));
                }
            }
        }
    }

    public function getJson() {
        $result = array();
        $roots = $this->where('parent_id', null)
            ->get();
        foreach ($roots as $node) {
            $this->buildJson($node->id, $result);
        }
        return $result;
    }

//////////////////////////////////////////////////////////////////////////////
//
// Below come the default values for Baum's own Nested Set implementation
// column names.
//
// You may uncomment and modify the following fields at your own will, provided
// they match *exactly* those provided in the migration.
//
// If you don't plan on modifying any of these you can safely remove them.
//
// /**
// * Column name which stores reference to parent's node.
// *
// * @var int
// */
// protected $parentColumn = 'parent_id';
// /**
// * Column name for the left index.
// *
// * @var int
// */
// protected $leftColumn = 'lft';
// /**
// * Column name for the right index.
// *
// * @var int
// */
// protected $rightColumn = 'rgt';
// /**
// * Column name for the depth field.
// *
// * @var int
// */
// protected $depthColumn = 'depth';
// /**
// * With Baum, all NestedSet-related fields are guarded from mass-assignment
// * by default.
// *
// * @var array
// */
// protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');
//
// This is to support "scoping" which may allow to have multiple nested
// set trees in the same database table.
//
// You should provide here the column names which should restrict Nested
// Set queries. f.ex: company_id, etc.
//
// /**
//  * Columns which restrict what we consider our Nested Set list
//  *
//  * @var array
//  */
// protected $scoped = array();
//////////////////////////////////////////////////////////////////////////////
//
// Baum makes available two model events to application developers:
//
// 1. `moving`: fired *before* the a node movement operation is performed.
//
// 2. `moved`: fired *after* a node movement operation has been performed.
//
// In the same way as Eloquent's model events, returning false from the
// `moving` event handler will halt the operation.
//
// Below is a sample `boot` method just for convenience, as an example of how
// one should hook into those events. This is the *recommended* way to hook
// into model events, as stated in the documentation. Please refer to the
// Laravel documentation for details.
//
// If you don't plan on using model events in your program you can safely
// remove all the commented code below.
//
// /**
//  * The "booting" method of the model.
//  *
//  * @return void
//  */
// protected static function boot() {
//   // Do not forget this!
//   parent::boot();
//   static::moving(function($node) {
//     // YOUR CODE HERE
//   });
//   static::moved(function($node) {
//     // YOUR CODE HERE
//   });
// }
}
