<?php
// Formularz biura podróży
// - stwórz plik PHP zawierający dane do obliczeń (tablica krajów; dla każdego kraju
// określona cena za pobyt 1 osoby przez 1 dzień)
// - stwórz formularz z możliwością wpisania: zakresu dat, liczby osób, wyboru kraju (z
// tablicy krajów)
// - stwórz skrypt, który sprawdzi: czy wypełniono wszystkie pola, czy zakres dat jest
// prawidłowy (data startu jest wcześniejsza niż data zakończenia)
// - jeśli dane są prawidłowe, skrypt powinien policzyć cenę pobytu (na podstawie
// tablicy krajów)

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

const PRICES_PER_ONE_DAY_IN_US_DOLLARS = [
    'Afghanistan' => 80.80,
    'Algeria' => 25,
    'Angola' => 40.30,
    'Argentina' => 120.99,
    'Austria' => 45,
    'Australia' => 1200,
    'Bangladesh' => 79.50,
    'Belarus' => 21.21,
    'Belgium' => 30.30,
    'Bolivia' => 180.12,
    'Bosnia and Herzegovina' => 5.80,
    'Brazil' => 90.22,
    'Britain' => 123.45,
    'Bulgaria' => 543.42,
    'Cambodia' => 95.54,
    'Cameroon' => 89.32,
    'Canada' => 9,
    'Central African Republic' => 10,
    'Chad' => 3425,
    'China' => 999,
    'Colombia' => 654,
    'Costa Rica' => 23,
    'Croatia' => 345,
    'the Czech Republic' => 123,
    'Democratic Republic of the Congo' => 7654,
    'Denmark' => 123123,
    'Ecuador' => 5676,
    'Egypt' => 234,
    'El Salvador' => 457,
    'England' => 234,
    'Estonia' => 6456.23,
    'Ethiopia' => 7868.23,
    'Finland' => 678.12,
    'France' => 123321,
    'Germany' => 656,
    'Ghana' => 2342,
    'Greece' => 567,
    'Guatemala' => 121,
    'Holland' => 321,
    'Honduras' => 213,
    'Hungary' => 4323,
    'Iceland' => 342,
    'India' => 4232,
    'Indonesia' => 43246,
    'Iran' => 534,
    'Iraq' => 645,
    'Ireland' => 4325.23,
    'Israel' => 523,
    'Italy' => 756,
    'Ivory Coast' => 567,
    'Jamaica' => 876,
    'Japan' => 67,
    'Jordan' => 45,
    'Kazakhstan' => 34,
    'Kenya' => 34.34,
    'Laos' => 34,
    'Latvia' => 23,
    'Libya' => 53,
    'Lithuania' => 54,
    'Madagascar' => 24,
    'Malaysia' => 24,
    'Mali' => 12,
    'Mauritania' => 54.34,
    'Mexico' => 43.43,
    'Morocco' => 54.33,
    'Namibia' => 32,
    'New Zealand' => 234.23,
    'Nicaragua' => 3223,
    'Niger' => 234.32,
    'Nigeria' => 234,
    'Norway' => 6456.56,
    'Oman' => 6546.76,
    'Pakistan' => 8678.67,
    'Panama' => 989.68,
    'Paraguay' => 645.56,
    'Peru' => 534.35,
    'The Philippines' => 345.23,
    'Poland' => 54.43,
    'Portugal' => 23.43,
    'Republic of the Congo' => 124.23,
    'Romania' => 0.43,
    'Russia' => 1.23,
    'Saudi Arabia' => 24.23,
    'Scotland' => 5435,
    'Senegal' => 5345,
    'Serbia' => 345,
    'Singapore' => 545,
    'Slovakia' => 566,
    'Somalia' => 767,
    'South Africa' => 0.01,
    'Spain' => 45,
    'Sudan' => 234,
    'Sweden' => 65,
    'Switzerland' => 76,
    'Syria' => 23,
    'Thailand' => 10,
    'Tunisia' => 423,
    'Turkey' => 54,
    'Turkmenistan' => 23,
    'Ukraine' => 87,
    'The United Arab Emirates' => 34,
    'The United States' => 543,
    'Uruguay' => 34,
    'Vietnam' => 54,
    'Wales' => 21,
    'Zambia' => 32,
    'Zimbabwe' => 43,
];

function PrintCountryOptions($selected) {
    foreach (PRICES_PER_ONE_DAY_IN_US_DOLLARS as $key => $item) {
        if ($key == $selected) {
            echo "<option value=\"$key\" selected>$key ($$item)</option>";
        } else {
            echo "<option value=\"$key\">$key ($$item)</option>";
        }
    }
}

function PrintForm($personCount, $begin, $end, $country, $result) {
    echo <<<EOL
<form method="post" name="priceCalculator">
    <fieldset>
    
        <label for="nop">No. of person</label>
        <input type="number" name="personCount" value="${personCount}" id="nop" required>
        
        <label for="bg">Begin</label>
        <input type="date" name="begin" id="bg" value="${begin}" required>
                
        <label for="ed">End</label>
        <input type="date" name="end" id="ed" value="${end}" required>
        
        <label for="country">Country</label>
        <select name="country" id="country" required>
EOL;
    PrintCountryOptions($country);
    echo <<<EOL
        </select>
        
        
        <input type="submit" value="Check">
        
        <code>${result}</code>
    
    </fieldset>
</form>
EOL;
}

$result = null;
$personCount = null;
$begin = null;
$end = null;
$country = null;
extract($_POST);

// Way how html forms works ensures us that other props will be set too
if (isset($personCount)) {
    $dateBeginTimeStamp = strtotime($begin);
    $dateEndTimeStamp = strtotime($end);

    if ($dateBeginTimeStamp > $dateEndTimeStamp) {
        $result = "End date must be greater or equal to begin date!";
    } else if ($personCount <= 0) {
        $result = "Number of person must be greater than 0!";
    } else {
        $days = (($dateEndTimeStamp - $dateBeginTimeStamp) / 60 / 60 / 24) + 1; // Timestamp should be in seconds from 1970
        $result = '$'.$personCount * $days * PRICES_PER_ONE_DAY_IN_US_DOLLARS[$country];
    }
}


PrintForm($personCount, $begin, $end, $country, $result);