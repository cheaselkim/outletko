<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>

<script type="text/javascript">

$("input").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change")	

</script>


<div class="container-fluid pt-2">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 pr-4">
                <div class="row">
                    <div class="col-xs-6 col-md-6 col-sm-6 pt-3">
                        <h3 class="font-weight-bold">eOutletSuite Portfolio</h3>
                    </div>
                    <div class="col-xs-6 col-md-6 col-sm-6 pt-3 text-right" >
                        <h3 class="font-weight-bold"></h3>
                    </div>
                </div>
            </div>
        </div>

        <hr style="color: black;" class="mt-0 mb-2 mr-3">

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 pr-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-horizontal">
                            <div class="form-group row mb-0">
                                <span class="col-auto col-form-label text-sales" for="text-input">Period</span>
                                <div class="col-auto">
                                    <input type="date" class="form-control" data-date="" data-date-format="MM/DD/YYYY" value="<?php echo date('Y-m-d') ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



