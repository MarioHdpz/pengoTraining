<?php

namespace Pengo\GeoIP\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\HTTP\ClientFactory;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Magento\Framework\Registry;
use Magento\Framework\Serialize\SerializerInterface;

class CaptureCountryObserver implements ObserverInterface
{
    const FREEGEOIP_URL = "http://freegeoip.net/json/";

    /**
     * @var RemoteAddress
     */
    private $remoteAddress;
    /**
     * @var ClientFactory
     */
    private $clientFactory;
    /**
     * @var SerializerInterface
     */
    private $serializer;
    /**
     * @var Registry
     */
    private $registry;

    /**
     * CaptureCountryObserver constructor.
     * @param RemoteAddress $remoteAddress
     * @param ClientFactory $clientFactory
     * @param SerializerInterface $serializer
     * @param Registry $registry
     */
    public function __construct(
        RemoteAddress $remoteAddress,
        ClientFactory $clientFactory,
        SerializerInterface $serializer,
        Registry $registry
    ) {
        $this->remoteAddress = $remoteAddress;
        $this->clientFactory = $clientFactory->create();
        $this->serializer = $serializer;
        $this->registry = $registry;
    }


    public function execute(Observer $observer)
    {
        if( $this->registry->registry("country_code") ) {
            return;
        }
        // obtener ip
        $userip = getenv('HTTP_CLIENT_IP');

        $url = self::FREEGEOIP_URL . $userip;

        try {
            $this->clientFactory->get( $url );
            $response = $this->clientFactory->getBody();
            $data = $this->serializer->unserialize( $response );

        } catch ( \Exception $e ) {

        }

        $country_code = isset( $data[ "country_code"])
                            && $data["country_code"]
                            ? $data["country_code"] :"default";


        // region_code
        // city

        if( !$this->registry->registry("country_code") ) {
            $this->registry->register("country_code", $country_code );
        }
    }
}