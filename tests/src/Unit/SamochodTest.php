<?php

namespace Drupal\Tests\po_z2\Unit;

use Drupal\po_z2\Samochod;
use Drupal\Tests\UnitTestCase;

/**
 * Class SamochodTest.
 * @package Drupal\Tests\po_z2\Unit
 */
class SamochodTest extends UnitTestCase {

  /**
   * Test speed verification method.
   * @throws \ReflectionException
   */
  public function testCheckSpeed(): void {
    $car = new Samochod('toyota', 50, 160, 7.6);

    $speed = $this->invokeMethod($car, 'checkSpeed', [170]);
    $this->assertEquals(160, $speed);

    $speed = $this->invokeMethod($car, 'checkSpeed', [120]);
    $this->assertEquals(120, $speed);

  }

  /**
   * Test calc refueling.
   *
   * @throws \ReflectionException
   */
  public function testCalcRefueling(): void {
    $car = new Samochod('toyota', 50, 160, 10);

    $refueling = $this->invokeMethod($car, 'calcRefueling', [50]);
    $this->assertEquals(0, $refueling);

    $refueling = $this->invokeMethod($car, 'calcRefueling', [600]);
    $this->assertEquals(1, $refueling);

    $refueling = $this->invokeMethod($car, 'calcRefueling', [1200]);
    $this->assertEquals(2, $refueling);
  }

  /**
   * Help to test private methods.
   *
   * @param $object
   * @param $methodName
   * @param array $parameters
   * @return mixed
   * @throws \ReflectionException
   */
  public function invokeMethod(&$object, $methodName, array $parameters = []) {
    $reflection = new \ReflectionClass(get_class($object));
    $method = $reflection->getMethod($methodName);
    $method->setAccessible(true);
    return $method->invokeArgs($object, $parameters);
  }

}
