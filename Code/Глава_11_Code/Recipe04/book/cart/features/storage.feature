Feature: Shopping cart storage
  I need to be able to put items into a storage

  Scenario: Checking empty storage
    Given there is a clean storage
    Then I should have empty storage

  Scenario: Save items into storage
    Given there is a clean storage
    When I save 3 pieces of 7 product to the storage
    Then I should have 3 peaces of 7 product in the storage