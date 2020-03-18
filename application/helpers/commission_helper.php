<?php 

if (!function_exists("tbl_prod_summary")){
    function tbl_prod_summary($data_1, $data_2, $data_3){

        $output = "";
        $total_plan_a = "";
        $total_plan_b = "";
        $total_plan_c = "";
        $total_plan_d = "";
        $total_qty = "";
        $total_amount = "";

        $lvl_1_plan_a = 0;
        $lvl_1_plan_b = 0;
        $lvl_1_plan_c = 0;
        $lvl_1_plan_d = 0;
        $lvl_1_total_qty = 0;
        $lvl_1_total_amount = 0;

        $lvl_2_plan_a = 0;
        $lvl_2_plan_b = 0;
        $lvl_2_plan_c = 0;
        $lvl_2_plan_d = 0;
        $lvl_2_total_qty = 0;
        $lvl_2_total_amount = 0;

        $lvl_3_plan_a = 0;
        $lvl_3_plan_b = 0;
        $lvl_3_plan_c = 0;
        $lvl_3_plan_d = 0;
        $lvl_3_total_qty = 0;
        $lvl_3_total_amount = 0;

        
        $output .= "<table class='table table-sm table-bordered'>
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Plan A(Qty)</th>
                            <th>Plan B(Qty)</th>
                            <th>Plan C(Qty)</th>
                            <th>Plan D(Qty)</th>
                            <th>Total Qty</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>";

                    if (!empty($data_1)){
                        foreach ($data_1 as $key => $value) {

                            if ($value->plan_type == "1"){
                                $lvl_1_plan_a = $value->total_qty;
                            }else if ($value->plan_type == "2"){
                                $lvl_1_plan_b = $value->total_qty;
                            }else if ($value->plan_type == "3"){
                                $lvl_1_plan_c = $value->total_qty;
                            }else if ($value->plan_type == "4"){
                                $lvl_1_plan_d = $value->total_qty;
                            }

                            $lvl_1_total_qty += $value->total_qty;
                            $lvl_1_total_amount += ($value->plan_lvl_1 + $value->total_amount_extra_outlet);
                        }
                    }


                    if (!empty($data_2)){
                        foreach ($data_2 as $key => $value) {

                            if ($value->plan_type == "1"){
                                $lvl_2_plan_a = $value->total_qty;
                            }else if ($value->plan_type == "2"){
                                $lvl_2_plan_b = $value->total_qty;
                            }else if ($value->plan_type == "3"){
                                $lvl_2_plan_c = $value->total_qty;
                            }else if ($value->plan_type == "4"){
                                $lvl_2_plan_d = $value->total_qty;
                            }

                            $lvl_2_total_qty += $value->total_qty;
                            $lvl_2_total_amount += ($value->plan_lvl_2 + $value->total_amount_extra_outlet);
                        }
                    }

                    if (!empty($data_3)){
                        foreach ($data_3 as $key => $value) {

                            if ($value->plan_type == "1"){
                                $lvl_3_plan_a = $value->total_qty;
                            }else if ($value->plan_type == "2"){
                                $lvl_3_plan_b = $value->total_qty;
                            }else if ($value->plan_type == "3"){
                                $lvl_3_plan_c = $value->total_qty;
                            }else if ($value->plan_type == "4"){
                                $lvl_3_plan_d = $value->total_qty;
                            }

                            $lvl_3_total_qty += $value->total_qty;
                            $lvl_3_total_amount += ($value->plan_lvl_3 + $value->total_amount_extra_outlet);
                        }
                    }



        $output .=  "<tr>
                        <th class='tbl-green'>Level 1</th>
                        <td class='text-center'>".number_format($lvl_1_plan_a, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_plan_b, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_plan_c, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_plan_d, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_total_qty, 0)."</td>
                        <td class='text-right'>".number_format($lvl_1_total_amount, 2)."</td>
                    </tr>";

        $output .=  "<tr>
                        <th class='tbl-green'>Level 2</th>
                        <td class='text-center'>".number_format($lvl_2_plan_a, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_plan_b, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_plan_c, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_plan_d, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_total_qty, 0)."</td>
                        <td class='text-right'>".number_format($lvl_2_total_amount, 2)."</td>
                    </tr>";

        $output .=  "<tr>
                        <th class='tbl-green'>Level 3</th>
                        <td class='text-center'>".number_format($lvl_3_plan_a, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_plan_b, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_plan_c, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_plan_d, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_total_qty, 0)."</td>
                        <td class='text-right'>".number_format($lvl_3_total_amount, 2)."</td>
                    </tr>";

        $output .=  "<tr>
                        <th class='tbl-green'>Total</th>                                    
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_a + $lvl_2_plan_a + $lvl_3_plan_a), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_b + $lvl_2_plan_b + $lvl_3_plan_b), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_c + $lvl_2_plan_c + $lvl_3_plan_c), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_d + $lvl_2_plan_d + $lvl_3_plan_d), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_total_qty + $lvl_2_total_qty + $lvl_3_total_qty), 0)."</td>
                        <td class='text-right tbl-green font-weight-bold'>".number_format(($lvl_1_total_amount + $lvl_2_total_amount + $lvl_3_total_amount), 2)."</td>
                    </tr>";
        $output .= "</tbody>
                </table>";



        return  $output;

    }
}

if (!function_exists("tbl_plan_summary")){
    function tbl_plan_summary($data_1, $data_2, $data_3){

        $output = "";
        $total_plan_a = "";
        $total_plan_b = "";
        $total_plan_c = "";
        $total_plan_d = "";
        $total_qty = "";
        $total_amount = "";

        $lvl_1_plan_a = 0;
        $lvl_1_plan_b = 0;
        $lvl_1_plan_c = 0;
        $lvl_1_plan_d = 0;
        $lvl_1_total_qty = 0;
        $lvl_1_total_amount = 0;

        $lvl_2_plan_a = 0;
        $lvl_2_plan_b = 0;
        $lvl_2_plan_c = 0;
        $lvl_2_plan_d = 0;
        $lvl_2_total_qty = 0;
        $lvl_2_total_amount = 0;

        $lvl_3_plan_a = 0;
        $lvl_3_plan_b = 0;
        $lvl_3_plan_c = 0;
        $lvl_3_plan_d = 0;
        $lvl_3_total_qty = 0;
        $lvl_3_total_amount = 0;

        
        $output .= "<table class='table table-sm table-bordered'>
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Plan A(Qty)</th>
                            <th>Plan B(Qty)</th>
                            <th>Plan C(Qty)</th>
                            <th>Plan D(Qty)</th>
                            <th>Total Qty</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>";

                    if (!empty($data_1)){
                        foreach ($data_1 as $key => $value) {

                            if ($value->plan_type == "1"){
                                $lvl_1_plan_a = $value->total_qty;
                            }else if ($value->plan_type == "2"){
                                $lvl_1_plan_b = $value->total_qty;
                            }else if ($value->plan_type == "3"){
                                $lvl_1_plan_c = $value->total_qty;
                            }else if ($value->plan_type == "4"){
                                $lvl_1_plan_d = $value->total_qty;
                            }

                            $lvl_1_total_qty += $value->total_qty;
                            $lvl_1_total_amount += ($value->plan_lvl_1);
                        }
                    }


                    if (!empty($data_2)){
                        foreach ($data_2 as $key => $value) {

                            if ($value->plan_type == "1"){
                                $lvl_2_plan_a = $value->total_qty;
                            }else if ($value->plan_type == "2"){
                                $lvl_2_plan_b = $value->total_qty;
                            }else if ($value->plan_type == "3"){
                                $lvl_2_plan_c = $value->total_qty;
                            }else if ($value->plan_type == "4"){
                                $lvl_2_plan_d = $value->total_qty;
                            }

                            $lvl_2_total_qty += $value->total_qty;
                            $lvl_2_total_amount += ($value->plan_lvl_2);
                        }
                    }

                    if (!empty($data_3)){
                        foreach ($data_3 as $key => $value) {

                            if ($value->plan_type == "1"){
                                $lvl_3_plan_a = $value->total_qty;
                            }else if ($value->plan_type == "2"){
                                $lvl_3_plan_b = $value->total_qty;
                            }else if ($value->plan_type == "3"){
                                $lvl_3_plan_c = $value->total_qty;
                            }else if ($value->plan_type == "4"){
                                $lvl_3_plan_d = $value->total_qty;
                            }

                            $lvl_3_total_qty += $value->total_qty;
                            $lvl_3_total_amount += ($value->plan_lvl_3);
                        }
                    }



        $output .=  "<tr>
                        <th class='tbl-green'>Level 1</th>
                        <td class='text-center'>".number_format($lvl_1_plan_a, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_plan_b, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_plan_c, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_plan_d, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_total_qty, 0)."</td>
                        <td class='text-right'>".number_format($lvl_1_total_amount, 2)."</td>
                    </tr>";

        $output .=  "<tr>
                        <th class='tbl-green'>Level 2</th>
                        <td class='text-center'>".number_format($lvl_2_plan_a, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_plan_b, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_plan_c, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_plan_d, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_total_qty, 0)."</td>
                        <td class='text-right'>".number_format($lvl_2_total_amount, 2)."</td>
                    </tr>";

        $output .=  "<tr>
                        <th class='tbl-green'>Level 3</th>
                        <td class='text-center'>".number_format($lvl_3_plan_a, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_plan_b, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_plan_c, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_plan_d, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_total_qty, 0)."</td>
                        <td class='text-right'>".number_format($lvl_3_total_amount, 2)."</td>
                    </tr>";

        $output .=  "<tr>
                        <th class='tbl-green'>Total</th>                                    
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_a + $lvl_2_plan_a + $lvl_3_plan_a), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_b + $lvl_2_plan_b + $lvl_3_plan_b), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_c + $lvl_2_plan_c + $lvl_3_plan_c), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_d + $lvl_2_plan_d + $lvl_3_plan_d), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_total_qty + $lvl_2_total_qty + $lvl_3_total_qty), 0)."</td>
                        <td class='text-right tbl-green font-weight-bold'>".number_format(($lvl_1_total_amount + $lvl_2_total_amount + $lvl_3_total_amount), 2)."</td>
                    </tr>";
        $output .= "</tbody>
                </table>";



        return  $output;

    }
}

if (!function_exists("tbl_outlet_summary")){
    function tbl_outlet_summary($data_1, $data_2, $data_3){

        $output = "";
        $total_plan_a = "";
        $total_plan_b = "";
        $total_plan_c = "";
        $total_plan_d = "";
        $total_qty = "";
        $total_amount = "";

        $lvl_1_plan_a = 0;
        $lvl_1_plan_b = 0;
        $lvl_1_plan_c = 0;
        $lvl_1_plan_d = 0;
        $lvl_1_total_qty = 0;
        $lvl_1_total_amount = 0;

        $lvl_2_plan_a = 0;
        $lvl_2_plan_b = 0;
        $lvl_2_plan_c = 0;
        $lvl_2_plan_d = 0;
        $lvl_2_total_qty = 0;
        $lvl_2_total_amount = 0;

        $lvl_3_plan_a = 0;
        $lvl_3_plan_b = 0;
        $lvl_3_plan_c = 0;
        $lvl_3_plan_d = 0;
        $lvl_3_total_qty = 0;
        $lvl_3_total_amount = 0;

        
        $output .= "<table class='table table-sm table-bordered'>
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Plan A(Qty)</th>
                            <th>Plan B(Qty)</th>
                            <th>Plan C(Qty)</th>
                            <th>Plan D(Qty)</th>
                            <th>Total Qty</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>";

                    if (!empty($data_1)){
                        foreach ($data_1 as $key => $value) {

                            if ($value->plan_type == "1"){
                                $lvl_1_plan_a = $value->total_extra_outlet;
                            }else if ($value->plan_type == "2"){
                                $lvl_1_plan_b = $value->total_extra_outlet;
                            }else if ($value->plan_type == "3"){
                                $lvl_1_plan_c = $value->total_extra_outlet;
                            }else if ($value->plan_type == "4"){
                                $lvl_1_plan_d = $value->total_extra_outlet;
                            }

                            $lvl_1_total_qty += $value->total_extra_outlet;
                            $lvl_1_total_amount += ($value->total_amount_extra_outlet);
                        }
                    }


                    if (!empty($data_2)){
                        foreach ($data_2 as $key => $value) {

                            if ($value->plan_type == "1"){
                                $lvl_2_plan_a = $value->total_extra_outlet;
                            }else if ($value->plan_type == "2"){
                                $lvl_2_plan_b = $value->total_extra_outlet;
                            }else if ($value->plan_type == "3"){
                                $lvl_2_plan_c = $value->total_extra_outlet;
                            }else if ($value->plan_type == "4"){
                                $lvl_2_plan_d = $value->total_extra_outlet;
                            }

                            $lvl_2_total_qty += $value->total_extra_outlet;
                            $lvl_2_total_amount += ($value->total_amount_extra_outlet);
                        }
                    }

                    if (!empty($data_3)){
                        foreach ($data_3 as $key => $value) {

                            if ($value->plan_type == "1"){
                                $lvl_3_plan_a = $value->total_extra_outlet;
                            }else if ($value->plan_type == "2"){
                                $lvl_3_plan_b = $value->total_extra_outlet;
                            }else if ($value->plan_type == "3"){
                                $lvl_3_plan_c = $value->total_extra_outlet;
                            }else if ($value->plan_type == "4"){
                                $lvl_3_plan_d = $value->total_extra_outlet;
                            }

                            $lvl_3_total_qty += $value->total_extra_outlet;
                            $lvl_3_total_amount += ($value->total_amount_extra_outlet);
                        }
                    }



        $output .=  "<tr>
                        <th class='tbl-green'>Level 1</th>
                        <td class='text-center'>".number_format($lvl_1_plan_a, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_plan_b, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_plan_c, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_plan_d, 0)."</td>
                        <td class='text-center'>".number_format($lvl_1_total_qty, 0)."</td>
                        <td class='text-right'>".number_format($lvl_1_total_amount, 2)."</td>
                    </tr>";

        $output .=  "<tr>
                        <th class='tbl-green'>Level 2</th>
                        <td class='text-center'>".number_format($lvl_2_plan_a, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_plan_b, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_plan_c, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_plan_d, 0)."</td>
                        <td class='text-center'>".number_format($lvl_2_total_qty, 0)."</td>
                        <td class='text-right'>".number_format($lvl_2_total_amount, 2)."</td>
                    </tr>";

        $output .=  "<tr>
                        <th class='tbl-green'>Level 3</th>
                        <td class='text-center'>".number_format($lvl_3_plan_a, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_plan_b, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_plan_c, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_plan_d, 0)."</td>
                        <td class='text-center'>".number_format($lvl_3_total_qty, 0)."</td>
                        <td class='text-right'>".number_format($lvl_3_total_amount, 2)."</td>
                    </tr>";

        $output .=  "<tr>
                        <th class='tbl-green'>Total</th>                                    
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_a + $lvl_2_plan_a + $lvl_3_plan_a), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_b + $lvl_2_plan_b + $lvl_3_plan_b), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_c + $lvl_2_plan_c + $lvl_3_plan_c), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_plan_d + $lvl_2_plan_d + $lvl_3_plan_d), 0)."</td>
                        <td class='text-center tbl-green font-weight-bold'>".number_format(($lvl_1_total_qty + $lvl_2_total_qty + $lvl_3_total_qty), 0)."</td>
                        <td class='text-right tbl-green font-weight-bold'>".number_format(($lvl_1_total_amount + $lvl_2_total_amount + $lvl_3_total_amount), 2)."</td>
                    </tr>";
        $output .= "</tbody>
                </table>";



        return  $output;

    }
}