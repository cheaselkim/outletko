<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">

<body>

<div class="container-fluid pt-3">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-md-4 text-date">
                        <span>Owner Information</span>
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
                            <span>Last Name</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <span>First Name</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <span>Middle Name</span>
                            <input class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-12 col-md-3">
                            <span>Birth Date</span>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span>Mobile No.</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span>Phone No.</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span>Email Address</span>
                            <input class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-md-4 text-date">
                        <span>Account Information</span>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="my-2">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="container">
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-3">
                            <span>Account ID</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <span>Account Name</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span>Account Status</span>
                            <input class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-12 col-md-6">
                            <span>Address</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span>City/Town</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <span>Province</span>
                            <input class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-12 col-md-4">
                            <span>Business Type</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <span>Subscription Type</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <span>Subscription Start Date</span>
                            <input type="date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xs-12 col-md-4">
                            <span>Renewal Date</span>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <span>Recruited By</span>
                            <input class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <span>No of Outlet</span>
                            <input class="form-control">
                        </div>
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
                            <div class="form-group row">
                                <div class="col-xs-12 col-md-12">
                                    <span>User Name</span>
                                    <input class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-md-12">
                                    <span>User Password</span>
                                    <input class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-8">
                            <div class="form-group row">
                                <div class="col-xs-12 col-md-12">
                                    <span>Question</span>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12 col-md-12">
                                    <span>Answer</span>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="form-group row">
                        <div class="col-xs-12 col-md-2"></div>
                        <div class="col-xs-12 col-md-4">
                            <button type="button" class="btn btn-block">Save</button>
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


</body>

