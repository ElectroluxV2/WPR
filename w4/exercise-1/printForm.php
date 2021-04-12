<?php declare(strict_types=1);
function PrintForm(float $a, float $b, float $result): void {
    echo <<<EOL
<form method="post" name="calc">
    <fieldset>
    
        <input type="number" step="0.01" name="a" value="${a}" required>
        
        <label for="+">+</label>
        <input type="radio" name="operator" value="+" id="+" required>
        
        <label for="-">-</label>
        <input type="radio" name="operator" value="-" id="-">
        
        <label for=":">:</label>
        <input type="radio" name="operator" value="/" id=":">
        
        <label for="*">*</label>
        <input type="radio" name="operator" value="*" id="*">
        
        <input type="number" step="0.01" name="b" value="${b}" required>
    
        <input type="submit" value="=">
        
        <code>${result}</code>
    
    </fieldset>
</form>
EOL;
}