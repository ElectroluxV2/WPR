<?php declare(strict_types=1);

function printExtendedForm($data): void {
    echo <<<EOL

<form action="print-summary.php" method="post">

<fieldset>

<h1>Fill rest data</h1>

EOL;

    for ($i = 1; $i <= $data["personCount"]; $i++) {
     echo <<<EOL

<h1>Person #${i}</h1>

<label for="givenName${i}">Given name:</label>
<input type="text" name="givenName${i}" id="givenName${i}" value="${data["givenName${i}"]}" required/>

<label for="familyName${i}">Family name:</label>
<input type="text" name="familyName${i}" id="familyName${i}" value="${data["familyName${i}"]}" required/>

<hr/>
EOL;
    }
    echo <<<EOL

<input type="submit" value="Next"/>

</fieldset>

</form>


EOL;
}
