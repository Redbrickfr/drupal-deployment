<?php

namespace Drupal\mapgeofr\Controller;

use GeoApiFr\GeoApiFr;


use Drupal\Core\Controller\ControllerBase;

/**
 * Class GeoController.
 */
class GeoController extends ControllerBase {

  public function commune_title($code_commune) {
      $data = GeoApiFr::getInstance()->get('communes', ['code' => $code_commune]);
      $this->commune = current($data);
  return $this->commune->nom;
  }

  public function commune($code_commune) {
    $build = [];
    
    if($code_commune){
      $data = GeoApiFr::getInstance()->get('communes', ['code' => $code_commune]);
      $this->commune = current($data);
      $build[] = ['#markup' => $this->commune->nom.' ('.$data[0]->code.') <br />'];
      $build[] = ['#markup' => $this->commune->population.' habitants<br />'];
    }

    $build[] = \Drupal::formBuilder()->getForm('Drupal\mapgeofr\Form\RegionSelector');
    return $build;
  }
}