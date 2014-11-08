<?php

class Tennis
{
	var $aScore = 'Love';
	var $bScore = 'Love';

	function getScore()
	{
		if($this->aScore == $this->bScore)
			return $this->aScore . ' All';
		return $this->aScore . ' ' . $this->bScore;
	}

	function aGetScore()
	{
		$this->aScore = 15;
	}

	function bGetScore()
	{
		$this->bScore = 15;
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

	function testWhenGameStartAndBGetScoreThenScoreShouldBeLove15()
	{
		$tennis = new Tennis();

		$tennis->bGetScore();

		$this->assertEquals( 'Love 15', $tennis->getScore() );
	}

	function testWhenScore15LoveAndBGetScoreThenScoreShouldBe15All()
	{
		$tennis = new Tennis();
		$tennis->aGetScore();

		$tennis->bGetScore();

		$this->assertEquals( '15 All', $tennis->getScore() );
	}
}