<?php

use App\Models\Nrc;

    if(! function_exists('get_nrc_regions')) {
        function get_nrc_regions(){
            return config('form.nrc_regions_mm');
        }
    }

    if(! function_exists('get_nrc_townships')) {
        function get_nrc_townships(){
            return Nrc::pluck('township_mm','id');
        }
    }

    if(! function_exists('get_township_name')) {
        function get_township_name($id){
            return Nrc::whereId($id)->pluck('township_mm')->first();
        }
    }

    if(! function_exists('get_nrc_types')) {
        function get_nrc_types(){
            return config('form.nrc_types_mm');
        }
    }

    /**
     * Get nrc township codes by region code
     *
     * @return Collection
     */

     if(! function_exists('getNrcTownshipCodesByRegionCode')){
        function getNrcTownshipCodesByRegionCode($region_code){
            $nrcs = Nrc::whereRegionEn($region_code)->select('id','township_mm')->get();

            return $nrcs;
        }
    }

    if(! function_exists('get_revenue_sources')) {
        function get_revenue_sources(){
            return config('form.revenue_source');
        }
    }
?>