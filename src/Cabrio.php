<?php

namespace Drupal\po_z2;

/**
 * Class Cabrio.
 * @package Drupal\po_z2
 */
class Cabrio extends Samochod implements CabrioInterface {

  /**
   * @var bool
   *   Default FALSE.
   */
  private bool $roofOpen = FALSE;

  /**
   * Open the roof.
   *
   * @return bool
   */
  public function openRoof(): bool {
    $this->roofOpen = TRUE;
    return TRUE;
  }

  /**
   * Close the roof.
   *
   * @return bool
   */
  public function closeRoof(): bool {
    $this->roofOpen = FALSE;
    return TRUE;
  }

  /**
   * Driving specs current speed validated by top speed and needed refueling.
   *
   * @param float $jakSzybko
   * @param float $jakDaleko
   */
  public function jedz(float $jakSzybko, float $jakDaleko): void {
    if ($this->roofOpen) {
      $old_zuzycie = $this->zuzyciaPaliwa;
      $this->zuzyciaPaliwa *= 1.15;
    }
    parent::jedz($jakSzybko, $jakDaleko);

    // Reset the fuel consumption.
    $this->zuzyciaPaliwa = $old_zuzycie ?? $this->zuzyciaPaliwa;
  }

}
