<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class template {
        var $ci;
         
        function __construct(){
            $this->ci =& get_instance();
        }

		function load($menu, $data = null) {
			if ($menu != ""){
				$user_type = $data['user_type'];
				$function =  $data['function'];
				$sub_module =  $data['sub_module'];
				$edit = $data['edit'];
				$owner = $data['owner'];
				$width = $data['width'];


				if ($user_type == "1"){
					/*admin*/
					$data['header'] = 'admin/header';

					if ($menu == "0"){
						$data['page'] = 'admin/menu';
					}else if ($menu == "1"){
						if ($function == "1"){
							$data['page'] = 'admin/user_registry/user_registry_entry';							
						}else if ($function == "2"){
							if ($edit == "0"){
								$data['page'] = 'admin/user_registry/user_registry_query';														
							}else if ($edit == "1"){
								$data['page'] = 'admin/user_registry/user_registry_edit';														
							}
						}else if ($function == "3"){
							$data['page'] = 'admin/user_registry/user_registry_query';														
						}else if ($function == "4"){
							$data['page'] = 'admin/user_registry/user_registry_query';														
						}
					}else if ($menu == "2"){
						if ($function == "1"){
							$data['page'] = 'admin/user_registry/user_registry_entry';							
						}else if ($function == "2"){
							if ($edit == "0"){
								$data['page'] = 'admin/outletko/outletko_query';														
							}else if ($edit == "1"){
								$data['page'] = 'admin/outletko/outletko_edit';														
							}
						}else if ($function == "3"){
							$data['page'] = 'admin/outletko/outletko_query';														
						}else if ($function == "4"){
							$data['page'] = 'admin/outletko/outletko_query';														
						}

					}else if ($menu == "3"){

					}else if ($menu == "4"){

					}else if ($menu == "5"){
						if ($sub_module == "25"){
							if ($function == "1"){
								$data['page'] = 'admin/master_data/business_type/business_type_entry';							
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'admin/master_data/business_type/business_type_query';														
								}else if ($edit == "1"){
									$data['page'] = 'admin/master_data/business_type/business_type_edit';														
								}
							}else if ($function == "3"){
								$data['page'] = 'admin/master_data/business_type/business_type_query';														
							}else if ($function == "5"){
								$data['page'] = 'admin/master_data/business_type/business_type_query';														
							}							
						}
					}else if ($menu == "6"){

					}else if ($menu == "7"){

					}
				}else if ($user_type == "2"){
					/*eoutletsuite application*/
					$data['header'] = 'application/header';

					if ($menu == "0"){
							$data['page'] = 'application/main_menu';
					}else if ($menu == "1"){
						if ($function == "1"){
							if ($width <= "768"){
								$data['page'] = 'application/sales/sales_entry_tab';							
							}else{
								$data['page'] = 'application/sales/sales_entry';							
							}
						}else if ($function == "2"){
							if ($edit == "0"){
								$data['page'] = 'application/sales/sales_query';														
							}else if ($edit == "1"){
								$data['page'] = 'application/sales/sales_edit';														
							}
						}else if ($function == "3"){
							$data['page'] = 'application/sales/sales_query';														
						}else if ($function == "4"){
							$data['page'] = 'application/sales/sales_query';														
						}else if ($function == "6"){
							$data['page'] = 'application/sales/end_day';																					
						}
					}else if ($menu == "2"){
						if ($function == "1"){
							$data['page'] = 'application/eoutlet/outlet_entry';							
						}else if ($function == "2"){
							if ($edit == "0"){
								$data['page'] = 'application/eoutlet/outlet_query';														
							}else if ($edit == "1"){
								$data['page'] = 'application/eoutlet/outlet_edit';														
							}
						}else if ($function == "3"){
							$data['page'] = 'application/eoutlet/outlet_query';														
						}else if ($function == "4"){
							$data['page'] = 'application/eoutlet/outlet_query';														
						}
					}else if ($menu == "3"){
						if ($sub_module == "1"){
							if ($function == "1"){
								$data['page'] = 'application/inventory/receive/receive_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/inventory/receive/receive_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/inventory/receive/receive_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/inventory/receive/receive_query';
							}else if ($function == "4"){
								$data['page'] = 'application/inventory/receive/receive_query';
							}
						}else if ($sub_module == "2"){
							if ($function == "1"){
								$data['page'] = 'application/inventory/issuance/issuance_entry';						
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/inventory/issuance/issuance_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/inventory/issuance/issuance_edit';							
								}
							}else if ($function == "3"){
								$data['page'] = 'application/inventory/issuance/issuance_query';						
							}else if ($function == "4"){
								$data['page'] = 'application/inventory/issuance/issuance_query';							
							}
						}else if ($sub_module == "3"){
							if ($function == "1"){
								$data['page'] = 'application/inventory/transfer/transfer_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/inventory/transfer/transfer_query';										
								}else if ($edit == "1"){
									$data['page'] = 'application/inventory/transfer/transfer_edit';	
								}
							}else if ($function == "3"){
								$data['page'] = 'application/inventory/transfer/transfer_query';	
							}else if ($function == "4"){
								$data['page'] = 'application/inventory/transfer/transfer_query';
							}
						}else if ($sub_module == "4"){
							if ($function == "1"){
								$data['page'] = 'application/inventory/returns/return_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/inventory/returns/return_query';								
								}else if ($edit == "1"){
									$data['page'] = 'application/inventory/returns/return_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/inventory/returns/return_query';							
							}else if ($function == "4"){
								$data['page'] = 'application/inventory/returns/return_query';							
							}
						}else if ($sub_module == "27"){
							if ($function == "1"){
								$data['page'] = 'application/inventory/adjustment/adjustment_entry';
							}else if ($function = "3"){
								$data['page'] = 'application/inventory/adjustment/adjustment_query';
							}
						}
					}else if ($menu == "4"){
						if ($sub_module == "5"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/product/product_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/product/product_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/product/product_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/product/product_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/product/product_query';
							}
						}else if ($sub_module == "6"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/customer/customer_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/customer/customer_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/customer/customer_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/customer/customer_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/customer/customer_query';
							}
						}else if ($sub_module == "7"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/supplier/supplier_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/supplier/supplier_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/supplier/supplier_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/supplier/supplier_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/supplier/supplier_query';
							}
						}else if ($sub_module == "8"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/product_type/product_type_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/product_type/product_type_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/product_type/product_type_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/product_type/product_type_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/product_type/product_type_query';
							}
						}else if ($sub_module == "9"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/product_brand/product_brand_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/product_brand/product_brand_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/product_brand/product_brand_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/product_brand/product_brand_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/product_brand/product_brand_query';
							}
						}else if ($sub_module == "10"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/product_category/product_category_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/product_category/product_category_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/product_category/product_category_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/product_category/product_category_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/product_category/product_category_query';
							}
						}else if ($sub_module == "11"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/product_class/product_class_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/product_class/product_class_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/product_class/product_class_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/product_class/product_class_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/product_class/product_class_query';
							}
						}else if ($sub_module == "12"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/product_color/product_color_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/product_color/product_color_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/product_color/product_color_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/product_color/product_color_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/product_color/product_color_query';
							}
						}else if ($sub_module == "13"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/product_model/product_model_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/product_model/product_model_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/product_model/product_model_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/product_model/product_model_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/product_model/product_model_query';
							}
						}else if ($sub_module == "14"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/product_size/product_size_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/product_size/product_size_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/product_size/product_size_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/product_size/product_size_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/product_size/product_size_query';
							}
						}else if ($sub_module == "15"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/product_unit/product_unit_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/product_unit/product_unit_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/product_unit/product_unit_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/product_unit/product_unit_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/product_unit/product_unit_query';
							}
						}else if ($sub_module == "16"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/payment_type/payment_type_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/payment_type/payment_type_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/payment_type/payment_type_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/payment_type/payment_type_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/payment_type/payment_type_query';
							}
						}else if ($sub_module == "21"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/customer_type/customer_type_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/customer_type/customer_type_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/customer_type/customer_type_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/customer_type/customer_type_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/customer_type/customer_type_query';
							}
						}else if ($sub_module == "22"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/supplier_type/supplier_type_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/supplier_type/supplier_type_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/supplier_type/supplier_type_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/supplier_type/supplier_type_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/supplier_type/supplier_type_query';
							}
						}else if ($sub_module == "23"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/sales_discount/sales_discount_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/sales_discount/sales_discount_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/sales_discount/sales_discount_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/sales_discount/sales_discount_query';
							}else if ($function == "5"){
								$data['page'] = 'application/master_data/sales_discount/sales_discount_query';
							}							
						}else if ($sub_module == "24"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/bank_maintenance/bank_maintenance_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/bank_maintenance/bank_maintenance_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/bank_maintenance/bank_maintenance_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/bank_maintenance/bank_maintenance_query';
							}else if ($function == "5" || $function == "4"){
								$data['page'] = 'application/master_data/bank_maintenance/bank_maintenance_query';
							}														
						}else if ($sub_module == "26"){
							if ($function == "1"){
								$data['page'] = 'application/master_data/outlet_type/outlet_type_entry';
							}else if ($function == "2"){
								if ($edit == "0"){
									$data['page'] = 'application/master_data/outlet_type/outlet_type_query';
								}else if ($edit == "1"){
									$data['page'] = 'application/master_data/outlet_type/outlet_type_edit';
								}
							}else if ($function == "3"){
								$data['page'] = 'application/master_data/outlet_type/outlet_type_query';
							}else if ($function == "5" || $function == "4"){
								$data['page'] = 'application/master_data/outlet_type/outlet_type_query';
							}														
						}
					}else if ($menu == "5"){
						if ($function == "1"){
							$data['page'] = 'application/sales_force/sales_force_entry';
						}else if ($function == "2"){
							if ($edit == "0"){
								$data['page'] = 'application/sales_force/sales_force_query';
							}else if ($edit == "1"){
								$data['page'] = 'application/sales_force/sales_force_edit';
							}
						}else if ($function == "3"){
							$data['page'] = 'application/sales_force/sales_force_query';
						}else if ($function == "5"){
							$data['page'] = 'application/sales_force/sales_force_query';
						}else if ($function == "6"){
							$data['page'] = 'application/sales_force/user_roles';							
						}						
					}else if ($menu == "6"){
						$data['page'] = 'application/reports/report_main';
					}else if ($menu == "7"){

					}else if ($menu == "8"){
						if ($function == "2"){
							if ($owner > 0){
								$data['page'] = 'application/users/user_owner_edit';								
							}else{								
								$data['page'] = 'application/users/user_account_edit';								
							}
						}else if ($function == "3"){
							if ($owner > 0){
								$data['page'] = 'application/users/user_owner_query';
							}else{
								$data['page'] = 'application/users/user_account_query';								
							}
						}else if ($function == "6"){
							$data['page'] = 'application/users/user_change_password';							
						}						
					}

				}else if ($user_type == "3"){
					/*partner/agent*/
					$data['header'] = 'partner/header';

					if ($menu == "0"){
						$data['page'] = 'partner/menu';
					}else if ($menu == "1"){
						$data['page'] = 'partner/portfolio/portfolio_query';
					}
				}else if ($user_type == "4"){
					/*outletko*/

					$data['header'] = 'seller/header';

					if ($menu == "0"){
						$data['page'] = 'seller/user/user.php';
					}else if ($menu == "1"){
						$data['page'] = 'partner/portfolio/portfolio_query';
					}

				}else if ($user_type == "5"){
					/*outletko user*/
					$data['header'] = 'buyer/header';

					if ($menu == "1"){
						$data['page'] = 'login_search';
					}else if ($menu == "2"){
						$data['page'] = 'buyer/my_order/my_order';
					}else if ($menu == "3"){
						$data['page'] = 'buyer/user/user';
					}else{
						$data['page'] = 'outletko/profile/profile';
					}


				}else if ($user_type == "6"){
					/* no user */
					$data['header'] = 'outletko/header';
					
					if ($menu == "1"){
						$data['page'] = 'login_search';
					}else{
						$data['page'] = 'outletko/profile/profile';
					}

				
				
				}else if ($user_type == "7"){
					$data['header'] = 'outletko/header';

					if ($menu == "1"){
						$data['page'] = 'website/aboutus';
					}else if ($menu == "2"){
						$data['page'] = 'website/terms';
					}else if ($menu == "3"){
						$data['page'] = 'website/privacy';
					}else if ($menu == "4"){
						$data['page'] = 'website/contactus';
					}


				}else{

				}

				if ($user_type == "6" || $user_type == "7"){
				    $this->ci->load->view('templates/template2', $data);
				}else{
				    $this->ci->load->view('templates/template', $data);
				}
			}else{
				$this->ci->load->view('login');
			}
		}

    }