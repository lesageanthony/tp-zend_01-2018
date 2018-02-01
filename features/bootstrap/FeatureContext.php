<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given Meetup is empty
     */
    public function meetupIsEmpty()
    {
        $this->meetup =  new \MeetUp\Entity\MeetUp("","","","");
    }

    /**
     * @Given I fill the meetup with title :arg1, description :arg2, begin :arg3 and end :arg4
     */
    public function iFillTheMeetupWithTitleDescriptionBeginAndEnd($arg1, $arg2, $arg3, $arg4)
    {
        //faire TU
        $this->meetup->setTitle($arg1);
        $this->meetup->setDescription($arg2);
        $this->meetup->setBegin($arg3);
        $this->meetup->setEnd($arg4);
    }


}
