<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Firefox\FirefoxDriver;
use Facebook\WebDriver\Firefox\FirefoxProfile;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class GoogleSearchChromeTest extends TestCase
{
    protected $webDriver;

    public function setUp(): void
    {
        $capabilities = $this->build_chrome_capabilities();
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/', $capabilities);
    }

    public function build_chrome_capabilities()
    {
        $capabilities = DesiredCapabilities::chrome();

        return $capabilities;
    }

    /*
    * @test
    */ 
    public function test_searchTextOnGoogle()
    {
        $this->webDriver->get("https://www.google.com/ncr");
        $this->webDriver->manage()->window()->maximize();
        
        sleep(5);
        
        $element = $this->webDriver->findElement(WebDriverBy::name("q"));
        if($element) {
            $element->sendKeys("LambdaTest");
            $element->submit();
        }
    
        print $this->webDriver->getTitle();
        $this->assertEquals('LambdaTest - Google Search', $this->webDriver->getTitle());
    }

    public function tearDown(): void
    {
        $this->webDriver->quit();
    }
}
?>