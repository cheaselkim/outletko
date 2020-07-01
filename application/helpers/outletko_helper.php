<?php
if (!function_exists("featured_store")){
    function featured_store($data, $resolution){

        $output = "";

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

                $rgb = HTMLToRGB($colour);
                $hsl = RGBToHSL($rgb);

                $css_product = "background-image: url('".$prod_img."');background-size: auto 100%;background-repeat: no-repeat;background-position: center center;";
                $css_logo = "background-image: url('".$comp_img."');background-size: 100% 100%;background-repeat: no-repeat;background-position: center center;";

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
                        $css_name = "padding-top: 0px";
                    }else{
                        $css_name = "padding-top: 8px";
                    }

                    if (strlen($value->about_us) > 100){
                        $about_us = substr($value->about_us, 0, 100)."....";
                    }else{
                        $about_us = substr($value->about_us, 0, 100);
                    }

                    if (!empty($value->bg_color)){
                        $div_bg_color = $value->bg_color;
                    }else{
                        $div_bg_color = "#77933c";
                    }

                    $bg_color = "";


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

                    $div_bg_color = "white";


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

                    $div_bg_color = "white";


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

                    $div_bg_color = "white";

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

                    $div_bg_color = "white";


                }


                $output .= '<div class="carousel-item '.$active.' w-100" id="div-carousel-item-'.$key.'" style="background-color: '.$div_bg_color.'">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12"> 
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">

                            <div class="row div-outlet" id="div-outlet">
                                <div class="col-12 col-lg-auto col-md-5 col-sm-12 div-outlet-product" style="'.$css_product.'">
                                </div>
                                <div class="col-12 col-lg-auto col-md-6 col-sm-12 div-outlet-details" style="background-color: '.$bg_color.'">
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
                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 div-outlet-button">
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

            $css_product = "background-image: url('".$prod_img."');background-size: 100% 100%;background-repeat: no-repeat;background-position: center center;";
            $product_name = $value->product_name;

            if ($resolution < 768){

                if (strlen($value->product_name) > 12){
                    $product_name = substr($value->product_name, 0, 12)."..";
                }
    
            }else if ($resolution >= 768 && $resolution < 992){

                if (strlen($value->product_name) > 10){
                    $product_name = substr($value->product_name, 0, 10)."..";
                }


            }else if ($resolution >= 992 && $resolution < 1220){
                if (strlen($value->product_name) > 12){
                    $product_name = substr($value->product_name, 0, 12)."..";
                }

            }else if ($resolution >= 1220 && $resolution < 1440){
                if (strlen($value->product_name) > 12){
                    $product_name = substr($value->product_name, 0, 12)."..";
                }

            }else{

                if (strlen($value->product_name) > 12){
                    $product_name = substr($value->product_name, 0, 12)."..";
                }


            }



            $output .= '<div class="tile px-3 pt-1 "> 
            <a href="href_url"> 
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
