<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Ward;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Feeship;

class DeliveryController extends Controller
{
    //
    public function delivery(){

        $city = City::orderby('matp','ASC')->get();

        return view('admin.add_delivery')->with(compact('city'));
    }
    public function insert_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();
    }

    public function select_feeship(){
        $feeship = Feeship::orderby('fee_id','DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive">
			<table class="table table-bordered">
				<thread>
					<tr>
						<th>Tên thành phố</th>
						<th>Tên quận huyện</th>
						<th>Tên xã phường</th>
						<th>Phí ship (VNĐ)</th>
					</tr>
				</thread>
				<tbody>
				';

        foreach($feeship as $key => $fee){

            $output.='
					<tr>
						<td align="center">'.$fee->city->name_city.'</td>
						<td align="center">'.$fee->province->name_quanhuyen.'</td>
						<td align="center">'.$fee->wards->name_xa.'</td>
						<td align="center" contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').' </td>
					</tr>
					';
        }

        $output.='
				</tbody>
				</table></div>
				';

        echo $output;

    }
    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                $output.='<option value="">--- Chọn quận, huyện ---</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }

            }else{

                $select_wards = Ward::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option value="">--- Chọn xã, phường, thị trấn ---</option>';
                foreach($select_wards as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xa.'</option>';
                }
            }
            echo $output;
        }

    }
    public function update_delivery(Request $request){
        $data = $request->all();
        $fee_ship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'],'.');
        $fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();
    }
}
