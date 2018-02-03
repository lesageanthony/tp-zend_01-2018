<?php

class WebContext extends \Behat\MinkExtension\Context\MinkContext{

    /**
     * @Given I wait for :arg1 seconds
     */
    public function iWaitForSeconds($arg1)
    {
        $this->getSession()->wait($arg1 * 1000);
    }

    /**
     * @Then I should see better :arg1
     */
    public function iShouldSeeBetter($arg1)
    {
        //$this->assertPageContainsText($arg1);
        $this->assertSession()->pageTextContains($this->fixStepArgument($arg1));
    }


}