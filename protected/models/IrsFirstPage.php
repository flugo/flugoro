<?php

class IrsFirstPage extends IrsBase {

    public $session_id;
    public $aver;
    public $code_from;
    public $name_from;
    public $code_to;
    public $name_to;
    public $code_from_flex1;
    public $name_from_flex1;
    public $code_to_flex1;
    public $name_to_flex1;
    public $code_from_flex2;
    public $name_from_flex2;
    public $code_to_flex2;
    public $name_to_flex2;
    public $one_way;
    public $date_from_d;
    public $date_from_m;
    public $date_from_y;
    public $date_to_d;
    public $date_to_m;
    public $date_to_y;
    public $time_from;
    public $time_to;
    public $date_from_flex;
    public $date_to_flex;
    public $range_from_flex;
    public $range_to_flex;
    public $flights_gropu;
    public $flights_group;
    public $modul_worldspan;
    public $modul_galileo;
    public $modul_ps;
    public $modul_lcc2;
    public $modul_sirena;
    public $modul_lcc3;
    public $modul_gds4;
    public $modul_lcctt;
    public $modul_lcc4;
    public $adt_count;
    public $chd_count;
    public $inf_count;
    public $yth_count;
    public $src_count;
    public $pref_carrier1;
    public $pref_carrier2;
    public $pref_carrier3;
    public $pref_class;
    public $direct_flight;
    public $multicity;
    public $code_from_2;
    public $name_from_2;
    public $code_to_2;
    public $name_to_2;
    public $date_from_2_d;
    public $date_from_2_m;
    public $date_from_2_y;
    public $time_from_2;
    public $code_from_3;
    public $name_from_3;
    public $code_to_3;
    public $name_to_3;
    public $date_from_3_d;
    public $date_from_3_m;
    public $date_from_3_y;
    public $time_from_3;
    public $code_from_4;
    public $name_from_4;
    public $code_to_4;
    public $name_to_4;
    public $date_from_4_d;
    public $date_from_4_m;
    public $date_from_4_y;
    public $time_from_4;
    public $code_from_5;
    public $name_from_5;
    public $code_to_5;
    public $name_to_5;
    public $date_from_5_d;
    public $date_from_5_m;
    public $date_from_5_y;
    public $time_from_5;
    public $code_from_6;
    public $name_from_6;
    public $code_to_6;
    public $name_to_6;
    public $date_from_6_d;
    public $date_from_6_m;
    public $date_from_6_y;
    public $time_from_6;
    public $code_from_7;
    public $name_from_7;
    public $code_to_7;
    public $name_to_7;
    public $date_from_7_d;
    public $date_from_7_m;
    public $date_from_7_y;
    public $time_from_7;
    public $code_from_8;
    public $name_from_8;
    public $code_to_8;
    public $name_to_8;
    public $date_from_8_d;
    public $date_from_8_m;
    public $date_from_8_y;
    public $time_from_8;
    public $code_from_9;
    public $name_from_9;
    public $code_to_9;
    public $name_to_9;
    public $date_from_9_d;
    public $date_from_9_m;
    public $date_from_9_y;
    public $time_from_9;
    public $serializedRequest;
    public $extra_information;
    public $name_from_lower_ascii;
    public $name_to_lower_ascii;
    public $name_from_flex1_lower_ascii;
    public $name_to_flex1_lower_ascii;
    public $name_from_flex2_lower_ascii;
    public $name_to_flex2_lower_ascii;
    public $code_from_details;
    public $country_name;
    public $code_to_details;
    public $code_from_flex1_details;
    public $code_from_flex2_details;
    public $code_to_flex1_details;
    public $code_to_flex2_details;
    public $date_from_details;
    public $day_of_week;
    public $date_to_details;
    public $city_from;
    public $city_to;

    public function first() {

        $array = array('aver' => $this->aver);
        $response = parent::setRequestApi($array);

        $this->session_id = $response['session']['id'];

        foreach($response['search_form_details'] as $key => $val) {
            $this->$key = $val;
        }
        
        
        /*
          $session_id;
          $this->afid = 'zbor24';
          $this->aver;
          $this->cityFrom;
          public $cityTo;
          public $code_from;
          public $name_from;
          public $code_to;
          public $name_to;
          public $code_from_flex1;
          public $name_from_flex1;
          public $code_to_flex1;
          public $name_to_flex1;
          public $code_from_flex2;
          public $name_from_flex2;
          public $code_to_flex2;
          public $name_to_flex2;
          public $one_way;
          public $date_from_d;
          public $date_from_m;
          public $date_from_y;
          public $date_to_d;
          public $date_to_m;
          public $date_to_y;
          public $time_from;
          public $time_to;
          public $date_from_flex;
          public $date_to_flex;
          public $range_from_flex;
          public $range_to_flex;
          public $flights_gropu;
          public $flights_group;
          public $modul_worldspan;
          public $modul_galileo;
          public $modul_ps;
          public $modul_lcc2;
          public $modul_sirena;
          public $modul_lcc3;
          public $modul_gds4;
          public $modul_lcctt;
          public $modul_lcc4;
          public $adt_count;
          public $chd_count;
          public $inf_count;
          public $yth_count;
          public $src_count;
          public $pref_carrier1;
          public $pref_carrier2;
          public $pref_carrier3;
          public $pref_class;
          public $direct_flight;
          public $multicity;
          public $code_from_2;
          public $name_from_2;
          public $code_to_2;
          public $name_to_2;
          public $date_from_2_d;
          public $date_from_2_m;
          public $date_from_2_y;
          public $time_from_2;
          public $code_from_3;
          public $name_from_3;
          public $code_to_3;
          public $name_to_3;
          public $date_from_3_d;
          public $date_from_3_m;
          public $date_from_3_y;
          public $time_from_3;
          public $code_from_4;
          public $name_from_4;
          public $code_to_4;
          public $name_to_4;
          public $date_from_4_d;
          public $date_from_4_m;
          public $date_from_4_y;
          public $time_from_4;
          public $code_from_5;
          public $name_from_5;
          public $code_to_5;
          public $name_to_5;
          public $date_from_5_d;
          public $date_from_5_m;
          public $date_from_5_y;
          public $time_from_5;
          public $code_from_6;
          public $name_from_6;
          public $code_to_6;
          public $name_to_6;
          public $date_from_6_d;
          public $date_from_6_m;
          public $date_from_6_y;
          public $time_from_6;
          public $code_from_7;
          public $name_from_7;
          public $code_to_7;
          public $name_to_7;
          public $date_from_7_d;
          public $date_from_7_m;
          public $date_from_7_y;
          public $time_from_7;
          public $code_from_8;
          public $name_from_8;
          public $code_to_8;
          public $name_to_8;
          public $date_from_8_d;
          public $date_from_8_m;
          public $date_from_8_y;
          public $time_from_8;
          public $code_from_9;
          public $name_from_9;
          public $code_to_9;
          public $name_to_9;
          public $date_from_9_d;
          public $date_from_9_m;
          public $date_from_9_y;
          public $time_from_9;
          public $serializedRequest;
          public $extra_information;
          public $name_from_lower_ascii;
          public $name_to_lower_ascii;
          public $name_from_flex1_lower_ascii;
          public $name_to_flex1_lower_ascii;
          public $name_from_flex2_lower_ascii;
          public $name_to_flex2_lower_ascii;
          public $code_from_details;
          public $country_name;
          public $code_to_details;
          public $country_name;
          public $code_from_flex1_details;
          public $code_from_flex2_details;
          public $code_to_flex1_details;
          public $code_to_flex2_details;
          public $date_from_details;
          public $day_of_week;
          public $date_to_details;
          public $day_of_week;
          public $city_from;
          public $city_to;
         */




        return $response;
    }

}
