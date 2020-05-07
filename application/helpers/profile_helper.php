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

?>