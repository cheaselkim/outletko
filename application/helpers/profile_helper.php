<?php 
if (!function_exists("img_display")){
    function img_display($data){

        $output = "";

        // var_dump($data);

        if (!empty($data)){
            // foreach ($data as $key => $value) {
            //     foreach ($value as $key2 => $value2) {
            //         // $img = base_url()."images/products/".$value2->img;
            //         // $output += "<img src='".$img."'>";
            //     }
            // }    

            // for ($i=0; $i < COUNT($data); $i++) { 
            //     $img = base_url()."images/products/".$data[$i];
            //     $output += "<img src='".$img."'>";
            // }

            foreach ($data  as $key => $value) {
                $img = base_url()."images/products/".$value;
                $output .= "<img src='".$img."'>";
            }

        }

        return $output;
    }
}

if (!function_exists("reviews")){
    function reviews($data){
        $output = "";
        $border = "";

        foreach ($data as $key => $value) {

            if ($key > 0){
                $border = 'style="border-top: 1px solid orange;"';
            }

            $output .= '<div class="row mx-0" '.$border.'>
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 px-0 pt-2">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                            <span class="rating-emoji">&#x'.$value->rating.';</span><br>
                            <p class="mb-0">'.$value->review.'</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
                            <hr class="mb-0 mt-1">
                            <p class="mb-0">'.$value->user_name.'</p>
                            <span>'.date('d M Y', strtotime($value->date_insert)).'</span>
                        </div>
                    </div>
                </div>
            </div>';


        }

        return $output;

    }
}

?>