<?php

/**
 * Translations plugin
 *
 * @package   Kirby CMS
 * @author    Flo Kosiol <git@flokosiol.de>
 * @link      http://flokosiol.de
 * @version   0.4
 */

$kirby->set('field', 'translations', __DIR__ . DS . 'fields' . DS . 'translations');
$kirby->set('widget', 'translations', __DIR__ . DS . 'widgets' . DS . 'translations');

load([
  'translations\\controller' => __DIR__ . DS . 'controller.php',
  'translations\\view'  => __DIR__ . DS . 'view.php'
]);

require 'routes.php';