<?php

/**
 * Translations field
 *
 * @package   Translations Plugin
 * @author    Flo Kosiol <git@flokosiol.de>
 * @link      http://flokosiol.de
 * @version   0.3
 */

class translationsField extends CheckboxField {

  public static $assets = array(
    'css' => array(
      'translations.css',
    ),
  );

  // Field setup

  public function text() {
    return 'Translation is up to date';
  }

  public function readonly() {
    return false;
  }

  // Helper

  public function deleteTranslation($languageCode) {
    if ($languageCode != $this->page()->site()->defaultLanguage()->code()) {
      $textfile = $this->page->textfile(NULL, $languageCode);
      f::remove($textfile);
    }
    return;
  }

  public function isTranslated($language) {
    $inventory = $this->page()->inventory();
    return isset($inventory['content'][$language->code()]) ? TRUE : FALSE;
  }

  public function isUpToDate($language) {
    $name = $this->name();
    return $this->page()->content($language->code())->$name()->value();
  }

  public function statusIcon($language) {
    if ($this->isTranslated($language)) {
      return 'check';
    }
    return 'times';
  }

  public function cssClasses($language) {
    $classes = array();

    if ($this->isTranslated($language)) {
      $classes[] = 'translated';
      
      if ($this->isUpToDate($language)) {
        $classes[] = 'uptodate';
      }
    }
    else {
      $classes[] = 'untranslated';
    }

    if ($this->page()->site()->language() == $language) {
      $classes[] = 'active';
    }

    if ($this->page()->site()->defaultLanguage()->code() == $language->code()) {
      $classes[] = 'default';
    }

    return implode(' ', $classes);
  }

  // Content

  public function content() {
    $wrapper = new Brick('div');
    $wrapper->addClass('field-translations-wrapper');

    $html = tpl::load( __DIR__ . DS . 'template.php', $data = array(
      'site' => $this->page()->site(),
      'page' => $this->page(),
      'field' => $this,
    ));

    $wrapper->append($html);
    $wrapper->append($this->input());

    return $wrapper;
  }

}