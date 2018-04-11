<?php

namespace Pengo\ProductTabs\Block;


use Magento\Framework\View\Element\Template;

class InfoTab extends Template
{
    public function getInfo() {
        $info = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat, tortor id ullamcorper condimentum, lorem massa suscipit neque, id malesuada mi urna sit amet ex. Proin aliquam nunc in tempor scelerisque. Vestibulum malesuada neque vitae purus euismod, eu condimentum velit tincidunt. Aliquam consequat metus ligula, id convallis dui bibendum eu. Phasellus a convallis enim. Sed mollis gravida metus eget dictum. Donec ante elit, tristique vel sapien ut, blandit dictum turpis. Mauris vitae luctus arcu. Sed viverra, mi ac elementum egestas, neque sem finibus tellus, quis pretium arcu est eget tortor. Duis pharetra maximus nunc, in vestibulum ante lobortis venenatis. Cras arcu ante, semper ut velit sodales, pulvinar scelerisque neque. Curabitur laoreet sed arcu ac vestibulum. Etiam eget mattis elit. Suspendisse commodo aliquam mauris non suscipit.';
        return $info;
    }
}