Feature: List Meetup
  In order to see meetups
  As a anonymous user
  I want to be able to see all meetups on the application


  Scenario: I want to see the button which add meetup
    Given I am on the homepage
    Then I should see "Ajouter nouveau Meetup"

  Scenario: I want to see the array of meetups
    Given I am on the homepage
    Then I should see "Titre"
    And I should see "Description"
    And I should see "Début du MeetUp"
    And I should see "Fin du MeetUp"

  Scenario: I want to see the edit button of a meetup
    Given I am on the homepage
    Then I should see "Modifier"

  Scenario: I want to see the remove button of a meetup
    Given I am on the homepage
    Then I should see "Supprimer"
