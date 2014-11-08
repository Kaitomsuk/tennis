<?php

class Tennis
{
	function getScore()
	{
		return 'Love All';
	}
}

class TennisTest extends PHPUnit_Framework_TestCase
{
	function testWhenGameStartGetScoreShouldBeLoveAll()
	{
		$tennis = new Tennis();
		$this->assertEquals( 'Love All', $tennis->getScore() );
	}
}