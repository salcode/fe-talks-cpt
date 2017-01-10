<?php
/**
 * Tests for Labesls class
 *
 * @package   IronCode\Fe_Cpt
 * @author    Sal Ferrarello
 * @copyright 2017 Iron Code Studio
 * @license   MIT License
 */

namespace IronCode\Fe_Cpt;

use PHPUnit_Framework_TestCase;

/**
 * Tests for Labels class.
 *
 * @package IronCode\Fe_Cpt
 */
class LabelsTest extends PHPUnit_Framework_TestCase {
	public function testLabelsEmptyString() {
		$this->expectException( \InvalidArgumentException::class );
		$labels = new Labels( '' );
	}

	public function testLabelsSingleValue() {
		$labels = new Labels( 'Ducks' );
		$result = $labels->to_array();
		$this->assertEquals( 'Ducks', $result['name'] );
	}

}
