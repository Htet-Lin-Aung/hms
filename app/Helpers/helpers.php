<?php

use App\Models\Nrc;

    if(! function_exists('get_nrc_regions')) {
        function get_nrc_regions(){
            return config('form.nrc_regions_mm');
        }
    }

    if(! function_exists('get_nrc_townships')) {
        function get_nrc_townships(){
            return Nrc::pluck('short_district_mm','id');
        }
    }

    if(! function_exists('get_township_name')) {
        function get_township_name($id){
            return Nrc::whereId($id)->pluck('short_district_mm')->first();
        }
    }

    if(! function_exists('get_nrc_types')) {
        function get_nrc_types(){
            return config('form.nrc_types_mm');
        }
    }
?>