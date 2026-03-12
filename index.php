<?php
    $yoann = [12, 15, 8, 6, 20, 19];
    $bulletinScolaire = [
        "math" => 15,
        "français" => 12,
        "histoire-géo" => 8,
        "physique-chimie" => 18
    ];
    $noteEleve = [
        "yoann" => $yoann,
        "jeff" => [9, 5, 17, 16, 12, 13],
        "mathieu" => [20, 18, 8, 4, 15, 16]
    ];

    // function fonctionMoyenne($tableauNotes){
    //     $sum = array_reduce($tableauNotes, function($accumulator, $value){
    //         $accumulator += $value;
    //     }, 0);
    //     $moyenne = $sum / (sizeof($tableauNotes)+1);
    //     return $moyenne;
    // };

    function fonctionMoyenne($tableauNotes, $sum=0){
        for($i = 0; $i < sizeof($tableauNotes); $i++){
            $sum += $tableauNotes[$i];
        }
        $moyenne = round($sum / sizeof($tableauNotes), 2);
        return $moyenne;
    };

    $moyenneYoann = fonctionMoyenne($yoann);
    $moyenneJeff = fonctionMoyenne($noteEleve["jeff"]);
    $moyenneMathieu = fonctionMoyenne($noteEleve["mathieu"]);
    $tableauMoyenne = [$moyenneYoann, $moyenneJeff, $moyenneMathieu];
    $moyenneGeneral = fonctionMoyenne($tableauMoyenne);

    foreach($yoann as $value){
        $value -= 2;
    };

    include_once "./header.php";
?>
    
<main>
    <h1> Note de Yoann </h1>
    <ul>
    <?php
    for($i = 0; $i < sizeof($yoann); $i++){
        $counter = $i + 1;
        echo "<li> Note {$counter} : {$yoann[$i]}</li>";
    }
    echo "<li>{$moyenneYoann}</li>";
    echo "<li>{$moyenneGeneral}</li>";

    ?> </ul>
    <h1>Bulletin Scolaire de Yoann</h1>
    <ul>
       <?php
            foreach ($bulletinScolaire as $key => $value){
                echo "<li>{$key}  :   {$value}  </li>";
            }

    ?> </ul>

    <h1>Moyenne de la Classe</h1>
    <ul>
       <?php
            foreach ($noteEleve as $key => $value){
                echo "<li>Moyenne de {$key}  :   ".fonctionMoyenne($value)."  </li>";
            }

    ?> </ul>
    <?php
        echo "<h2>Moyenne Générale : {$moyenneGeneral}</h2>"
    ?>
</main>

<?php
    include_once "./footer.php";
?>