<?php declare(strict_types=1);
function PrintScript(): void {
    echo <<<EOL

    <script>

    window.onload = () => {
        const sections = document.getElementsByClassName('pc');
        const update = pc => {
           
            for (let i = 0; i < 3; i++) {
                sections[i].hidden = i + 1 >= pc;
            }
        }
      
        const nop = document.getElementById('nop');
        nop.onchange = e => {
            update(e.target.value);
        }
        
        update(nop.value);
    }
    
    </script>

EOL;
}