Feature: Edit Meetup

  Scenario: I want to see the create page of meetup
    Given I am on the homepage
    And I should see "Modifier"
    When I follow "edit-button"
    Then I should see an "form" element

  Scenario:
    Given I am on the homepage
    And I follow "edit-button"
    And I fill in "title" with "meetup2"
    And I fill in "description" with "long description"
    And I fill in "begin" with "01/01/2019"
    And I fill in "end" with "02/01/2019"
    When I press "edit"
    Then I should be on the homepage
    And I should see "meetup2"
    And I should see "long description"
    And I should see "2019-01-01"
    And I should see "2019-01-02"
