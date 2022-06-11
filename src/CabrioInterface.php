<?php

namespace Drupal\po_z2;

/**
 * Interface CabrioInterface
 * @package Drupal\po_z2
 */
interface CabrioInterface {

  /**
   * @return bool
   */
  public function closeRoof(): bool;

  /**
   * @return bool
   */
  public function openRoof(): bool;

}
