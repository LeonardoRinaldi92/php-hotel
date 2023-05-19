<?php
     $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $park = isset($_GET['park']);
    $voto = isset($_GET['voto']);

    if (($park && $_GET['park']) && (($voto && $_GET['voto'])) ){
        $hotels_filtered = [];
        foreach($hotels as $hotel){
            if ($hotel['parking'] && $hotel['vote'] >= $_GET['voto']) {
                $hotels_filtered[] = $hotel;
            }
        }
        $hotels = $hotels_filtered;
    }else if ($park && $_GET['park']){
        $hotels_filtered = [];
        foreach($hotels as $hotel){
            if ($hotel['parking']) {
                $hotels_filtered[] = $hotel;
            }
        }
        $hotels = $hotels_filtered;
    }else if ($voto && $_GET['voto']){
        $hotels_filtered = [];
        foreach($hotels as $hotel){
            if ($hotel['vote'] >= $_GET['voto']) {
                $hotels_filtered[] = $hotel;
            }
        }
        $hotels = $hotels_filtered;
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>PHP-Hotels</title>
</head>
<body>
    <div class="container mt-5">
        <form  method="GET" action="index.php">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="true" name="park">
                <label class="form-check-label" for="park">
                  con parcheggio?
                </label>
            </div>
            <select class="form-select w-25" aria-label="voto" name="voto">
                <option disabled selected>stelle minime</option>
                <option value="1">&#9733;</option>
                <option value="2">&#9733;&#9733;</option>
                <option value="3">&#9733;&#9733;&#9733;</option>
                <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
            </select>
            <button type="submit" class="mt-2"> vai!</button>
        </form>
    </div>
    <?php
        if($hotels) {
            echo "<div class='container mt-5'>
                        <div class='card'>
                            <table class='table'>
                                <thead>
                                <tr>
                                    <th scope='col'>Nome</th>
                                    <th scope='col'>Descrizione</th>
                                    <th scope='col'>Parcheggio</th>
                                    <th scope='col'>Voto</th>
                                    <th scope='col'>Distanza dal centro</th>
                                </tr>
                                </thead>
                                <tbody>";
        };
        foreach($hotels as $hotel){
            echo "<tr>
            <th scope='row'>".$hotel['name']."</th>
            <td>".$hotel['description']."</td>
            <td>".($hotel['parking'] ? 'Si' : 'No')."</td>
            <td>".$hotel['vote']."</td>
            <td>".$hotel['distance_to_center']." Km"."</td>
            </tr>";
        }
        if($hotels) {
            echo "</tbody>
            </table>
        </div>
    </div>";
        }


        if(!$hotels) {
            echo 
            "<div class='container mt-4'>
                <p>Nessun Risultato</p>
            </div>";

        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>