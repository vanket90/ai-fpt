<?php


namespace OneSite\AI\FPT;


/**
 * Class FaceMatchVideoResponse
 * @package OneSite\AI\FPT
 */
class FaceMatchVideoResponse
{
    /**
     * @var array
     */
    public $idRecognitionResponse = [
        200 => 'No error -- Không có lỗi',
        408 => 'Trong video không có mặt người',
        409 => 'Không có video file trong request/ Sai extension của video',
        410 => 'Trong video có 2 mặt người',
    ];
}
