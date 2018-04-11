<?php

namespace Pengo\GeoIP\Plugin;

use Magento\Framework\Registry;

class HtmlHeaderAroundPlugin
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

    public function aroundGetWelcome(\Magento\Theme\Block\Html\Header $subject, callable $proceed)
    {
        if($this->registry->registry('country_code') == 'MX') {
            $result = $proceed();
        } else {
            $result = __("Buuu!, You're not living in Mexico");
        }
        return $result;
    }

}