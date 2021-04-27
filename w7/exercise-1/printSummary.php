<?php declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function printSummary($data): void {
    echo <<<EOL

<form method="post">
<fieldset>

<h1>Appointment owner</h1>

<label for="givenName">Given name:</label>
<input type="text" name="givenName" id="givenName" value="${data["givenName"]}" disabled/>

<label for="familyName">Family name:</label>
<input type="text" name="familyName" id="familyName" value="${data["familyName"]}" disabled/>

<label for="email">Email:</label>
<input type="email" name="email" id="email" value="${data["email"]}" disabled/>

<label for="personCount">Person count:</label>
<input type="number" name="personCount" id="personCount" value="${data["personCount"]}" disabled/>

<hr/>

<h1>Payment information</h1>

<label for="ccNumber">CC number:</label>
<input type="text" name="ccNumber" id="ccNumber" value="${data["ccNumber"]}" disabled/>

<label for="ccDate">CC date:</label>
<input type="text" name="ccDate" id="ccDate" value="${data["ccDate"]}" disabled/>

<label for="ccControl">CC control:</label>
<input type="number" name="ccControl" id="ccControl" value="${data["ccControl"]}" disabled/>

<hr/>

EOL;

    for ($i = 1; $i <= $data["personCount"]; $i++) {
        echo <<<EOL

<h1>Person #${i}</h1>

<label for="givenName${i}">Given name:</label>
<input type="text" name="givenName${i}" id="givenName${i}" value="${data["givenName${i}"]}" disabled/>

<label for="familyName${i}">Family name:</label>
<input type="text" name="familyName${i}" id="familyName${i}" value="${data["familyName${i}"]}" disabled/>

<hr/>
EOL;
    }

    echo <<<EOL
<input type="submit" formnovalidate value="Save" disabled/>
<input type="submit" formnovalidate formaction="fill-rest-data.php" value="Back"/>
<input type="submit" value="Next" disabled/>
</fieldset>
</form>
EOL;

}