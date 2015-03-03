<?php namespace Fastwebmedia\ProfanityFilter;

/**
 * @group fwm
 * @group fwm.profanityfilter
 *
 */
class ProfanityFilterTest extends \PHPUnit_Framework_TestCase
{

	public function setConfig()
	{
		return $config = [
			"fuck",
			"fucking",
			"shit",
			"bollocks",
		];
	}

    public function setWhitelist()
    {
        return $whitelist = [
            'tester'
        ];
    }

	/**
	 * @test
	 * */
	public function it_returns_true_for_clean_string()
	{
		$pf = new ProfanityFilter($this->setConfig(), $this->setWhitelist());

		$result = $pf->check("I am a clean string.");

		$this->assertTrue($result);

	}

	/**
	 * @test
	 * */
	public function it_returns_false_for_profane_string()
	{
        $pf = new ProfanityFilter($this->setConfig(), $this->setWhitelist());

		$result = $pf->check("I am not a fucking clean string.");

		$this->assertFalse($result);

	}

	/**
	 * @test
	 * */
	public function it_returns_true_for_ambiguous_clean_string()
	{
        $pf = new ProfanityFilter($this->setConfig(), $this->setWhitelist());

		$result = $pf->check("Scunthorpe");

		$this->assertTrue($result);
	}

    /**
     * @test
     * */
    public function it_returns_true_for_word_in_whitelist()
    {
        $pf = new ProfanityFilter($this->setConfig(), $this->setWhitelist());

        $result = $pf->check("tester");

        $this->assertTrue($result);

    }

    /**
     * @test
     * */
    public function it_returns_false_for_word_a_swear_word_in_whitelist()
    {
        $pf = new ProfanityFilter($this->setConfig(), $this->setWhitelist());

        $result = $pf->check("tester fuck");

        $this->assertFalse($result);

    }

	/**
	 * @test
	 * */
	public function it_returns_same_clean_string_with_default_character()
	{
        $pf = new ProfanityFilter($this->setConfig(), $this->setWhitelist());

		$input = "I am a clean string.";

		$result = $pf->clean($input);

		$this->assertEquals($input, $result);

	}

	/**
	 * @test
	 * */
	public function it_returns_same_clean_string_with_specified_character()
	{
        $pf = new ProfanityFilter($this->setConfig(), $this->setWhitelist());

		$input = "I am a clean string.";

		$result = $pf->clean($input, '#');

		$this->assertEquals($input, $result);

	}

	/**
	 * @test
	 * */
	public function it_returns_cleaned_profane_string_with_default_character()
	{
        $pf = new ProfanityFilter($this->setConfig(), $this->setWhitelist());

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
        $pf = new ProfanityFilter($this->setConfig(), $this->setWhitelist());

		$input = "I am a fucking profane string.";
		$expected_result = "I am a ####ing profane string.";

		$result = $pf->clean($input, '#');

		$this->assertEquals($expected_result, $result);

	}



}