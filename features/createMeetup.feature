Feature: Create Meetup
  In order to see meetups
  As a anonymous user
  I want to be able to see all meetups on the application

  Scenario: I want to see the create page of meetup
    Given I am on the homepage
    And I should see "Ajouter nouveau MeetUp"
    When I follow "create-button"
    Then I should see an "form" element

  Scenario:
    Given I am on the homepage
    And I follow "create-button"
    And I fill in "title" with "meetup1"
    And I fill in "description" with "short description"
    And I fill in "begin" with "01/01/2018"
    And I fill in "end" with "02/01/2018"
    When I press "add"
    Then I should be on the homepage
    And I should see "meetup1"
    And I should see "short description"
    And I should see "2018-01-01"
    And I should see "2018-01-02"

  Scenario:
    Given I am on the homepage
    And I follow "create-button"
    And I fill in "title" with "mee"
    And I fill in "description" with "short description"
    And I fill in "begin" with "01/01/2018"
    And I fill in "end" with "02/01/2018"
    When I press "add"
    Then I should see "The input is less than 4 characters long"

  Scenario:
    Given I am on the homepage
    And I follow "create-button"
    And I fill in "title" with "meetup1"
    And I fill in "description" with "short"
    And I fill in "begin" with "01/01/2018"
    And I fill in "end" with "02/01/2018"
    When I press "add"
    Then I should see "The input is less than 10 characters long"

  Scenario:
    Given I am on the homepage
    And I follow "create-button"
    And I fill in "title" with "meetup1"
    And I fill in "description" with "short desscritpion"
    And I fill in "begin" with "02/01/2018"
    And I fill in "end" with "01/01/2018"
    When I press "add"
    Then I should see "Start time must be before end time"