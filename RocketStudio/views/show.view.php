<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>



    <div class="wrapper">
        <h2>
            Сортирай по дата на раждане:
        </h2>
        <div>
            <label for="start_date">From</label><br>
            <input type="date" name="start_date" id="start_date">
            <br>
            <label for="end_date">To</label><br>
            <input type="date" name="end_date" id="end_date">
        </div>
        <button id="sort">Сортирай</button>
        <button id="all">Виж всички сивита</button>
        <h3><a href="/">Създай сиви</a></h3>
    </div>
    <div class="cardsWrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>Име</th>
                    <th>Презиме</th>
                    <th>Фамилия</th>
                    <th>Дата на раждане</th>
                    <th>Университет</th>
                    <th>Технология</th>
                </tr>
            </thead>
            <tbody id="recordsTableBody">
                <?php
                $records = Model::getAllRecords();
                // dd($records);
                foreach ($records as $record) {
                    echo "<tr>";
                    echo "<td>" . $record['first_name'] . "</td>";
                    echo "<td>" . $record['middle_name'] . "</td>";
                    echo "<td>" . $record['sure_name'] . "</td>";
                    echo "<td>" . $record['date_of_birth'] . "</td>";
                    echo "<td>" . $record['university_name'] . "</td>";
                    echo "<td>" . $record['technology_name'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>



    <script src="../resources/show.js"></script>
</body>

</html>