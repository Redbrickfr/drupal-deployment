<?php

namespace Drupal\blockpipe\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

// de meme TOUJOURS mettre les annotations pour un block 
/**
 *Provides a hello block
 *
 *@Block(
 * id = "lazy_block",
 * admin_label = @Translation("Big Pipe")
 *)
 */

class Blockpipe extends BlockBase implements ContainerFactoryPluginInterface{

// ne pas oublier la classe create avec tous les parametres et les use  qui sont utilisés plus haut
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition
    );
  }

	public function build(){
		$build = [];
		$build['lazy_block_pipe'] = [
          '#lazy_builder' => [ # ici le #lazy_builder est un mots clé, il permet d'activer le lazy builder, ne pas oublier d'activer le module big pipe
            'blockpipe:content', #on lui declare le nom de notre service, qui instanciere la classe et appellera la methode content()
            []
          ],
          '#create_placeholder' => TRUE, # parametre obligatoire, ne pas oublier
		];
		return $build;
	}
}



