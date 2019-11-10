
<body>

<div class="container-fluid pt-3">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-md-4 text-date">
                        <span>Subscription History</span>
                    </div>
                    <div class="col-xs-12 col-md-4"></div>
                    <div class="col-xs-12 col-md-4">
                        <div class="input-group">
                            <input class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text ">
                                <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="my-2">

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="form-group row">
                    <div class="col-xs-12 col-md-2">
                        <span>Account No.</span>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <span>: 1010</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-md-2">
                        <span>Account Name</span>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <span>: CASEY SPA</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-md-2">
                        <span>Owner's Name</span>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <span>: CASEY SANTOS</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th style="width: 8%;">Subscription ID</th>
                            <th style="width: 20%;">Subscription Date</th>
                            <th style="width: 25%;">Start Date</th>
                            <th style="width: 10%;">End Date</th>
                            <th style="width: 5%;">Amount</th>
                            <th style="width: 5%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1010-01</td>
                            <td>Jan. 28, 2019</td>
                            <td>Feb. 01, 2019</td>
                            <td>Jan. 31, 2019</td>
                            <td>15,000.00</td>
                            <td><a href="<?php echo base_url('edit_product/'); ?>" class="btn btn-md"><i class="fa fa-info-circle"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</body>

