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
	public function no_testPostTypeEmptyString() {
		$this->expectException( \InvalidArgumentException::class );
		$cpt = new Cpt( '','Many', 'One', 'slug' );
	}

	public function no_testPluralEmptyString() {
		$this->expectException( \InvalidArgumentException::class );
		$cpt = new Cpt( 'fe_book', '', 'One', 'slug' );
	}

	public function no_testSingularEmptyString() {
		$this->expectException( \InvalidArgumentException::class );
		$cpt = new Cpt( 'fe_book', 'Many', '', 'slug' );
	}

	public function no_testRewriteSlugEmptyString() {
		$this->expectException( \InvalidArgumentException::class );
		$cpt = new Cpt( 'fe_book', 'Many', 'One', '' );
	}

	public function no_testNoPrefixInPostType() {
		$this->expectException( \PHPUnit_Framework_Error_Notice::class );
		$cpt = new Cpt( 'books', 'Many', 'One', 'slug' );
	}

	public function no_testCustomPostTypeNoArgs() {
		$cpt = new Cpt( 'fe_books', 'Many', 'One', 'slug' );
		$args = $cpt->populate_args();
		$this->assertEquals( 1, $args['public'] );
		$this->assertEquals( 'Many', $args['label'] );
	}

}
