<?php

namespace Drupal\po_z2;

/**
 * Class Samochod
 * @package Drupal\po_z2
 */
class Samochod implements SamochodInterface {

  /**
   * Samochod constructor.
   * Defining class variables using latest PHP 8 Constructor property promotion.
   * https://www.php.net/releases/8.0/en.php#constructor-property-promotion
   *
   * @param string $marka
   *   The make.
   * @param float $pojBaku
   *   In Liters via float.
   * @param float $predkoscMax
   *   In km/h via float.
   * @param float $zuzyciaPaliwa
   *   Liters per 100 km via float.
   */
  public function __construct(protected string $marka, protected float $pojBaku, protected float $predkoscMax, protected float $zuzyciaPaliwa) {

  }

  /**
   * Driving specs current speed validated by top speed and needed refueling.
   *
   * @param float $jakSzybko
   *   In km/h via float.
   * @param float $jakDaleko
   *   In km via float.
   */
  public function jedz(float $jakSzybko, float $jakDaleko): void {
    $valid_current_speed = $this->checkSpeed($jakSzybko);
    $refueling = $this->calcRefueling($jakDaleko);
    echo "car: {$this->marka}, current speed: $valid_current_speed, top speed: {$this->predkoscMax}" . PHP_EOL;
    echo "needs refueling: $refueling times" . PHP_EOL;
  }

  /**
   * Verify speed.
   *
   * @param float $speed
   *   In km/h via float.
   *
   * @return float
   *   Speed limited to top speed.
   */
  protected function checkSpeed(float $speed): float {
    return $speed > $this->predkoscMax ? $this->predkoscMax : $speed;
  }

  /**
   * Calc needed refueling, starting with full tank.
   *
   * @param float $distance
   *   In km via float.
   *
   * @return int
   *   The amount of refueling.
   */
  protected function calcRefueling(float $distance): int {
    $dist_100 = $distance / 100;
    $needed_fuel = $this->zuzyciaPaliwa * $dist_100;
    $refuels = $needed_fuel / $this->pojBaku;
    // (int) is making 0.(1-9) -> 0 and 1.(0-9) -> 1.
    return (int) $refuels;
  }

}
