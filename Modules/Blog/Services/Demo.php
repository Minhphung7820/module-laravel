<?php

namespace Modules\Blog\Services;

class Demo
{
    protected $foo;
    protected $bar;
    public function __construct($foo, $bar)
    {
        $this->foo = $foo;
        $this->bar = $bar;
    }

    public function myMethod()
    {
        return "Hello đây là facade đầu tiên của tôi ";
    }

    public function setFoo($foo)
    {
        $this->foo = $foo;
    }
    public function setBar($bar)
    {
        $this->bar = $bar;
    }
    public function getFooBar()
    {
        return $this->foo . " - " . $this->bar;
    }
}
