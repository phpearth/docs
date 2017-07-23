# Behavior driven development

Behavior driven development (BDD) is a software development process that evolved from
TDD. It makes tests more natural by making English sentences that express certain
behavior. It is an outside-in way of developing software, where you make examples
of how the software should behave (feedback from stakeholders being either
clients, your users or you) to achieve certain goals.

## StoryBDD

There are two types of BDD - StoryBDD and SpecBDD. StoryBDD focuses on business
and features. Here is a quick and simplified *example* of a login functionality
based on [Behat](http://docs.behat.org) framework. By communicating with
stackeholders, developers create login *scenario* (or an *example* in BDD):

```yaml
Feature: Login
  I want to have access to certain page only if I provide
  correct username and secret password

  Scenario: Checking username and password
    Given I am on a login page "login"
    And I provide username "foo"
    And I provide password "bar"
    When I run "Login"
    Then I should see:
      """
      Login is successful.
      """
```

This ensures that developers understand how stackeholder want this functionality
to work, and that stackeholders expect this functionality to be implemented like
developers are planning to implement it.

Instead of writing unit tests like with TDD, the scenario is also your test before
writing the code.

## SpecBDD

The second type of BDD is SpecBDD which focuses on technical behavior of code.
Specifications describe how the certain code should behave. Instead of testing part
of your code, you are describing that part of the code.

## See also

Articles and tools you should check out:

* Articles:
    * [BDD article on Wikipeida](http://en.wikipedia.org/wiki/Behavior-driven_development)
    * [Introducing BDD](http://dannorth.net/introducing-bdd/) - Article by Dan North
    * [What's in a story, by Dan North](http://dannorth.net/whats-in-a-story/)
* PHP Tools:
    * [Codeception](http://codeception.com/)
    * [Behat](http://docs.behat.org/) - Behavior Driven Development Framework
      for PHP you should check out.
    * [Pho](https://github.com/danielstjules/pho)
    * [PHPSpec](http://www.phpspec.net/)
    * [Kahlan](https://kahlan.github.io/docs/)
