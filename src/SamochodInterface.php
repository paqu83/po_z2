<?php

namespace Drupal\po_z2;

/**
 * Interface SamochodInterface
 * @package Drupal\po_z2
 */
interface SamochodInterface {

  /**
   * Mandatory jedz method.
   *
   * @param float $jakSzybko
   * @param float $jakDaleko
   */
  public function jedz(float $jakSzybko, float $jakDaleko): void;
}
