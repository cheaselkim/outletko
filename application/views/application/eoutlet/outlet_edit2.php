<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/application/outlet.css') ?>">

<div class="container-fluid pt-5">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <!-- <div class="col-xs-12 col-md-4">
                        <button type="button" class="btn btn-block">ADD</button>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <button type="button" class="btn btn-block" data-toggle="modal" data-target="#edit_modal">EDIT</button>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <button type="button" class="btn btn-block" data-toggle="modal" data-target="#query_modal">QUERY</button>
                    </div> -->

                    <div class="col-xs-12 col-md-4 text-date">
                        <span>Edit Outlet Information</span>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="my-2">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-4">
                            <span>Outlet No.</span>
                            <select class="form-control" type="text">
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <span>Outlet Name</span>
                            <select class="form-control" type="text">
                                <option>Casey Parlor - Market Market</option>
                                <option>Casey Parlor - Greenbelt</option>
                                <option>Casey Parlor - SM North</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-12 col-md-6">
                            <span>Location</span>
                            <input type="text" class="form-control" readonly="">
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span>City/Town</span>
                            <input type="text" class="form-control" readonly="">
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span>Province</span>
                            <input type="text" class="form-control" readonly="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-12 col-md-4">
                            <span>Outlet Type</span>
                            <select class="form-control" type="text" disabled="">
                                <option>Products</option>
                                <option>Services</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <span>Monthly Quota</span>
                            <input type="text" class="form-control text-right" readonly="">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <span>Outlet Status</span>
                            <select class="form-control" type="text" disabled="">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>    
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-2"></div>
                        <div class="col-xs-12 col-md-4">
                            <button type="button" class="btn btn-block">Update</button>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <button type="button" class="btn btn-block">Cancel</button>
                        </div>
                        <div class="col-xs-12 col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


