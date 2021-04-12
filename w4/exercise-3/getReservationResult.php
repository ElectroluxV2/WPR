<?php declare(strict_types=1);
function GetReservationResult(Array $data): string {
    $dateBeginTimeStamp = strtotime($data['begin']);
    $dateEndTimeStamp = strtotime($data['end']);

    if ($dateBeginTimeStamp > $dateEndTimeStamp) {
        return "End date must be greater or equal to begin date!";
    } else if ($data['personCount'] <= 0) {
        return "Number of person must be greater than 0!";
    } else {
        $days = (($dateEndTimeStamp - $dateBeginTimeStamp) / 60 / 60 / 24) + 1; // Timestamp should be in seconds from 1970
        return '$'.$data['personCount'] * $days * PRICES_PER_ONE_DAY_IN_US_DOLLARS[$data['country']];
    }
}