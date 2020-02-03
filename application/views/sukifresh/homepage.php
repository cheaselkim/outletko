<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sukifresh/homepage.css') ?>">

<div class="container">
	
	<div class="row">
		<div class="col-12 col-lg-12 col-md-12 col-sm-12">
			<div class="row div-header">
				<div class="col-12 col-lg-2 col-md-3 col-sm-12 pl-0 text-center">
					<a href="<?php echo base_url('sukifresh') ?>"><img src="<?php echo base_url('assets/images/sukifresh/logo-2.jpg') ?>" class="img-logo"></a>
				</div>
				<div class="col-12 col-lg-10 col-md-9 col-sm-12 div-header-search-bar">
					<div class="row ">
						<div class="col-12 col-lg-7 col-md-5 col-sm-12 pb-1 px-0">

			                <div class="input-group">
				                <input type="text" class="form-control px-2 border-dark-green" name="product_outlet" placeholder="Search Products" aria-label="Username" aria-describedby="basic-addon1">
				                <div class="input-group-append ">
				                	<button class="input-group-text btn btn-dark-green"><i class="fa fa-search"></i></button>
				                </div>
			                </div>

						</div>
						<div class="col-12 col-lg-3 col-md-4 col-sm-12" hidden>
							<div class="row pad-left-5">
								<button class="btn text-dark-green">Contact Us</button>								
								<button class="btn text-dark-green">Help</button>	
							</div>
						</div>
						<?php if ($this->session->userdata('login') == "0"){ ?>
						<div class="col-12 col-lg-2 col-md-3 col-sm-12 px-0 pb-2 ml-auto">
							<a href="<?php echo base_url('sukifresh/account') ?>" class="text-decoration-none"><button class="btn btn-orange btn-block px-0 text-center">Create Account</button></a>							
						</div>
						<?php }else{ ?>
						<div class="col-12 col-lg-2 col-md-3 col-sm-12 px-0 pb-2 ml-auto">
							<a href="<?php echo base_url('sukifresh/logout') ?>" class="text-decoration-none"><button class="btn btn-danger btn-block px-0 text-center">Sign Out</button></a>							
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php  ?>
    <div class="row div-menu-header-0">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
           <div class="row div-menu-header">
           		<?php if ($this->session->userdata('login') != "2"){ ?>
	           		<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-1">
		           		<ul class="list-inline pt-1w">
		           			<a href="<?php echo base_url('sukifresh/vegetable') ?>"><li class="text-uppercase list-inline-item font-size-16 list-menu mr-3">Vegetables</li></a>
		           			<a href="<?php echo base_url('sukifresh/fruits') ?>"><li class="text-uppercase list-inline-item font-size-16 list-menu">Fruits</li></a>
		           		</ul>           			
	           		</div>
	           	<?php }else if ($this->session->userdata('login') == "2"){ ?>
	           		<div class="col-12 col-lg-12 col-md-12 col-sm-12 py-1" id="div-header-menu">
		           		<ul class="list-inline">
		           			<li class="text-uppercase list-inline-item font-size-18 list-menu mr-3 list-sales-admin cursor-pointer" onclick="main_menu(1);">Sales Admin</li>
		           			<li class="text-uppercase list-inline-item font-size-18 list-menu mr-3 list-inventory cursor-pointer" onclick="main_menu(2);">Inventory</li>
		           			<li class="text-uppercase list-inline-item font-size-18 list-menu mr-3 list-returns cursor-pointer" onclick="main_menu(3);">Sales Returns</li>
		           			<li class="text-uppercase list-inline-item font-size-18 list-menu mr-3 list-delivery cursor-pointer" onclick="main_menu(4);">Delivery</li>
		           			<li class="text-uppercase list-inline-item font-size-18 list-menu mr-3 list-sales-force cursor-pointer" onclick="main_menu(5);">Sales Force</li>
		           			<li class="text-uppercase list-inline-item font-size-18 list-menu mr-3 list-master-data cursor-pointer" onclick="main_menu(6);">Master Data</li>
		           			<li class="text-uppercase list-inline-item font-size-18 list-menu mr-3 list-eis cursor-pointer" onclick="main_menu(7);">EIS</li>
		           			<li class="text-uppercase list-inline-item font-size-18 list-menu list-system-admin cursor-pointer" onclick="main_menu(8);">System Admin</li>
		           		</ul>           			
	           		</div>
	           	<?php } ?>
           </div> 
        </div>
    </div>



     <?php  
    
	    if ($page_type == "fruits"){
		    $this->load->view('sukifresh/fruits'); 
		}else if ($page_type == "account"){
		    $this->load->view('sukifresh/account'); 
		}else if ($page_type == "myaccount"){
			$this->load->view("sukifresh/myaccount");
		}else if ($page_type == "myaccount-order"){
			$this->load->view("sukifresh/myaccount_order");
	   	}else if ($page_type == "admin"){
	   		$this->load->view('sukifresh/admin');
	    }else{
		    $this->load->view('sukifresh/vegetable'); 
	    }

    ?> 

    <div class="row mt-2">
    	<div class="col-12 col-lg-12 col-md-12 col-sm-12">
    		<div class="row div-menu-footer">
    			<div class="col-12 col-lg-12 col-md-12 col-sm-12">
    				<div class="row">
    					<button class="btn text-white font-weight-600">About Us</button>
    					<button class="btn text-white font-weight-600">Privacy Policy</button>
    					<button class="btn text-white font-weight-600">Terms of Use</button>
						<button class="btn text-white font-weight-600">Contact Us</button>								
						<button class="btn text-white font-weight-600">Help</button>	
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
