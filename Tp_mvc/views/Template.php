<?php
class Template {
    protected $filename; protected $content;
    public function __construct($filename) { $this->filename = $filename; $this->content = file_get_contents($filename); }
    public function replace($old, $new) { $this->content = str_replace($old, $new, $this->content); }
    public function write() { echo $this->content; }
}
?>