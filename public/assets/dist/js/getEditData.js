$(document).on("click", ".open-modal-edit", function () {
    var url = "/home";
    var id = $(this).val();
    var actionUrl = "http://127.0.0.1:8000/home/:id";
    actionUrl = actionUrl.replace(":id", id);

    $(this).attr("data-toggle", "modal");
    $(this).attr("data-target", "#ModalEditData");

    $.get(url + "/" + id, function (data) {
        // Success callback
        console.log(data);

        // Set the values of the input fields in the modal
        $("#id").val(data.id);
        $("#edit-title").val(data.title);
        $("#edit-description").val(data.description);
        $("#edit-end_at").val(data.end_at);

        // Set the 'action' attribute of the form to the updated URL
        $("#edit-form").attr("action", actionUrl);

        // Show the modal
        $("#ModalEditData").modal("show");
    }).fail(function (xhr, textStatus, errorThrown) {
        // Error callback
        console.log("Error:", errorThrown);
    });
});

$(document).on("click", ".open-modal-delete", function () {
    var url = "/home";
    var id = $(this).val();
    var actionUrl = "http://127.0.0.1:8000/home/:id";
    actionUrl = actionUrl.replace(":id", id);

    $(this).attr("data-toggle", "modal");
    $(this).attr("data-target", "#ModalHapusData");

    $.get(url + "/" + id, function (data) {
        $("#delete-title").text(data.title);
        $("#delete-description").text(data.description);
        $("#delete-end_at").text(
            data.end_at ? data.end_at : "Tidak Ditentukan"
        );

        $("#delete-form").attr("action", actionUrl);
        $("#ModalHapusData").modal("show");
    }).fail(function (xhr, textStatus, errorThrown) {
        // Error callback
        console.log("Error:", errorThrown);
    });
});
