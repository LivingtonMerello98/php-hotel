<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

// controllo se il parametro 'parking' è stato inviato tramite GET
$filterByParking = isset($_GET['parking']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>php hotel</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 bg-dark text-center rounded my-3 py-2 text-white">
                <h1 class="mb-3">Hotels</h1>
                <p>find your next adventure</p>
            </div>
            <div>
                <div class="col-12 bg-dark-subtle text-white rounded mb-3 py-2 ">
                    <h2 class="mx-3">Partnership Hotels</h2>
                </div>
                <!-- creiamo il form -->

                <form action="index.php" method="GET" class="form-inline my-3">
                    <div class="col">
                        <div class="d-flex">
                            <div class="col-6 d-flex align-items-center">
                                <div class="form-group mr-3">
                                    <label for="parking" class="mr-2">Filtra per parcheggi</label>
                                    <input type="checkbox" id="parking" name="parking" class="form-check-input mx-3">
                                </div>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <button type="submit" class="btn btn-secondary ">filtra</i></button>
                            </div>
                        </div>
                    </div>
                </form>


                <!-- creiamo la tabella -->
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <!-- con <th></th> creiamo la casella per la tipologia di dato che vogliamo ricevere nella colonna-->
                            <th>Name</th>
                            <th>Description</th>
                            <th>Parking</th>
                            <th>Vote</th>
                            <th>Distance to Center</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Per ogni oggetto presente all'interno dell'array associativo, stampiamo le chiavi e i valori
                        foreach ($hotels as $hotel) {
                            if (!$filterByParking || ($filterByParking && $hotel['parking'])) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($hotel['name']) . '</td>';
                                echo '<td>' . htmlspecialchars($hotel['description']) . '</td>';
                                echo '<td>' . ($hotel['parking'] ? 'Yes' : 'No') . '</td>';
                                echo '<td>' . htmlspecialchars($hotel['vote']) . '</td>';
                                echo '<td>' . htmlspecialchars($hotel['distance_to_center']) . ' km</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>