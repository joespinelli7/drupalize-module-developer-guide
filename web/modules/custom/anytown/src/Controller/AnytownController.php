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
    $build['content'] = [
      '#markup' => $this->t('The weather forecast for this week is sunny with a chance of meatballs.'),
    ];

    return $build;
  }

}
