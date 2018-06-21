<?php

namespace Drupal\blockpipe;

class LazyPipeContent{ # cette classe est instancieé via le service qui est appelle par la classe blockpipe
  public function content(){
  	sleep(5); // le temps mit pour afficher le contenu du block
    return [
    '#markup' => 'LazyPipeContent' // contenu de notre block
    ];
  }
}