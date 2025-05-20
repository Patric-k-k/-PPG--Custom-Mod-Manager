<?php
# Process externalactives (extact)
$extact_raw = file_get_contents($_GET["extact"]);
$extact = explode("\n", $extact_raw);
foreach ($extact as $act) {
    $act = trim($act);
}

# Display mods, using extact to show enabled/disabled mods

# So, you know the part in readme.md that I was talking about the bug? yeah, thats in the lower
# chunk of code. In line 18, it commonly doesn't return a array. There could be more going on here.
# If statements that exists just because of this are marked "cI1"
foreach (new DirectoryIterator($_GET["path"]) as $fileInfo) {
    if($fileInfo->isDot()) continue;
    $path = $fileInfo->getPathname();
    if (file_exists("$path/mod.json")) {
        $data = json_decode(file_get_contents("$path/mod.json"),true);
        if (is_array($data)) { #cI1
            if (array_key_exists("Name",$data)) { #cI1
                if (in_array($fileInfo->getFilename(),$extact)) {
                    $color = "green";
                } else {
                    $color = "red";
                }
                $name = $data["Name"];
                echo "<div class='bg-$color-800/25 w-24 h-24 m-4 text-center'>$name</div>";
            }
        }
    }
}