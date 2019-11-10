<script type="text/javascript" src="<?php echo base_url() ?>js/application/sales_force/user_role.js"></script>
<div class="container-fluid pt-3">
    <input type="hidden" id="outlet_id" value="<?php echo $this->session->userdata('comp_id');?>">
    <input type="hidden" id="sales_force_id" value="1">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-md-4 text-date">
                        <span>User Roles</span>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="my-2">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-md-4" id="user-table" style="background-color: rgb(142,180,227);">
                        
                    </div>

                    <div class="col-xs-12 col-md-8">
                        <table class="table table-striped table-responsive" style="height: 450px;" id="table_check">
                            <thead>
                                <tr>
                                    <th style="width: 8%; vertical-align: top; " rowspan="4">Module</th>
                                    <th style="width: 50%; vertical-align: top; " rowspan="4">Sub Module</th>
                                    <th style="width: 50%;" colspan="6">Function</th>
                                </tr>
                                <tr>
                                    <th>All</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Cancel</th>
                                    <th>View</th>
                                </tr> 
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>Sales</td>
                                    <td>Transaction</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control "></td>
                                    <td><input type="checkbox" class="form-control "></td>
                                    <td><input type="checkbox" class="form-control " hidden></td>
                                    <td><input type="checkbox" class="form-control "></td>
                                    <td><input type="checkbox" class="form-control "></td>
                                </tr>

                                <tr>
                                    <td>Store Outlet</td>
                                    <td></td>
                                    <td><input type="checkbox" class="form-control" ></td>
                                    <td><input type="checkbox" class="form-control "></td>
                                    <td><input type="checkbox" class="form-control "></td>
                                    <td><input type="checkbox" class="form-control "></td>
                                    <td><input type="checkbox" class="form-control " hidden></td>
                                    <td><input type="checkbox" class="form-control "></td>
                                </tr>

                                <tr>
                                    <td rowspan="2" >Products</td>
                                    <td>Item Master File</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type=
                                        "checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control" hidden></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>Item Tools</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td rowspan="4">Inventory</td>
                                    <td>Receiving</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>Issuance</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>Transfer</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>Returns</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>Customer Master File</td>
                                    <td></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>Supplier Master File</td>
                                    <td></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>Sales Force</td>
                                    <td></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td rowspan="2">User Account</td>
                                    <td>Change Password</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>User Account Info</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td rowspan="4">Statistic Reports</td>
                                    <td>Sales Report per Transaction</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>Sales Report per Product / Service</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>Sales Report per eOutlet</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>Stock on Hand Report</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td rowspan="3">Tools</td>
                                    <td>Outlet Menu</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr> 

                                <tr>
                                    <td>Main Menu</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr> 

                                <tr>
                                    <td>User Restriction</td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                    <td><input type="checkbox" class="form-control"></td>
                                </tr>                      
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="row pt-5">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 pl-0">
                        <button id="save" class="btn btn-block btn-primary">Save</button>
                    </div>                     
                    <div class="col-lg-4">
                        <a href="<?php echo base_url(); ?>" class="btn btn-block btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

