<?php

return function($language, $id) {

  $form = new Kirby\Panel\Form(array(
    'info' => array(
      'label'    => 'pages.delete.headline',
      'type'     => 'info',
      // 'text'     => strtoupper($language) . ' - ' . $id, // #DEBUG
    )
  ));

  $form->style('delete');
  $form->cancel($language, $id);

  return $form;

};