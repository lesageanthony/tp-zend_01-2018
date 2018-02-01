Feature: create Meetup
  In order to create a meetup
  As a anonymous user
  I want to be able to create a meetup on the application

  Scenario: I create a meetup when I fill title, description, meetup's begin, meetup's end
    Given Meetup is empty
    And I fill the meetup with title "meetup1", description "short description", begin "01/01/2018" and end "02/01/2018"
