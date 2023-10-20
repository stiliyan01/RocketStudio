$(document).ready(function () {
  $("#sort").on("click", function (e) {
    console.log("tuk sum");
    e.preventDefault();
    if ($("#start_date").val().toString() && $("#end_date").val()) {
      $.get(
        "../model/User.php",
        {
          sorted: "1",
          start_date: $("#start_date").val().toString(),
          end_date: $("#end_date").val().toString(),
        },
        function (res) {
          console.log(res);
          let html = "";
          $(".table tbody").empty();
          $(".table tbody").html(tableBody(res));
        }
      );
    } else {
      alert("insert date's");
    }
  });
  $("#all").on("click", function () {
    $.get(
      "../model/User.php",
      {
        sorted: "0",
      },
      function (res) {
        console.log(res);
        let html = "";
        $(".table tbody").html("");
        $(".table tbody").html(tableBody(res));
      }
    );
  });
});
function tableBody(res) {
  let html = "";
  res.forEach(function (el) {
    html += `
          <tr>
            <td>${el.first_name}</td>
            <td>${el.middle_name}</td>
            <td>${el.sure_name}</td>
            <td>${el.date_of_birth}</td>
            <td>${el.university_name}</td>
            <td>${el.technology_name}</td>
          </tr>`;
  });
  return html;
}
