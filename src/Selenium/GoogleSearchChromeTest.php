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

class GoogleSearchChromeTest extends BaseChrome
{
    public function testSearchTextOnGoogle()
    {
        $this->webDriver->get("https://www.google.com/ncr");
        $this->webDriver->manage()->window()->maximize();

        sleep(5);

        $element = $this->webDriver->findElement(WebDriverBy::name("q"));
        if($element) {
            $element->sendKeys("LambdaTest");
            $element->submit();
        }

        $this->assertEquals('LambdaTest - Google Search', $this->webDriver->getTitle());
    }
}
