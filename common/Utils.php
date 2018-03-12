<?php

class Utils {

    public function moneyFormatter($amount) {
        setlocale(LC_MONETARY, "es_MX");
        return money_format("%2n", $amount);
    }

    function getCurrentWeek() {
        $dateIni = new DateTime(Constants::DATE_INI);
        $today = new DateTime((new DateTime())->format("d-m-Y"));
        $diff = ($today->diff($dateIni)->format("%a"))/7;

        $week = intval($diff) + 1;
        return $week;
    }

    function getWeekFromdate($date) {
        $dateIni = new DateTime(Constants::DATE_INI);
        $customDate = new DateTime($date);
        $diff = ($customDate->diff($dateIni)->format("%a"))/7;

        $week = intval($diff) + 1;
        return $week;
    }

    function getMonthsFromdate($fromDate) {
        $today = new DateTime((new DateTime())->format("d-m-Y"));
        $customDate = new DateTime($fromDate);
        $months = ($today->diff($customDate)->format("%m"));

        return $months;
    }

}

?>
