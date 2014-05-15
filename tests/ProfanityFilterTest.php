<?php namespace Fastwebmedia\ProfanityFilter;

/**
 * @group fwm
 * @group fwm.profanityfilter
 * 
 */
class ProfanityFilterTest extends \Orchestra\Testbench\TestCase {

	public function setConfig()
	{
		return $config = array(
			"default" => array(
				"list" => array(
					"fuck",
					"fucking",
					"shit",
					"bollocks",
					"cunt",
				),
			)
		);
	}
	
	/**
	 * @test
	 * */
	public function it_returns_true_for_clean_string()
	{
		
		$pf = new ProfanityFilter($this->setConfig());
		
		$result = $pf->check("I am a clean string.");
		
		$this->assertTrue($result);
		
	}
	
	/**
	 * @test
	 * */
	public function it_returns_false_for_profane_string()
	{
		
		$pf = new ProfanityFilter($this->setConfig());
		
		$result = $pf->check("I am not a fucking clean string.");
		
		$this->assertFalse($result);
		
	}
	
	/**
	 * @test
	 * */
	public function it_returns_same_clean_string_with_default_character()
	{
		
		$pf = new ProfanityFilter($this->setConfig());
		
		$input = "I am a clean string.";
		
		$result = $pf->clean($input);
		
		$this->assertEquals($input, $result);
		
	}
	
	/**
	 * @test
	 * */
	public function it_returns_same_clean_string_with_specified_character()
	{
		
		$pf = new ProfanityFilter($this->setConfig());
		
		$input = "I am a clean string.";
		
		$result = $pf->clean($input, '#');
		
		$this->assertEquals($input, $result);
		
	}
	
	/**
	 * @test
	 * */
	public function it_returns_cleaned_profane_string_with_default_character()
	{
		
		$pf = new ProfanityFilter($this->setConfig());
		
		$input = "I am a fucking profane string.";
		$expected_result = "I am a ****ing profane string.";
		
		$result = $pf->clean($input);
		
		$this->assertEquals($expected_result, $result);
		
	}
	
	/**
	 * @test
	 * */
	public function it_returns_cleaned_profane_string_with_specified_character()
	{
		
		$pf = new ProfanityFilter($this->setConfig());
		
		$input = "I am a fucking profane string.";
		$expected_result = "I am a ####ing profane string.";
		
		$result = $pf->clean($input, '#');
		
		$this->assertEquals($expected_result, $result);
		
	}
	
}