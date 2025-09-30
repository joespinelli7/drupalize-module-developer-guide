<?php

declare(strict_types=1);

namespace Drupal\anytown\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Anytown routes.
 */
class AnytownController extends ControllerBase {

  /**
   * Returns a renderable array for a Anytown weather page.
   *
   * Return []
   */
  public function build() {
    $location = 'City Market';
    $forecast = 'Sunny with a chance of meatballs.';

    $build['content'] = [
//    Previous solution ⬇️ (before using twig)
//      '#markup' => $this->t('The weather forecast for this week is sunny with a chance of meatballs.'),
//    Updated solution ⬇️ (using twig)
      '#theme' => 'anytown_weather', // coming from .module theme hook
      '#location' => $location,
      '#forecast' => $forecast,
    ];

    return $build;
  }

}
