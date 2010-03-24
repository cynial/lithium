<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2010, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace lithium\tests\integration\storage;

use \lithium\storage\Session;

class SessionPhpTest extends \lithium\test\Unit {

	public function setUp() {
		Session::config(array(
			'test' => array(
				'name' => 'test',
				'adapter' => 'Php',
				'cookie_lifetime' => 0
			)
		));
	}

	public function testWriteReadDelete() {
		Session::config(array(
			'test' => array(
				'name' => 'test',
				'adapter' => 'Php',
				'cookie_lifetime' => 0
			)
		));

		$key = 'test';
		$value = 'value';

		Session::write($key, $value, array('name' => 'test'));
		$result = Session::read($key, array('name' => 'test'));

		$this->assertEqual($value, $result);
		$this->assertTrue(Session::delete($key, array('name' => 'test')));

		$result = Session::read($key, array('name' => 'test'));
		$this->assertNull($result);
	}
}

?>