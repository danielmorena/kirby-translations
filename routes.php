<?php

panel()->routes([
  [
    'pattern' => 'plugin.translations/delete/(:any)/(:all)',
    'method'  => 'GET|POST',
    'filter'  => 'auth',
    'action'  => 'Translations\Controller::config',
  ],
  // [
  //   'pattern' => 'plugin.translations/(:any)/(:all)',
  //   // 'filter'  => 'auth',
  //   'action'  => function($language, $id) {
  //     $page = page($id);
  //     if (f::remove($page->textfile(NULL, $language))) {
  //       panel()->notify(strtoupper($language) . ' deleted');
  //     }
  //     else {
  //       panel()->alert('Translation could not be deleted');
  //     }
  //     panel()->redirect('pages/'. $id . '/edit');
  //   }
  // ]
]);
