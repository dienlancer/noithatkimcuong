<?php
class AjaxController{
	
	public function __construct(){				
		add_action('wp_ajax_show_lst_invoice_detail',array($this,'show_lst_invoice_detail'));
		add_action('wp_ajax_load_payment_method_info',array($this,'load_payment_method_info'));		
		add_action('wp_ajax_nopriv_show_lst_invoice_detail', array($this,'show_lst_invoice_detail'));
		add_action('wp_ajax_nopriv_load_payment_method_info', array($this,'load_payment_method_info'));
		add_action('wp_head',array($this,'add_ajax_library'));
	}
		
	public function show_lst_invoice_detail(){
		global $zController;
		$id=(int)($zController->getParams("id"));	
		$invoice_model=$zController->getModel("/frontend","InvoiceModel");
		$lstCartInvoice=array();
		$lstCartInvoice=$invoice_model->getInvoiceDetailById($id);	
		echo json_encode($lstCartInvoice);
		die();
	}
	public function load_payment_method_info(){
		global $zController;
		$payment_method_id=(int)$zController->getParams("payment_method_id");	
		$payment_method_model=$zController->getModel("/frontend","PaymentMethodModel");
		$data=$payment_method_model->getPaymentMethodDetail($payment_method_id);		
		echo json_encode($data);
		die();
	}
	public function add_ajax_library(){
	
		$ajax_nonce = wp_create_nonce('ajax-security-code');
	
		$html = '<script type="text/javascript">';
		$html .= ' var ajaxurl = "' . admin_url('admin-ajax.php') . '"; ';
		$html .= ' var security_code = "' . $ajax_nonce . '"; ';
		$html .= '</script>';
	
		echo $html;
	}
	
	
}