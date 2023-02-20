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

class BaseChrome extends TestCase
{
    protected $webDriver;

    public function setUp(): void
    {
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/', DesiredCapabilities::chrome());
        $this->webDriver->manage()->window()->maximize();
    }

    public function tearDown(): void
    {
        $this->webDriver->quit();
    }
}
?>