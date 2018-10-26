<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Adobe\AxpConnector\Block;

/**
 * Checkout block.
 *
 * @api
 */
class Checkout extends Base
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Adobe\AxpConnector\Helper\Data $helper
     * @param \Magento\Checkout\Model\Cart $cartModel
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Adobe\AxpConnector\Helper\Data $helper,
        \Magento\Checkout\Model\Cart $cartModel,
        array $data
    ) {
        parent::__construct($context, $helper, $data);
        $this->cartModel = $cartModel;
    }

    /**
     * Datalayer.
     *
     * @return array
     */
    public function datalayer()
    {
        return $this->helper->checkoutStartedPushData($this->cartModel);
    }

    /**
     * Json Datalayer.
     *
     * @return string
     */
    public function datalayerJson()
    {
        $datalayer = $this->datalayer();
        return $this->helper->jsonify($datalayer);
    }
}
