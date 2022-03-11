<?php


namespace OneSite\AI\FPT\Tests;


use OneSite\AI\FPT\AIFPTService;
use PHPUnit\Framework\TestCase;


/**
 * Class AIFPTServiceTest
 * @package OneSite\AI\FPT\Tests
 */
class AIFPTServiceTest extends TestCase
{

    /**
     * @var AIFPTService
     */
    private $service;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->service = new AIFPTService();
    }

    /**
     *
     */
    public function tearDown(): void
    {
        $this->service = null;

        parent::tearDown();
    }

    /**
     * PHPUnit test: vendor/bin/phpunit --filter=testGetIDRecognition tests/AIFPTServiceTest.php
     */
    public function testGetIDRecognition()
    {
        $data = $this->service->getIDRecognitionInfo(storage_path('data/cccd-1.jpg'));
        //$data = $this->service->getIDRecognitionInfo(storage_path('data/image-fail.jpg'));

        print_r($data);

        $this->assertTrue(true);
    }

    /**
     * PHPUnit test: vendor/bin/phpunit --filter=testPPRecognition tests/AIFPTServiceTest.php
     */
    public function testPPRecognition()
    {
        $data = $this->service->getPassportRecognitionInfo(storage_path('data/pp-1.jpg'));
        //$data = $this->service->getIDRecognitionInfo(storage_path('data/image-fail.jpg'));

        print_r($data);

        $this->assertTrue(true);
    }

    /**
     * PHPUnit test: vendor/bin/phpunit --filter=testGetFaceMatchImageInfo tests/AIFPTServiceTest.php
     */
    public function testGetFaceMatchImageInfo()
    {
        $data = $this->service->getFaceMatchImageInfo(storage_path('data/cccd-1.jpg'), storage_path('data/image.jpg'));
        //$data = $this->service->getFaceMatchImageInfo(storage_path('data/cccd-1.jpg'), storage_path('data/image-fail.jpg'));

        print_r($data);

        $this->assertTrue(true);
    }

    /**
     * PHPUnit test: vendor/bin/phpunit --filter=testGetFaceMatchVideoInfo tests/AIFPTServiceTest.php
     */
    public function testGetFaceMatchVideoInfo()
    {
        $data = $this->service->getFaceMatchVideoInfo(storage_path('data/cccd-1.jpg'), storage_path('data/video.mp4'));
        //$data = $this->service->getFaceMatchVideoInfo(storage_path('data/image-fail.jpg'), storage_path('data/video.mp4'));

        print_r($data);

        $this->assertTrue(true);
    }
}
