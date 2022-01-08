<?php 

    /*
    * This class use for get number for given date and do some operations with time and
      date values.
    */
    class Date {

        private static $week_days = array(
                                        'Monday' => 0, 
                                        'Tuesday' => 1, 
                                        'Wednesday' => 2,  
                                        'Thursday' => 3,  
                                        'Friday' => 4,  
                                        'Saturday' => 5,  
                                        'Sunday' => 6
         );

        public static function getDateNumber($date) {

            $day=strftime("%A",strtotime($date));

            $number = self::$week_days[$day];

            return $number;
        }
        
        public static function isTimeBetween($from,$to,$time) {

            $date1 = DateTime::createFromFormat(FORMAT_TIME, $time);
            $date2 = DateTime::createFromFormat(FORMAT_TIME, $from);
            $date3 = DateTime::createFromFormat(FORMAT_TIME, $to);
            if ($date1 >= $date2 && $date1 <= $date3)
            {
                return true;
            }return false;
        }

        public static function getPreviousDate($date){
            $d = date(FORMAT_DATE, strtotime('-1 day', strtotime($date)));
            return $d;
        }

        public static function getTodayDate(){
            return date(FORMAT_DATE);
        }


                                    
    }