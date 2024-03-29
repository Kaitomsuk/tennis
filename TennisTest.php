<?php

class Tennis
{
	var $aScore = 0;
	var $bScore = 0;
	var $score 	= array('Love', '15', '30', '40');

	function getScore()
	{
		if($this->aScore == $this->bScore)
			return $this->score[$this->aScore] . ' All';
		return $this->score[$this->aScore] . ' ' . $this->score[$this->bScore];
	}

	function aGetScore()
	{
		$this->aScore++;
	}

	function bGetScore()
	{
		$this->bScore++;
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

	function testWhenScore15AllAndBGetScoreThenScoreShouldBe1530()
	{
		$tennis = new Tennis();
		$tennis->aGetScore();
		$tennis->bGetScore();

		$tennis->bGetScore();

		$this->assertEquals( '15 30', $tennis->getScore() );
	}

	function testWhenScore30AllAndBGetScoreThenScoreShouldBe3040()
	{
		$tennis = new Tennis();
		$this->setPoint($tennis, 2, 2);

		$tennis->bGetScore();

		$this->assertEquals( '30 40', $tennis->getScore() );
	}

	private function setPoint($tennis, $aPoint, $bPoint)
	{
		for($i = 0; $i < $aPoint; $i++)
		{
			$tennis->aGetScore();
		}
		for($i = 0; $i < $bPoint; $i++)
		{
			$tennis->bGetScore();
		}
	}

}