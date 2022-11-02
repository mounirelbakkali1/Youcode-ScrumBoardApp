var form = document.forms["form-task"];
const clear = () => form.reset();

$(document).ready(function () {
  $("#task-info button").click(function () {
    $("#task-save-btn").hide();
    $("#task-update-btn").show();
    $("#task-delete-btn").show();
    $(".modal-title").text("Update Task");
    $("div#modal-task").modal("show");
    //console.log($(this).parent().parent().parent().find("input").val());
    form.id.value = $(this).parent().parent().parent().find("input").val();
    form.title.value = $(this).parent().find("h6").text();
    form.date.value = $(this).parent().find("p").find("span").text();
    form.description.value = $(this).parent().find("p:nth-of-type(2)").text();
    form.task_type.value = $(this)
      .parent()
      .parent()
      .find("button:nth-of-type(1)")
      .find("input")
      .val();
    form.priority_id.value = $(this)
      .parent()
      .parent()
      .find("button:nth-of-type(2)")
      .find("input")
      .val();
    form.status_id.value = $(this).parent().parent().parent().attr("id");
  });
});
