<?php 

if (!function_exists("blog_tbl")){
    function blog_tbl($query, $type){

        $output = "";
        $btn = "";

        $output = "<table class='table table-sm table-bordered'>
                        <thead>
                            <tr>
                                <th style='width: 1%;'>LN</th>
                                <th style='width: 7%;'>Date</th>
                                <th>Title</th>
                                <th style='width: 7%;'>Action</th>
                            </tr>
                        </thead>
                        <tbody>";
        
        if (!empty($query)){

            foreach ($query as $key => $value) {
                
                if ($type == "2"){
                    $btn = "<button class='btn btn-primary btn-sm btn-block' onclick='edit_blog(".$value->id.")'>Edit</button>"; 
                }else if ($type == "3"){
                    $btn = "<button class='btn btn-success btn-sm btn-block' onclick='view_blog(".$value->id.")'>View</button>"; 
                }else if ($type == "4"){
                    $btn = "<button class='btn btn-danger btn-sm btn-block' onclick='delete_blog(".$value->id.", ".$key.")'>Delete</button>"; 
                }

                $output .= "<tr>
                                <td class='pt-2 text-center'>".($key + 1)."</td>
                                <td class='pt-2'>".date("m/d/Y", strtotime($value->date_insert))."</td>
                                <td class='pt-2'>".$value->title."</td>
                                <td>".$btn."</td>
                            </tr>";
            }
        }else{
            $output .= "<tr>    
                            <td colspan='4'>No Data</td>
                        </tr>";
        }                        

        $output .= "</tbody>
                    </table>";

        return $output;                    
    }
}