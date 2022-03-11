<?php

namespace OneSite\AI\FPT;

use GuzzleHttp\Client;

/**
 * Class AIFPTService
 * @package OneSite\AI\FPT
 */
class AIFPTService
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $apiUrl = null;

    /**
     * @var null
     */
    private $apiKey = null;

    /**
     * BigQueryService constructor.
     */
    public function __construct()
    {
        $this->client = new Client();

        $this->apiUrl = config('ai.fpt.api_url');
        $this->apiKey = config('ai.fpt.api_key');
    }

    /**
     * @param $filePath
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getIDRecognitionInfo($filePath)
    {
        $response = $this->client->request('POST', $this->getApiUrl() . "/vision/idr/vnm?check=1&postcheck=1", [
            'http_errors' => false,
            'verify' => false,
            'headers' => [
                "api-key" => $this->getApiKey()
            ],
            'multipart' => [
                [
                    'name' => 'image',
                    'contents' => fopen($filePath, 'rb')
                ]
            ]
        ]);

        $data = json_decode($response->getBody());

        if ($data->errorCode != 0) {
            return [
                'error' => [
                    'message' => $data->errorMessage
                ]
            ];
        }

        return [
            'data' => $data->data
        ];
    }

    /**
     * @param $filePath
     * @return array
     */
    public function getPassportRecognitionInfo($filePath)
    {
        $response = $this->client->request('POST', $this->getApiUrl() . "/vision/passport/vnm", [
            'http_errors' => false,
            'verify' => false,
            'headers' => [
                "api-key" => $this->getApiKey()
            ],
            'multipart' => [
                [
                    'name' => 'image',
                    'contents' => fopen($filePath, 'rb')
                ]
            ]
        ]);

        $data = json_decode($response->getBody());

        if ($data->errorCode != 0) {
            return [
                'error' => [
                    'message' => $data->errorMessage
                ]
            ];
        }

        return [
            'data' => $data->data
        ];
    }

    /**
     * @param $cardFilePath
     * @param $imageFilePath
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFaceMatchImageInfo($cardFilePath, $imageFilePath)
    {
        $response = $this->client->request('POST', $this->getApiUrl() . "/dmp/checkface/v1", [
            'http_errors' => false,
            'verify' => false,
            'headers' => [
                "api-key" => $this->getApiKey()
            ],
            'multipart' => [
                [
                    'name' => 'file[]',
                    'contents' => fopen($cardFilePath, 'rb')
                ],
                [
                    'name' => 'file[]',
                    'contents' => fopen($imageFilePath, 'rb')
                ]
            ]
        ]);

        $data = json_decode($response->getBody());

        if ($data->code != 200) {
            return [
                'error' => [
                    'message' => $data->message,
                    'data' => !empty($data->data) ? $data->data : null
                ]
            ];
        }

        return [
            'data' => $data->data
        ];
    }

    /**
     * @param $cardFilePath
     * @param $videoFilePath
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFaceMatchVideoInfo($cardFilePath, $videoFilePath)
    {
        $response = $this->client->request('POST', $this->getApiUrl() . "/dmp/checklive/v2", [
            'http_errors' => false,
            'verify' => false,
            'headers' => [
                "api-key" => $this->getApiKey()
            ],
            'multipart' => [
                [
                    'name' => 'cmnd',
                    'contents' => fopen($cardFilePath, 'rb')
                ],
                [
                    'name' => 'video',
                    'contents' => fopen($videoFilePath, 'rb')
                ]
            ]
        ]);

        if ($response->getStatusCode() != 200) {
            return [
                'error' => [
                    'message' => 'Lỗi hệ thống',
                    'code' => $response->getStatusCode()
                ]
            ];
        }

        $data = json_decode($response->getBody());
        if ($data->code != 200) {
            return [
                'error' => [
                    'message' => $data->message,
                    'data' => !empty($data->data) ? $data->data : null
                ]
            ];
        }

        return [
            'data' => $data
        ];
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @return null
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }


}
