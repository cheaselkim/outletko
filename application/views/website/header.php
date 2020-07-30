<link rel="stylesheet" href="<?php echo base_url('assets/css/website/header.css')?>">

<div class="div-header bg-green">
    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
        <div class="row">

            <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                <nav class="navbar navbar-expand-lg py-0 my-0 container">
                    <div class="py-0 my-0 div-header-text">
                        <a href="https://www.zugriffcorp.com/" class="header-text-2" target="_blank">Zugriff</a><br>
                        <a href="<?php echo base_url('blog'); ?>" class="header-text">The Digital Economy For Micro Business</a>
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
                    <div class=" py-0 my-0 div-logo">
                        <div class="navbar-header py-0 my-0">
                            <a href="<?php echo base_url(); ?>" class="navbar-brand text-white header-logo">Outlet<span class="text-yellow">ko</span> </a>
                            <div class="div-logo-sub-text d-none d-sm-block">
                                <p class="text-white mb-0">e-commerce app for <br> Micro Entrepreneurs</p>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>

        </div>
    </div>
</div>


<style>
.header-text-2:hover{
    color: black;
}

@media only screen and (min-width: 1200px) {

.div-header-text{
    /* padding-top: 45px !important; */
    padding-top: 10px !important;
}


.header-text-2{
    font-size: 35px;
    color:white;
    font-weight: 600;
    margin-left: 30px;
}


}

</style>