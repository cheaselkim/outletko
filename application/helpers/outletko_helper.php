<?php
if (!function_exists("featured_store")){
    function featured_store($data, $resolution){

        $output = "";

        $text_color = "white";
        if ($resolution < 768){
            $div_bg_color = "";
            $bg_color = "#4F6228";
            $pad = "px-0";
            $pad2 = "px-0";
            $text_align = "center;";
            $bg_size = "65%";
            $pad_outlet = "mt-3";
        }else{
            $div_bg_color = "";
            $bg_color = "#4F6228";
            $pad = "pr-0";
            $text_align = "left";
            $bg_size = "100%";
            $pad2 = "";
            $pad_outlet = "";
        }

        $prod_img = base_url()."assets/img/featured-prod.png";
        $css_product = "background-image: url('".$prod_img."'); background-size: ".$bg_size." 100%; background-repeat: no-repeat; background-position: center center;";

        $logo_img = base_url()."assets/img/featured-icon.png";
        $css_logo = "background-image: url('".$logo_img."'); background-size: 100% 100%; background-repeat: no-repeat; background-position: center center;";

        $output .= '<div class="carousel-item w-100 active" id="div-carousel-item-3" style="background-color: '.$div_bg_color.'">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12 '.$pad2.'"> 
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 '.$pad2.'">

                    <div class="row div-outlet" id="div-outlet">
                        <div class="col-12 col-lg-auto col-md-5 col-sm-12 div-outlet-product" style="'.$css_product.'">
                        </div>
                        <div class="col-12 col-lg-auto col-md-6 col-sm-12 div-outlet-details '.$pad_outlet.'" style="background-color: '.$bg_color.'">
                            <div class="row">
                                <div class="col-12 col-lg-8 col-md-12 col-sm-12 '.$pad.'" style="text-align: '.$text_align.'">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12" style="padding-top: 8px;">
                                            <p class="span-outlet-business mb-0" style="color:'.$text_color.'">Take your business to the next level
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-2">
                                            <p class="span-outlet-customer mb-0" style="color:'.$text_color.'">Bring your store closer to customers!
                                            </p>
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-outlet-button '.$pad_outlet.'">
                                            <button class="btn btn-orange px-5 btn-see-more" id="btn_mod_signup" data-toggle="modal" data-target="#modal_signup">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4 col-sm-12 px-0 d-none d-lg-block mt-3">
                                    <img src="'.$logo_img.'" class="img-fluid" >
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>';

        // $data = "";

        if (!empty($data)){
            foreach ($data as $key => $value) {
                
                $img_prod = unserialize($value->img_location);
                $img_comp = unserialize($value->loc_image);

                $prod_img = base_url()."images/products/".$img_prod[0];
                $comp_img = base_url()."images/profile/".$img_comp[0];

                $href_url = base_url().$value->link_name;

                $account_name_length = strlen($value->account_name);

                $css_name = "";
                $css_logo = "";
                $css_product = "";
                $about_us = "";
                $active = "";
                $div_bg_color = "";
                $bg_color = "";
                $text_color = "";

                if (!empty($value->bg_color)){
                    $colour = $value->bg_color;
                }else{
                    $colour = "#77933c";
                }

                if ($value->comp_id == "48"){
                    $prod_img = base_url()."images/store/file_48_570682.png";
                }else if ($value->comp_id == "4"){
                    $prod_img = base_url()."images/store/file_4_422469.png";
                }

                $rgb = HTMLToRGB($colour);
                $hsl = RGBToHSL($rgb);

                if ($hsl->lightness > 200){
                    $text_color = "black";
                }else{
                    $text_color = "white";
                }

                if ($key == 0){
                    $active = "active";
                }

                if ($resolution < 768){

                    if ($account_name_length > 20){
                        $css_name = "padding-top: 8px";
                    }else{
                        $css_name = "padding-top: 8px";
                    }

                    if (strlen($value->about_us) > 70){
                        $about_us = substr($value->about_us, 0, 100)."....";
                    }else{
                        $about_us = substr($value->about_us, 0, 100);
                    }

                    if (!empty($value->bg_color)){
                        $bg_color = $value->bg_color;
                    }else{
                        $bg_color = "#77933c";
                    }

                    $div_bg_color = "transparent";
                    $bg_size = "65%";
                    $pad2 = "px-0";
                    $pad_outlet = "mt-3";

                }else if ($resolution >= 768 && $resolution < 992){

                    if ($account_name_length > 20){
                        $css_name = "padding-top: 0px";
                    }else{
                        $css_name = "padding-top: 18px";
                    }

                    if (strlen($value->about_us) > 150){
                        $about_us = substr($value->about_us, 0, 150)."....";
                    }else{
                        $about_us = substr($value->about_us, 0, 150);
                    }

                    if (!empty($value->bg_color)){
                        $bg_color = $value->bg_color;
                    }else{
                        $bg_color = "#77933c";
                    }

                    $div_bg_color = "transparent";
                    $bg_size = "100%";
                    $pad2 = "";
                    $pad_outlet = "";

                }else if ($resolution >= 992 && $resolution < 1220){

                    if ($account_name_length > 20){
                        $css_name = "padding-top: 0px";
                    }else{
                        $css_name = "padding-top: 18px";
                    }

                    if (strlen($value->about_us) > 150){
                        $about_us = substr($value->about_us, 0, 150)."....";
                    }else{
                        $about_us = substr($value->about_us, 0, 150);
                    }

                    if (!empty($value->bg_color)){
                        $bg_color = $value->bg_color;
                    }else{
                        $bg_color = "#77933c";
                    }

                    $div_bg_color = "transparent";
                    $bg_size = "100%";
                    $pad2 = "";
                    $pad_outlet = "";

                }else if ($resolution >= 1220 && $resolution < 1440){

                    if ($account_name_length > 20){
                        $css_name = "padding-top: 0px";
                    }else{
                        $css_name = "padding-top: 20px";
                    }

                    if (strlen($value->about_us) > 230){
                        $about_us = substr($value->about_us, 0, 230)."....";
                    }else{
                        $about_us = substr($value->about_us, 0, 230);
                    }

                    if (!empty($value->bg_color)){
                        $bg_color = $value->bg_color;
                    }else{
                        $bg_color = "#77933c";
                    }

                    $div_bg_color = "transparent";
                    $bg_size = "100%";
                    $pad2 = "";
                    $pad_outlet = "";
                }else{

                    if ($account_name_length > 20){
                        $css_name = "padding-top: 0px";
                    }else{
                        $css_name = "padding-top: 30px";
                    }

                    if (strlen($value->about_us) > 300){
                        $about_us = substr($value->about_us, 0, 300)."....";
                    }else{
                        $about_us = substr($value->about_us, 0, 300);
                    }

                    if (!empty($value->bg_color)){
                        $bg_color = $value->bg_color;
                    }else{
                        $bg_color = "#77933c";
                    }

                    $div_bg_color = "transparent";
                    $bg_size = "100%";
                    $pad2 = "";
                    $pad_outlet = "";

                }

                $css_product = "background-image: url('".$prod_img."');background-size: ".$bg_size." 100%;background-repeat: no-repeat;background-position: center center;";
                $css_logo = "background-image: url('".$comp_img."');background-size: 100% 100%;background-repeat: no-repeat;background-position: center center;";


                $output .= '<div class="carousel-item  w-100" id="div-carousel-item-'.$key.'" style="background-color: '.$div_bg_color.'">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12"> 
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                            <div class="row div-outlet" id="div-outlet">
                                <div class="col-12 col-lg-auto col-md-5 col-sm-12 div-outlet-product" style="'.$css_product.'">
                                </div>
                                <div class="col-12 col-lg-auto col-md-6 col-sm-12 div-outlet-details '.$pad_outlet.'" style="background-color: '.$bg_color.'">
                                    <div class="row">
                                        <div class="col-12 col-lg-3 col-md-4 col-sm-12">
                                            <div class="div-outlet-logo" style="'.$css_logo.'"></div>
                                        </div>
                                        <div class="col-12 col-lg-9 col-md-8 col-sm-12 div-outlet-name" style="'.$css_name.'">
                                            <span class="span-outlet-name font-weight-600" style="color:'.$text_color.'">'.$value->account_name.'</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-outlet-about">
                                            <span class="span-outlet-about"  style="color:'.$text_color.'">'.$about_us.'</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-outlet-button '.$pad_outlet.'">
                                            <a href="'.$href_url.'" class="btn btn-orange px-5 text-black btn-see-more">See More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>';
            
            }
        }



        return $output;
    }
}

if (!function_exists("featured_product")){
    function featured_product($data, $resolution){

        $output = "";

        foreach ($data as $key => $value) {

            $img_prod = unserialize($value->img_location);
            $prod_img = base_url()."images/products/".$img_prod[0];


            $comp_id = randomNumber(5).$value->comp_id.randomNumber(3);
            $prod_id = randomNumber(2).$value->id.randomNumber(3);

            $href_url = base_url()."products/".str_replace(" ", "-", preg_replace('/[^A-Za-z0-9\-]/', '', $value->product_name))."?".randomNumber(150)."&OS=".$comp_id."&pd=".$prod_id;


            $css_product = "background-image: url('".$prod_img."');background-size: auto 99%;background-repeat: no-repeat;background-position: center center;";
            $product_name = $value->product_name;

            if ($resolution < 768){

                if (strlen($value->product_name) > 10){
                    $product_name = substr($value->product_name, 0, 10)."..";
                }

                if ($key % 2 == 0){
                    $margin = "ml-auto";
                }else{
                    $margin = "mr-auto";
                }
    
            }else if ($resolution >= 768 && $resolution < 992){

                if (strlen($value->product_name) > 10){
                    $product_name = substr($value->product_name, 0, 10)."..";
                }
                $margin = "";


            }else if ($resolution >= 992 && $resolution < 1220){
                if (strlen($value->product_name) > 12){
                    $product_name = substr($value->product_name, 0, 12)."..";
                }
                $margin = "";

            }else if ($resolution >= 1220 && $resolution < 1440){
                if (strlen($value->product_name) > 17){
                    $product_name = substr($value->product_name, 0, 17)."..";
                }
                $margin = "";

            }else{

                if (strlen($value->product_name) > 12){
                    $product_name = substr($value->product_name, 0, 12)."..";
                }

                $margin = "";

            }



            $output .= '<div class="tile px-3 pt-2 '.$margin.'"> 
            <a href="'.$href_url.'"> 
                <div class="card div-card-prod" id="div-card-prod-i" style="'.$css_product.'"> 
                </div> 
                <div class="col-12 text-center px-2 div-card-prod-name py-1"> 
                    <p class="card-title prod-title text-green-white font-weight-600 text-capitalize align-middle mb-0">'.$product_name.'</p>
                    <p class="text-red font-weight-600 prod-price">PHP '.number_format($value->product_unit_price, 2).'</p> 
                </div>
            </a>
        </div>';
            

        }

        return $output;

    }
}

function HTMLToRGB($htmlCode){
    if($htmlCode[0] == '#')
      $htmlCode = substr($htmlCode, 1);

    if (strlen($htmlCode) == 3)
    {
      $htmlCode = $htmlCode[0] . $htmlCode[0] . $htmlCode[1] . $htmlCode[1] . $htmlCode[2] . $htmlCode[2];
    }

    $r = hexdec($htmlCode[0] . $htmlCode[1]);
    $g = hexdec($htmlCode[2] . $htmlCode[3]);
    $b = hexdec($htmlCode[4] . $htmlCode[5]);

    return $b + ($g << 0x8) + ($r << 0x10);
}

function RGBToHSL($RGB) {
    $r = 0xFF & ($RGB >> 0x10);
    $g = 0xFF & ($RGB >> 0x8);
    $b = 0xFF & $RGB;

    $r = ((float)$r) / 255.0;
    $g = ((float)$g) / 255.0;
    $b = ((float)$b) / 255.0;

    $maxC = max($r, $g, $b);
    $minC = min($r, $g, $b);

    $l = ($maxC + $minC) / 2.0;

    if($maxC == $minC)
    {
      $s = 0;
      $h = 0;
    }
    else
    {
      if($l < .5)
      {
        $s = ($maxC - $minC) / ($maxC + $minC);
      }
      else
      {
        $s = ($maxC - $minC) / (2.0 - $maxC - $minC);
      }
      if($r == $maxC)
        $h = ($g - $b) / ($maxC - $minC);
      if($g == $maxC)
        $h = 2.0 + ($b - $r) / ($maxC - $minC);
      if($b == $maxC)
        $h = 4.0 + ($r - $g) / ($maxC - $minC);

      $h = $h / 6.0; 
    }

    $h = (int)round(255.0 * $h);
    $s = (int)round(255.0 * $s);
    $l = (int)round(255.0 * $l);

    return (object) Array('hue' => $h, 'saturation' => $s, 'lightness' => $l);
}

function randomNumber($length) {
    $str = "";
    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
      $rand = mt_rand(0, $max);
      $str .= $characters[$rand];
    }
    return str_shuffle($str);
}
