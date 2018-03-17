Feature: Shopping cart
  In order to buy products
  As a customer
  I need to be able to put interesting products into a cart

  Scenario: Checking empty cart
    Given there is a clean cart
    Then I should have 0 products
    Then I should have 0 product
    And the overall cart amount should be 0

  Scenario: Adding products to the cart
    Given there is a clean cart
    When I add 3 pieces of 5 product
    Then I should have 3 peaces of 5 product
    And I should have 1 product
    And the overall cart amount should be 3

    When I add 14 pieces of 7 product
    Then I should have 3 peaces of 5 product
    And I should have 14 peaces of 7 product
    And I should have 2 products
    And the overall cart amount should be 17

    When I add 10 pieces of 5 product
    Then I should have 13 peaces of 5 product
    And I should have 14 peaces of 7 product
    And I should have 2 products
    And the overall cart amount should be 27

  Scenario: Change product count in the cart
    Given there is a cart with 5 pieces of 7 product
    When I set 3 pieces for 7 product
    Then I should have 3 peaces of 7 product

  Scenario: Remove products from the cart
    Given there is a cart with 5 pieces of 7 product
    When I add 14 pieces of 7 product
    And I clear cart
    Then I should have empty cart