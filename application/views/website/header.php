<link rel="stylesheet" href="<?php echo base_url('assets/css/website/header.css')?>">

<div class="div-header bg-green">
    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
        <div class="row">

            <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                <nav class="navbar navbar-expand-lg py-0 my-0 container">
                    <div class="py-0 my-0 div-header-text">
                        <a href="<?php echo base_url('blog'); ?>" class="header-text">Digital Economy for Micro and Small Enterprises</a>
                    </div>
                    <div class="py-0 my-0 div-button" hidden>
                        <!-- navbar-toggler -->
                        <a class=" p-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" href="<?php echo base_url('/blog'); ?>">
                            <span class="fas fa-rss text-orange" style="font-size: 25px;"></span>
                        </a>
                    </div>
                    <div class="" id="collapsibleNavbar"  hidden> 
                        <!-- collapse navbar-collapse -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item py-1 pad-right" >
                                <a href="<?php echo base_url('/blog'); ?>" class="btn btn-block bg-transparent text-white header-link"><span class="text-yellow">News & Insights</span></a>
                            </li>
                        </ul>
                    </div>
                    <a class=" py-3 div-logo" href="<?php echo base_url(); ?>">
                        <div class="navbar-header py-0 my-0">
                            <span  class="navbar-brand text-white header-logo">Outlet<span class="text-yellow">ko</span> </span>
                            <!-- <div class="div-logo-sub-text d-none d-sm-block" >
                                <p class="text-white mb-0">e-commerce app for <br> Micro Entrepreneurs</p>
                            </div> -->
                        </div>
                    </a>
                    <a class=" py-0 my-0 div-logo-zugriff" href="https://www.zugriffcorp.com/" target="_blank"> 
                        <div class="navbar-header py-0 my-0">
                            <span  class="navbar-brand text-white header-logo-zugriff">Zugriff </span>
                            <!-- <div class="div-logo-sub-text d-none d-sm-block" hidden>
                                <p class="text-white mb-0">e-commerce app for <br> Micro Entrepreneurs</p>
                            </div> -->
                        </div>
                    </a>
                </nav>

            </div>

        </div>
    </div>
</div>


<style>
.div-logo:hover{
    background-color: #218f21;
}

.div-logo-zugriff:hover{
    /* background-color: rgb(0, 51, 153); */
    background-color: #484848;
}

@media only screen and (min-width: 1200px) {

.div-logo{
    /* padding-top: 40px !important; */
    /* padding-top: 15px !important; */
    margin-left: auto !important;

    background:#014d01;
    border:1px solid yellow;
    height:100px;
    text-align:center;
    width:150px;
    line-height: 90px;
    margin-right: 20px;
}

.div-logo-zugriff{
    background:black;
    border:1px solid yellow;
    height:100px;
    text-align:center;
    width:150px;
    line-height: 90px;
}

.div-logo a, .div-logo-zugriff a{
    display: inline-block;
    vertical-align: middle;
    line-height: normal;
}

.header-logo{
    font-weight: 900;
    font-size: 26px;
    margin: 0;
    padding: 0;
}

.header-logo-zugriff{
    font-weight: 900;
    font-size: 30px;
    margin: 0;
    padding: 0;
}

.header-text{
    /* font-size: 45px; */
    font-size: 38px;
    color: white;
    font-weight: normal;
    /* margin-left: 30px; */
    margin-left:0px;
}


}
</style>