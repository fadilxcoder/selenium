<?php

namespace App\Selenium;

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Firefox\FirefoxDriver;
use Facebook\WebDriver\Firefox\FirefoxProfile;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Faker\Factory as Faker;

class EmailForceAttackChromeTest extends BaseChrome
{
    public function testEmailAutofill()
    {
        $faker = Faker::create();
        $this->webDriver->get("http://localhost:8881");
        $this->webDriver->manage()->window()->maximize();
        sleep(5);

        for ($i=0; $i<5; $i++):
            $input = $this->webDriver->findElement(WebDriverBy::id("login"));
            $input->sendKeys($faker->email());

            $input = $this->webDriver->findElement(WebDriverBy::id("password"));
            $input->sendKeys('admin');

            $btn = $this->webDriver->findElement(WebDriverBy::id("submit"));
            $btn->click();
            sleep(5);
        endfor;
    }
}
