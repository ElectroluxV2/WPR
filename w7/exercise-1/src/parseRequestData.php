<?php declare(strict_types=1);

function parseRequestedData(array $request, array &$session): array {
    if (!isset($session["data"])) {
        $session["data"] = [];
    }

    $sessionData = $session["data"];

    $defaults = [
        "givenName" => null,
        "familyName" => null,
        "email" => null,
        "personCount" => null,
        "ccNumber" => null,
        "ccDate" => null,
        "ccControl" => null
    ];

    $parsedData = [];

    if (empty($request) && empty($session["data"])) {
        // No data, return defaults
        return $defaults;
    } else if (empty($request)) {
        // No request data, based on previous version
        $parsedData = $session["data"];
    } else {
        // Request data present, parse and return
        // Data importance order: REQUEST > SESSION > DEFAULT
        $parsedData = array_merge($defaults, $sessionData, array_filter(filter_var_array($request, [
            "givenName" => FILTER_SANITIZE_STRING,
            "familyName" => FILTER_SANITIZE_STRING,
            "email" => FILTER_SANITIZE_EMAIL,
            "personCount" => FILTER_SANITIZE_NUMBER_INT,
            "ccNumber" => FILTER_SANITIZE_STRING,
            "ccDate" => FILTER_SANITIZE_STRING,
            "ccControl" => FILTER_SANITIZE_NUMBER_INT
        ])));
    }

    // Parse additional data
    for ($personIndex = 1; $personIndex <= $parsedData["personCount"]; $personIndex++) {
        // Data importance order: REQUEST > SESSION > DEFAULT
        $parsedData["givenName${personIndex}"] = filter_var($request["givenName${personIndex}"] ?? $sessionData["givenName${personIndex}"] ?? $defaults["givenName"],FILTER_SANITIZE_STRING);
        $parsedData["familyName${personIndex}"] = filter_var($request["familyName${personIndex}"] ?? $sessionData["familyName${personIndex}"] ?? $defaults["familyName"],FILTER_SANITIZE_STRING);

    }

    return $parsedData;
}
