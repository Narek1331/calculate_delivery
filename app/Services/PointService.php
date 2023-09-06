<?php

namespace App\Services;

use App\Models\Point;
use Carbon\Carbon;

class PointService
{
    public function get(){
        return Point::get();
    }

    public function calculate($point_from_id, $point_to_id, $delivery, $weight_kg){
        $point_from = Point::find($point_from_id);
        $point_to = Point::find($point_to_id);

        $distance_in_km = $this->distance($point_from->lat, $point_from->lng, $point_to->lat, $point_to->lat, "k");
        $date = Carbon::now();


        if($delivery){

            $daysToAdd = round($distance_in_km / env('FAST_DELIVERY_COST_KM_DURING_DAY') ?? 200);
            $date = $date->addDays($daysToAdd);

            return [
                'price' => env('FAST_DELIVERY_COST_KG') ?? 300 * $weight_kg,
                'date' =>  $date->format('y-m-d')
            ];
        }

        $daysToAdd = round($distance_in_km / env('SLOW_DELIVERY_COST_KM_DURING_DAY') ?? 100);
        $date = $date->addDays($daysToAdd);

        return [
            'price' => env('SLOW_DELIVERY_COST_KG') ?? 150 * $weight_kg,
            'date' =>  $date->format('y-m-d')
        ];
    }

    private function distance($latittude_1, $longitude_1, $latittude_2, $longitude_2, $unit) {
        if (($latittude_1 == $latittude_2) && ($latittude_1 == $longitude_2)) {
          return 0;
        }
        else {
          $theta = $longitude_1 - $longitude_2;
          $dist = sin(deg2rad($latittude_1)) * sin(deg2rad($latittude_2)) +  cos(deg2rad($latittude_1)) * cos(deg2rad($latittude_2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);

          if ($unit == "K") {
            return ($miles * 1.609344);
          }
        }
      }

}

?>
