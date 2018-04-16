<?php

namespace Pengo\Knockout\Block\Checkout;

class LayoutProcessor implements \Magento\Checkout\Block\Checkout\LayoutProcessorInterface
{

    public function process($result)
    {
        $result = $this->getShippingFormFields($result);
        return $result;
    }

    public function getShippingFormFields($result)
    {
        if (isset($result['components']['checkout']['children']['steps']['children']
            ['shipping-step']['children']['shippingAddress']['children']
            ['shipping-address-fieldset'])
        ) {

            $shippingFields = $result['components']['checkout']['children']['steps']['children']
            ['shipping-step']['children']['shippingAddress']['children']
            ['shipping-address-fieldset']['children'];

            if (isset($shippingFields['firstname'])) {
                $shippingFields["firstname"]['validation']["letters-only" ] = true;
                $shippingFields["firstname"]['config']['elementTmpl'] = 'Pengo_Knockout/custom-input';
            }

            if (isset($shippingFields['lastname'])) {
                $shippingFields["lastname"]['validation']["letters-only" ] = true;
            }

            $result['components']['checkout']['children']['steps']['children']
            ['shipping-step']['children']['shippingAddress']['children']
            ['shipping-address-fieldset']['children'] = $shippingFields;

        }
        return $result;
    }

}
