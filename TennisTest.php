<?php

class Tennis
{
	var $aScore = 0;

	function getScore()
	{
		if($this->aScore == 15)
		{
			return '15 Love';
		}
		
		return 'Love All';
	}

	function aGetScore()
	{
		$this->aScore = 15;
	}
}

class TennisTest extends PHPUnit_Framework_TestCase
{
	function testWhenGameStartGetScoreShouldBeLoveAll()
	{
		$tennis = new Tennis();
		$this->assertEquals( 'Love All', $tennis->getScore() );
	}

		function testWhenGameStartAndAGetScoreThenScoreShouldBe15Love()
	{
		$tennis = new Tennis();
		$tennis->aGetScore();
		$this->assertEquals( '15 Love', $tennis->getScore() );
	}
}