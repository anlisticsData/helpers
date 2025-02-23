<?php

namespace EdilsonCSilva\Helpers;

use DateTime;
use Exception;

class Clock
{
    private function __construct() {}
    private function __clone() {}
    public static function calculateDateDifference($start, $end)
    {
        $startDate = new DateTime($start);
        $endDate = new DateTime($end);
        $difference = $startDate->diff($endDate);
        return [
            'days' => $difference->days,
            'hours' => $difference->h,
            'minutes' => $difference->i,
            'seconds' => $difference->s
        ];
    }
    public static function NowDate($format = null)
    {
        try {
            if (is_null($format)) {
                return date("Y-m-d H:i:s");
            }
            return date($format);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return null;
    }
    public static function NowDateToTime($data = null)
    {
        try {
            if (is_null($data)) {
                return strtotime(date("Y-m-d H:i:s"));
            }
            return strtotime($data);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return null;
    }
    public static function minuteToSeconds($minute)
    {
        return $minute * 60;
    }

    public static function SecondsToMinute($seconds)
    {
        return $seconds / 60;
    }
    public static function HoursToSeconds($hours)
    {
        return $hours * 3600;
    }
    public static function addOneormoreDay($date, $day = 1)
    {
        $dateObj = new DateTime($date);
        $dateObj->modify(sprintf("+%s day", $day));
        return $dateObj->format('Y-m-d');
    }
    public static function addOneormoremonths($date = null, $month = 1, $format = null)
    {
        if (is_null($date)) {
            $date = date("Y-m-d");
        }
        $dateObj = new DateTime($date);
        $dateObj->modify(sprintf("+%s month", $month));
        if (is_null($format)) {
            return $dateObj->format('Y-m-');
        } else {
            if ($format == "br") {
                return $dateObj->format('/m/Y');
            }
            return $dateObj->format('Y-m-');
        }
    }






      /**
     * Calcula a diferença em horas e minutos entre duas datas.
     *
     * @param string $dateTime1 A primeira data no formato "Y-m-d H:i:s".
     * @param string $dateTime2 A segunda data no formato "Y-m-d H:i:s".
     * @return array Um array com as chaves 'hours' e 'minutes'.
     */
    public static function calculateDifference(string $dateTime1, string $dateTime2): array
    {
        // Criar objetos DateTime a partir das strings
        $dt1 = new DateTime($dateTime1);
        $dt2 = new DateTime($dateTime2);

        // Calcular a diferença
        $interval = $dt1->diff($dt2);

        // Retornar o resultado em horas e minutos
        return [
            'hours' => ($interval->days * 24) + $interval->h,
            'minutes' => $interval->i
        ];
    }


   public static function convertToHours($hours, $minutes) {
        $hoursDecimals = $hours + ($minutes / 60);
        $hoursCalculated =number_format((($hoursDecimals * 100) /100),2,'.','');
       
        return ( $hoursCalculated);
    }


   public static function validateDate($date) {
        preg_match_all('/\d+/',$date, $matches);
        if(is_array($matches) && count($matches[0]) !=3) return false;
        $matches=$matches[0];
        $date =sprintf("%s-%s-%s",$matches[2],$matches[1],$matches[0]);
       
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            return false;
        }
        // Divide a string em partes: ano, mês e dia
        list($ano, $mes, $dia) = explode('-', $date);
        // Verifica se é uma data válida
        return checkdate((int)$mes, (int)$dia, (int)$ano);
    }

    public static function dateParser($date) {
        preg_match_all('/\d+/',$date, $matches);
        if(is_array($matches) && count($matches[0]) !=3) return false;
        $matches=$matches[0];
        return sprintf("%s-%s-%s",$matches[2],$matches[1],$matches[0]);
    }


    
}
