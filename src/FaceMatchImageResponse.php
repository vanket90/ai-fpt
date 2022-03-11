<?php


namespace OneSite\AI\FPT;


/**
 * Class FaceMatchImageResponse
 * @package OneSite\AI\FPT
 */
class FaceMatchImageResponse
{
    /**
     * @var array
     */
    public $idRecognitionResponse = [
        200 => 'Success',
        407 => 'No faces detected',
        408 => 'Allowed extensions are jpg, jpeg',
        409 => 'More or less than 2 images for face check',
    ];
}
