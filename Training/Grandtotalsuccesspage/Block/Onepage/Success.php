<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training\Grandtotalsuccesspage\Block\Onepage;

/**
 * One page checkout success page
 */
class Success extends \Magento\Checkout\Block\Onepage\Success
{

    protected $orderItemsDetails;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Sales\Model\Order $orderItemsDetails
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Sales\Model\Order\Config $orderConfig,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Sales\Model\Order $orderItemsDetails,
        array $data = []
    ) {
        parent::__construct($context, $checkoutSession, $orderConfig, $httpContext, $data);
        $this->orderItemsDetails = $orderItemsDetails;
    }

    public function getOrderItemsDetails()
    {
        $IncrementId  = $this->_checkoutSession->getLastRealOrder()->getIncrementId();
        $order_information = $this->orderItemsDetails->loadByIncrementId($IncrementId);
       return $order_information;
    }
}
