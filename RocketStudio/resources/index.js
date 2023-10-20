$(document).ready(function () {
  $("#addUniversity").on("click", function (e) {
    e.preventDefault();
    $(".universityPopup").toggle();
  });

  $("#addTechnology").on("click", function (e) {
    e.preventDefault();
    $(".technologyPopup").toggle();
  });

  $("#saveCandidateButton").on("click", function (e) {
    if (
      checker($("#firstName").val().toString()) &&
      checker($("#middleName").val().toString()) &&
      checker($("#sureName").val().toString()) &&
      isFutureDate($("#dateOfBirth").val().toString()) &&
      checker($("#university").val().toString()) &&
      checker($("#technologies").val().toString())
    ) {
      $.post(
        "../model/User.php",
        {
          first_name: $("#firstName").val(),
          middle_name: $("#middleName").val(),
          sure_name: $("#sureName").val(),
          date_of_birth: $("#dateOfBirth").val(),
          university_id: $("#university").val().toString(),
          technology_id: $("#technologies").val().toString(),
        },
        function (res) {
          console.log(res);
          if (res === "false") {
            alert("User already exist");
          } else {
            alert("Submitted properly");
            $("#firstName").val(""),
              $("#middleName").val(""),
              $("#sureName").val(""),
              $("#dateOfBirth").val(""),
              $("#university").val("");
            $("#technologies").val("");
          }
        }
      );
    } else {
      alert("Incorrect user information");
    }
  });

  $("#saveUniversityButton").on("click", function (e) {
    e.preventDefault();
    $.post(
      "../model/University.php",
      {
        university_name: $("#universityName").val().toString(),
        grade: $("#grade").val(),
      },
      function (res) {
        $("#university").append(
          `<option value=${res.id}>${res.university_name}</option>`
        );
        $(".universityPopup").hide();
        $("#university").val(res.id);
      }
    );
  });

  $("#saveTechnologyButton").on("click", function (e) {
    e.preventDefault();

    $.post(
      "../model/Technology.php",
      { technology_name: $("#technologyName").val() },
      function (res) {
        $("#technologies").append(
          `<option value=${res.id}>${res.technology_name}</option>`
        );
        $(".technologyPopup").hide();
        $("#technologies").val(res.id);
      }
    );
  });
});

function checker(input) {
  if (!input || input.trim().length === 0) {
    return false;
  }
  return true;
}
function isFutureDate(input) {
  const inputDate = new Date(input);
  const currentDate = new Date();

  return inputDate < currentDate;
}
