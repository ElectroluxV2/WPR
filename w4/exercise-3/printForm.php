<?php declare(strict_types=1);
function PrintForm(Array $data, string $message): void {
echo <<<EOL
<form method="post" name="priceCalculator">
    <fieldset>
    
        <em>Make Your reservation</em><br>
    
        <label for="nop">No. of person</label>
        <select name="personCount" id="nop" required>
EOL;
    for ($i = 1; $i < 5; $i++) {
        if ($i == $data['personCount']) {
            echo "<option value=\"$i\" selected>$i</option>";
        } else {
            echo "<option value=\"$i\">$i</option>";
        }
    }
    echo <<<EOL
        </select>
        
        <label for="bg">Begin</label>
        <input type="date" name="begin" id="bg" value="${data["begin"]}" required>
                
        <label for="ed">End</label>
        <input type="date" name="end" id="ed" value="${data["end"]}" required>
        
        <label for="country">Country</label>
        <select name="country" id="country" required>
EOL;
    foreach (PRICES_PER_ONE_DAY_IN_US_DOLLARS as $key => $item) {
        if ($key == $data["country"]) {
            echo "<option value=\"$key\" selected>$key ($$item)</option>";
        } else {
            echo "<option value=\"$key\">$key ($$item)</option>";
        }
    }
    echo <<<EOL
        </select>
        
        <hr>
        <em>Select your needs</em><br>
        
        <label for="ibc">Include baby carriage</label>
        EOL;

    if (!empty($data["ibc"])) {
        echo '<input type="checkbox" name="ibc" id="ibc" checked>';
    } else {
        echo '<input type="checkbox" name="ibc" id="ibc" >';
    }

    echo '<label for="iac">Include air conditioning</label>';
    if (!empty($data["iac"])) {
        echo '<input type="checkbox" name="iac" id="iac" checked>';
    } else {
        echo '<input type="checkbox" name="iac" id="iac" >';
    }

    echo '<label for="iay">Include ashtray</label>';
    if (!empty($data["iay"])) {
        echo '<input type="checkbox" name="iay" id="iay" checked>';
    } else {
        echo '<input type="checkbox" name="iay" id="iay" >';
    }

    echo <<<EOL
        <hr>
        <em>Enter your payment information</em><br>
        
        <label for="ccNumber">CC number</label>
        <input type="number" name="ccNumber" value="${data["ccNumber"]}" id="ccNumber" autocomplete="cc-number" required>
        
        <label for="ccExp">CC expiration date</label>
        <input type="date" name="ccExp" value="${data["ccExp"]}" id="ccExp" autocomplete="cc-exp" required>
        
        <label for="ccCsc">CC security number</label>
        <input type="number" name="ccCsc" value="${data["ccCsc"]}" id="ccCsc" autocomplete="cc-csc" required>
        
        <hr>
        <em>Person No. 1</em><br>
        
        <label for="firstName">First name</label>
        <input type="text" name="firstName" value="${data["firstName"]}" id="firstName" autocomplete="given-name" required>
        
        <label for="secondName">Second name</label>
        <input type="text" name="secondName" value="${data["secondName"]}" id="secondName" autocomplete="family-name" required>
        
        <label for="address">Address</label>
        <input type="text" name="address" value="${data["address"]}" id="address" autocomplete="address-line1" required>
        
        <label for="email">Email</label>
        <input type="email" name="email" value="${data["email"]}" id="email" required>
        
        <section class="pc">
            <hr>
            <em>Person No. 2</em><br>
            
            <label for="firstName2">First name</label>
            <input type="text" name="firstName2" value="${data["firstName2"]}" id="firstName2" autocomplete="given-name">
            
            <label for="secondName2">Second name</label>
            <input type="text" name="secondName2" value="${data["secondName2"]}" id="secondName2" autocomplete="family-name">
        </section>
        
        <section class="pc">
            <hr>
            <em>Person No. 3</em><br>
            
            <label for="firstName3">First name</label>
            <input type="text" name="firstName3" value="${data["firstName3"]}" id="firstName3" autocomplete="given-name">
            
            <label for="secondName3">Second name</label>
            <input type="text" name="secondName3" value="${data["secondName3"]}" id="secondName3" autocomplete="family-name">
        </section>
        
        <section class="pc">
            <hr>
            <em>Person No. 4</em><br>
            
            <label for="firstName4">First name</label>
            <input type="text" name="firstName4" value="${data["firstName4"]}" id="firstName4" autocomplete="given-name">
            
            <label for="secondName4">Second name</label>
            <input type="text" name="secondName4" value="${data["secondName4"]}" id="secondName4" autocomplete="family-name">
        </section>
        
        <br>
        <input type="submit" value="Check">
        <a href="list-reservations.php">Show filled reservations</a>
        
        <code>${message}</code>
    
    </fieldset>
</form>
EOL;
}