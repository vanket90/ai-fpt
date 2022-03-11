<?php


namespace OneSite\AI\FPT;


/**
 * Class IDRecognitionResponse
 * @package OneSite\AI\FPT
 */
class IDRecognitionResponse
{
    /**
     * @var array
     */
    public $idRecognitionResponse = [
        0 => 'No error -- This is a successful call, no error',
        1 => 'Invalid Parameters or Values! -- Wrong parameter in the request (e.g. no key or image in the request body).',
        2 => 'Failed in cropping -- The Vietnamese ID card in the image is missing of corners so it cannot be cropped to the standard format.',
        3 => 'Unable to find ID card in the image -- The system cannot find the Vietnamese ID card in the image or the image is of poor quality (too blur, too dark/bright).',
        5 => 'No URL in the request -- The request uses the image_url key but the value is left blank.',
        6 => 'Failed to open the URL! -- The request uses the image_url key but the system cannot open this URL.',
        7 => 'Invalid image file -- The uploaded file is not an image file.',
        8 => 'Bad data -- The uploaded image file is corrupted or the format is not supported.',
        9 => 'No string base64 in the request -- The request uses image_base64 key but the value is left blank.',
        10 => 'String base64 is not valid -- The request uses image_base64 key but the provided string is invalid.',
    ];
}
