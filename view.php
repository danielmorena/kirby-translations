<?php // site/plugins/plugin-name/view.php

namespace Translations;

class View extends \Kirby\Panel\View {
  public function __construct($file, $data = []) {
    $this->_root = kirby()->roots()->plugins() . DS . 'translations' . DS . 'views';
    $this->_file = $file;
    $this->_data = $data;
  }
}