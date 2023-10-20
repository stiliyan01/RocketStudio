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

    <h1>Създаване на CV</h1>

    <form id="creatingCv">

        <input type="text" id="firstName" name="firstName" placeholder="Име..."><br><br>
        <input type="text" id="middleName" name="lastName" placeholder="Презиме..."><br><br>
        <input type="text" id="sureName" name="familyName" placeholder="Фамилия..."><br><br>
        <label for="dateOfBirth">Дата на Раждане:</label>
        <input type="date" id="dateOfBirth" name="dateOfBirth"><br><br>

        <div class="wrapper">
            <select id="university" name="university">
                <option value="" selected disabled hidden>Изберете Университет</option>
                <?php
                // Извикване на метода all с името на таблицата "university"
                $universities = Model::all("university");

                if ($universities) {
                    foreach ($universities as $university) {
                        echo '<option value="' . $university['id'] . '">' . $university['university_name'] . '</option>';
                    }
                }
                ?>

            </select>
            <button id="addUniversity"><img src="./resources/pen.png" height="20px" width="20px"></button>

            <div class="universityPopup">
                <h2>Добавяне на Университет</h2>
                <input type="text" id="universityName" name="universityName"
                    placeholder="Име на университет..."><br><br>
                <input type="text" id="grade" name="grade" placeholder="Акредедитационна оценка..."><br><br>
                <button id="saveUniversityButton">Запис</button>
            </div>

        </div><br><br>

        <div class="wrapper">
            <select name="options[]" id="technologies" multiple>
                <?php
                $technologies = Model::all("technologies");
                if ($technologies) {
                    foreach ($technologies as $technology) {
                        echo '<option value="' . $technology['id'] . '">' . $technology['technology_name'] . '</option>';
                    }
                    echo '</select>';
                }
                ?>

            </select>
            <button id="addTechnology"><img src="./resources/pen.png" height="20px" width="20px"></button>

            <div class="technologyPopup">
                <input type="text" id="technologyName" name="technologyName" placeholder="Име на технология..."><br>
                <button id="saveTechnologyButton">Запис</button>
            </div>
        </div><br><br>

        <button id="saveCandidateButton" type="button">Запис на CV</button>

    </form>

    <h3><a href="/show">Виж всички сивита</a></h3>

    <script type="module" src="./resources/index.js"></script>
</body>

</html>