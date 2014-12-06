<?php

namespace spec\Fastwebmedia\ProfanityFilter;

use Fastwebmedia\ProfanityFilter\ProfanityFilter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use \Illuminate\Config\Repository as Config;

class ProfanityFilterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Fastwebmedia\ProfanityFilter\ProfanityFilter');
    }

	function it_this_wont_work(ProfanityFilter $profanityFilter)
	{
		$profanityFilter->check('I am not a fucking clean string.')->shouldBeCalled()->willReturn(true);
	}

}
