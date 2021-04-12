<?php declare(strict_types=1);

function printForm(string $error = ""): void {
echo <<<EOL

<form method="post">
    <fieldset>
        <header>
            
            <label for="filename">Filename</label>
            <input type="text" maxlength="64" id="filename" name="filename" value="some name" required>
        </header>
       
        <main>
            <label for="content">Content</label>
            <textarea maxlength="1024" id="content" name="content" required>some content</textarea>
        </main>
        
        <menu>
            <div>
                <input type="submit" value="Save">
                <em>${error}</em>
            </div>
            
        </menu>
    </fieldset>
</form>

EOL;
}

function printStyles(): void {
echo <<<EOL

<style>
body {
    background-color: dimgrey;
    color: wheat;
    margin: 0;
    height: 100%;
}

input, textarea {
    background-color: darkgray;
}

fieldset {
    display: grid;
    grid-template-rows: auto 1fr auto;
    padding: 1em;
    height: 100%;
    box-sizing: border-box;
}

header {
    display: grid;
    grid-template-columns: auto 1fr;
}

menu {
    display: grid;
    place-items: center;
    margin: 5px;
    box-sizing: border-box;
}

#content {
    width: 100%;
    height: 100%;
}

main {
    overflow: hidden;
}

</style>

EOL;
}

printStyles();

$filename = "";
$content = "";

extract($_REQUEST);

if (empty($filename) || empty($content)) {
    // Just form
    printForm();
    die;
}


if (strlen($filename) > 50 || strlen($filename) < 1) {
    printForm("Filename is too short or too long");
    die;
}

if (strlen($content) > 1024 || strlen($content) < 1) {
    printForm("Content is too short or too long");
    die;
}

$safeFilename = htmlspecialchars($filename);
// chmod("texts/$safeFilename.txt", 0766);
$file = fopen(realpath("texts/$safeFilename.txt"), 'w');
if (!$file) {
    printForm("Can't create / read file");
    die;
}

// Everything good
printForm();