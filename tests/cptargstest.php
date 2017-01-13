<?php
/**
 * Tests for CptArgs class
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
class CptArgsTest extends PHPUnit_Framework_TestCase {

	public function testNoRewriteSlug() {
		$this->expectException( \InvalidArgumentException::class );
		$args = new CptArgs( '', [] );
	}

	public function testDefaults() {
		$args = new CptArgs( 'ducks', [] );
		$result = $args->to_array();
		$this->assertTrue( $result['public'] );
		$this->assertTrue( $result['has_archive'] );
		$this->assertEquals( 'ducks', $result['rewrite']['slug'] );
		$this->assertFalse( $result['rewrite']['with_front'] );
	}

	public function testDefaultArgArray() {
		$args = new CptArgs( 'ducks', [], [
			'public' => false,
			'has_archive' => false,
			'rewrite' => [ 'with_front' => true, 'slug' => 'fred' ],
		] );
		$result = $args->to_array();
		$this->assertFalse( $result['public'] );
		$this->assertFalse( $result['has_archive'] );
		$this->assertEquals( 'fred', $result['rewrite']['slug'] );
		$this->assertTrue( $result['rewrite']['with_front'] );
	}

	public function testDefaultLabelArgsArray() {
		$args = new CptArgs( 'ducks', [ 'name' => 'fred' ], [
			'public' => false,
			'has_archive' => false,
			'labels' => [ 'name' => 'mary' ],
		] );
		$result = $args->to_array();
		$this->assertEquals( 'mary', $result['labels']['name'] );
	}
}
