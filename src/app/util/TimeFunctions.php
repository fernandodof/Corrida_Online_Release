<?php

/**
 * Description of TimeFunctions
 *
 * @author Fernando
 */
class TimeFunctions {

    public static function timeToSeconds($time) {
        sscanf($time, "%d:%d:%d", $hours, $minutes, $seconds);
        if (isset($seconds)) {
            $time_seconds = $hours * 3600 + $minutes * 60 + $seconds;
        } else {
            $time_seconds = $hours * 60 + $minutes;
        }

        return $time_seconds;
    }

    public static function convertToMinutes($time) {
        $timeArray = explode(':', $time);
        $seconds = ($timeArray[0] * 60) + ($timeArray[1]) + (floor($timeArray[2] / 60));
        return $seconds;
    }

    public static function secondsToTime($seconds) {
        return gmdate("H:i:s", $seconds);
    }

    public static function secondsToCompleteTime($inputSeconds) {
        $secondsInAMinute = 60;
        $secondsInAnHour = 60 * $secondsInAMinute;
        $secondsInADay = 24 * $secondsInAnHour;
        $secondsInAMonth = 30 * $secondsInADay;
        $secondsInAYear = 12 * $secondsInAMonth;

        $years = floor($inputSeconds / $secondsInAYear);

        $monthSeconds = $inputSeconds % $secondsInAYear;
        $months = floor($monthSeconds / $secondsInAMonth);

        $daySeconds = $monthSeconds % $secondsInAMonth;
        $days = floor($daySeconds / $secondsInADay);

        $hourSeconds = $daySeconds % $secondsInADay;
        $hours = sprintf('%02d',floor($hourSeconds / $secondsInAnHour));
        
        $minuteSeconds = $hourSeconds % $secondsInAnHour;
        $minutes = sprintf('%02d',floor($minuteSeconds / $secondsInAMinute));

        $remainingSeconds = $minuteSeconds % $secondsInAMinute;
        $seconds = sprintf('%02d',ceil($remainingSeconds));

        $converted = array(
            'years' => (int) $years,
            'months' => (int) $months,
            'days' => (int) $days,
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds
        );
        return $converted;
    }

    public static function secondsToHoursMinutesSeconds($seconds) {
        $minuteSeconds = gmdate("i:s", $seconds);
        
        $minutesSecondsArray = explode(':', $minuteSeconds);
        
        $sumMinutesSeconds = intval($minuteSeconds[1]) + (intval($minutesSecondsArray[0]) *60);
        
        $hours = $seconds - $sumMinutesSeconds;       
                
        return $hours.':'.$minuteSeconds;
    }

}
