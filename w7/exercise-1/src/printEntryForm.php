<?php declare(strict_types=1);

function printEntryForm($data): void {
    echo <<<EOL

<form method="post">

<fieldset>

<h1>Customise your appointment</h1>

<label for="givenName">Given name:</label>
<input type="text" name="givenName" id="givenName" value="${data["givenName"]}" required/>

<label for="familyName">Family name:</label>
<input type="text" name="familyName" id="familyName" value="${data["familyName"]}" required/>

<label for="email">Email:</label>
<input type="email" name="email" id="email" value="${data["email"]}" required/>

<label for="personCount">Person count:</label>
<input type="number" name="personCount" id="personCount" min="1" value="${data["personCount"]}" required/>

<hr/>

<h1>Payment information</h1>

<label for="ccNumber">CC number:</label>
<input type="text" name="ccNumber" id="ccNumber" value="${data["ccNumber"]}" required/>

<label for="ccDate">CC date:</label>
<input type="text" name="ccDate" id="ccDate" value="${data["ccDate"]}" required/>

<label for="ccControl">CC control:</label>
<input type="number" name="ccControl" id="ccControl" value="${data["ccControl"]}" required/>

<hr/>

<input type="submit" formnovalidate formaction="index.php" value="Save"/>
<input type="submit" formnovalidate value="Back" disabled/>
<input type="submit" formaction="fillExtendedData.php" value="Next"/>

</fieldset>

</form>

EOL;
}
