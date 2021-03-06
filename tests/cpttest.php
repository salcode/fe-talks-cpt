<?php
/**
 * Tests for Cpt class
 *
 * @package   IronCode\Fe_Cpt
 * @author    Sal Ferrarello
 * @copyright 2017 Iron Code Studio
 * @license   MIT License
 */

namespace IronCode\Fe_Cpt;

use PHPUnit_Framework_TestCase;

/**
 * Tests for Cpt class.
 *
 * @package IronCode\Fe_Cpt
 */
class CptTest extends PHPUnit_Framework_TestCase {

	public function testNoPostType() {
		$this->expectException( \InvalidArgumentException::class );
		$cpt = new Cpt( '', [] );
	}

	public function testNoPrefixInPostType() {
		$this->expectException( \PHPUnit_Framework_Error_Notice::class );
		$cpt = new Cpt( 'duck', [] );
	}

	public function testNoArgs() {
		$this->expectException( \PHPUnit_Framework_Error_Notice::class );
		$cpt = new Cpt( 'duck', [] );
	}
}
