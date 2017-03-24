<?php

namespace Translations;

class Controller extends \Kirby\Panel\Controllers\Base {

  public static function config($language, $id) {
    $page = page($id);

    $controller = new Controller;
    $form = $controller->form('config', compact('language', 'id'), function () use ($page, $language) {
      $file = $page->textfile(NULL, $language);
      if (file_exists($file) && is_file($file) && !empty($file)) {
        @unlink($file);
        panel()->notify(strtoupper($language) . ' deleted');
      }
      else {
        panel()->alert('Translation could not be deleted');
      }
      panel()->redirect('pages/'. $id . '/edit');
    });

    return $controller->modal('config', compact('form'));
  }

  public function form($id, $data = array(), $submit = null) {
    $file = kirby()->roots()->plugins() . DS . 'translations' . DS . 'forms' . DS . $id . '.php';
    return panel()->form($file, $data, $submit);
  }

  public function view($file, $data = array()) {
    return new View($file, $data);
  }

  public static function remove($file) {
    return file_exists($file) && is_file($file) && !empty($file) ? @unlink($file) : false;
  }
}
