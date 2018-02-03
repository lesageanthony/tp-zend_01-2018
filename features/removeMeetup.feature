Feature: Remove Meetup

  Scenario: I want to see the create page of meetup
    Given I am on the homepage
    And I should see "Supprimer"
    When I follow "remove-button"
    Then I should see "Supprimer"
    And I should see "Non"

  Scenario:
    Given I am on the homepage
    And I follow "remove-button"
    When I follow "nop"
    Then I should be on the homepage
    And I should see "meetup2"
    And I should see "long description"
    And I should see "2019-01-01"
    And I should see "2019-01-02"

  Scenario:
    Given I am on the homepage
    And I follow "remove-button"
    When I press "delete"
    Then I should be on the homepage
    And I should not see "meetup2"
    And I should not see "long description"
    And I should not see "2019-01-01"
    And I should not see "2019-01-02"
