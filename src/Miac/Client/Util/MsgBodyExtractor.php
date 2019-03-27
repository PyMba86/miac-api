<?php

namespace Miac\Client\Util;

/**
 * Class MsgBodyExtractor
 * @package Miac\Client\Util
 */
class MsgBodyExtractor
{

    /**
     * Extracts the message content from the soap envelope (i.e. everything under the soap body)
     *
     * @param string $soapResponse
     * @return string|null
     */
    public function extract($soapResponse)
    {
        $messageBody = null;
        $messageBody = $this->getStringBetween($soapResponse, '<SOAP-ENV:Body>', '</SOAP-ENV:Body>');
        if (empty($messageBody) || false === $messageBody) {
            $messageBody = $this->getStringBetween($soapResponse, '<soap:Body>', '</soap:Body>');
        }
        return $messageBody;
    }
    /**
     * Get substring between two strings
     *
     * @param $string
     * @param $start
     * @param $end
     * @return bool|string
     */
    private function getStringBetween($string, $start, $end)
    {
        $startPos = strpos($string, $start) + strlen($start);
        $endPos = strlen($string) - strpos($string, $end);
        return substr($string, $startPos, -$endPos);
    }
}