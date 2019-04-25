<?php

namespace Miac;

use Miac\Client\RequestOptions;

class NsiClient extends Client {

    /**
     * GetRefBookPartial
     *
     * @param RequestOptions\GetRefBookPartialOptions $options
     * @param array $messageOptions
     * @return Client\Result
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function getRefBookPartial(
        RequestOptions\GetRefBookPartialOptions $options,
        $messageOptions = [])
    {
        $msgName = "getRefBookPartial";
        return $this->callMessage($msgName, $options, $messageOptions);
    }

    /**
     * GetRefBookList
     *
     * @param RequestOptions\GetRefBookListOptions $options
     * @param array $messageOptions
     * @return Client\Result
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function getRefBookList(
        RequestOptions\GetRefBookListOptions $options,
        $messageOptions = [])
    {
        $msgName = "getRefBookList";
        return $this->callMessage($msgName, $options, $messageOptions);
    }

    /**
     * GetRefBookList
     *
     * @param RequestOptions\GetRefBookPartsOptions $options
     * @param array $messageOptions
     * @return Client\Result
     * @throws Client\Exception
     * @throws Client\InvalidMessageException
     */
    public function getRefBookParts(
        RequestOptions\GetRefBookPartsOptions $options,
        $messageOptions = [])
    {
        $msgName = "getRefBookParts";
        return $this->callMessage($msgName, $options, $messageOptions);
    }
}