<?php

namespace Styde\Html;


abstract class PairedElement
{

    protected $children = [];

    abstract public function tagName();

    public function add($element)
    {
        $this->children[] = $element;
    }

    public function getChild($index)
    {
        return $this->children[$index];
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function remove($element)
    {
        $index = array_search($element, $this->children, true);

        if (is_int($index)) {
            array_splice($this->children, $index, 1);
        }
    }

    public function render()
    {
        return "<{$this->tagName()}></{$this->tagName()}>";
    }

}