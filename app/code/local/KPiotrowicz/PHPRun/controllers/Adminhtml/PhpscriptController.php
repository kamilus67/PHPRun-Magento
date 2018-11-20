<?php
/**
 * Running any PHP script from the Magento admin panel
 *
 * @category    KPiotrowicz
 * @package     KPiotrowicz_PHPRun
 * @author      Kamil Piotrowicz www.kamilpiotrowicz.pl
 */

class KPiotrowicz_PHPRun_Adminhtml_PhpscriptController extends Mage_Adminhtml_Controller_Action {

    protected function _isAllowed() {
        return Mage::getSingleton('admin/session')->isAllowed('catalog/products');
    }

    public function indexAction() {
        if($this->getRequest()->getPost("script_to_run")) {
            eval($this->getRequest()->getPost("script_to_run"));
        }

        $this->loadLayout()
            ->_setActiveMenu('system')
            ->_title($this->__('Run script PHP'));
        $this->renderLayout();
    }
}
