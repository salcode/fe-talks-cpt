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
class CptLabelsTest extends PHPUnit_Framework_TestCase {
	public function testCptLabelsEmptyPluralString() {
		$this->expectException( \InvalidArgumentException::class );
		$labels = new CptLabels( '', 'Duck' );
	}

	public function testCptLabelsEmptySingularString() {
		$this->expectException( \InvalidArgumentException::class );
		$labels = new CptLabels( 'Ducks', '' );
	}

	public function testCptLabelsSingleValue() {
		$labels = new CptLabels( 'Ducks', 'Duck' );
		$result = $labels->to_array();
		$this->assertEquals( 'Ducks', $result['name'] );
	}

	public function testCptLabelsDefaultLabelArrayParam() {
		$labels = new CptLabels( 'Ducks', 'Duck', [ 'name' => 'fred' ] );
		$result = $labels->to_array();
		$this->assertEquals( 'fred', $result['name'] );
	}
}
