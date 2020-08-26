<?php

// Skapa en associativ array med sträng-baserade index:er.
$pengar = array("Oscar"=>5000, "Bengt"=>10000, "Anna"=>15000);

// Använd PHP:s inbyggda funktion print_r för att skriva ut innehållet av vår array.
echo "Inbyggd:" . PHP_EOL;
print_r($pengar);
echo PHP_EOL;

// Använd hemmagjord funktion för att skriva ut innehållet av en array.
function skrivut($variabel) {
    $ut = "";

    // Lägg till variabel-typ, radbrytning och öppnande parantes.
    $ut .= gettype($variabel) . PHP_EOL . "(";

    foreach ($variabel as $nyckel => $värde) {
        // Lägg till namn/värde på nyckel, värdet av array-elementet och radbrytning.
        $ut .= "\t[$nyckel] => $värde" . PHP_EOL;
    }

    // Avsluta med stängande parantes och radbrytning.
    $ut .= ")" . PHP_EOL;

    // Skriv ut $ut-variabeln till terminalen.
    echo $ut;
}

echo "Hemmagjord:" . PHP_EOL;
skrivut($pengar);