<?php

namespace Pengo\GeoIP\Plugin;

use Magento\Framework\Registry;

class HtmlHeaderPlugin
{
    /**
     * @var Registry
     */
    private $registry;

    /**
     * HtmlHeaderPlugin constructor.
     * @param Registry $registry
     */
    public function __construct(
        Registry $registry
    ) {

        $this->registry = $registry;
    }

    public function afterGetWelcome(\Magento\Theme\Block\Html\Header $subject, $result)
    {
        if( $this->registry->registry("country_code") ) {
            $countryCode = $this->registry->registry("country_code");
            return $result. ' Your country: '.$countryCode;
        }
        return $result;
    }

    public function aroundGetWelcome(\Magento\Theme\Block\Html\Header $subject, callable $proceed)
    {
        if($this->registry->registry('country_code') == 'MX') {
            $result = $proceed();
        } else {
            $result = 'Buuu, no vives en México';
        }
        return $result;
    }

}