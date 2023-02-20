# Selenium - Automated testing

- Launch chrome driver : `chromedriver.exe --port=4444`
- Launch phpunit test script : `./vendor/bin/phpunit src`

```bash
$ ./vendor/bin/phpunit src
PHPUnit 9.6.3 by Sebastian Bergmann and contributors.

R.                                                                  2 / 2 (100%)

Time: 00:46.419, Memory: 8.00 MB

There was 1 risky test:

1) App\Selenium\EmailForceAttackChromeTest::testEmailAutofill
This test did not perform any assertions

C:\wamp64\www\selenium-automated-test\src\Selenium\EmailForceAttackChromeTest.php:17

OK, but incomplete, skipped, or risky tests!
Tests: 2, Assertions: 1, Risky: 1.
```