$(document).ready(function () {
  $("#profile_picture").change(function () {
    const [file] = $(this)[0].files;
    if (file) {
      $(".img-thumbnail").prop("src", URL.createObjectURL(file));
    } else {
      $(".img-thumbnail").prop("src", "/img/upload-thumb.png");
    }
  });

  $("#logo_kantin").change(function () {
    const [file] = $(this)[0].files;
    if (file) {
      $(".img-thumbnail").prop("src", URL.createObjectURL(file));
    } else {
      $(".img-thumbnail").prop("src", "/img/upload-thumb.png");
    }
  });

  $("#form_setup_wizzard").submit(function (e) {
    e.preventDefault();

    const cardTarget = "#setup_wizzard";
    $.cardProgress(cardTarget, {
      dismiss: false,
    });
    const formData = new FormData();
    $(cardTarget + " input").each(function () {
      if ($(this).prop("type") == "file") {
        formData.append($(this).prop("name"), $(this)[0].files[0]);
      } else {
        formData.append($(this).prop("name"), $(this).val());
      }
    });
    reqData(baseURL + "setup-wizzard", {
      method: "POST",
      data: formData,
    })
      .then((result) => {
        console.log(result);
        $(".is-invalid").removeClass("is-invalid");
        $(".invalid-feedback").remove();
        if (result.status == 308) {
          if (result.messages.showMessage === false) {
            window.location.replace(result.url);
          } else {
            Swal.fire({
              title: result.status ?? "Info",
              text: result.messages?.success,
              icon: "info",
              confirmButtonColor: "#3085d6",
              confirmButtonText: "OK",
              allowOutsideClick: false,
            }).then((rst) => {
              if (rst.isConfirmed) {
                window.location.replace(result.url);
              }
            });
          }
        } else {
          if (result.messages?.error) {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: result.messages?.error,
            });
          } else {
            for (let item in result.messages) {
              if (item == "phone_number") {
                $("#" + item)
                  .addClass("is-invalid")
                  .parents(".input-group ")
                  .append(
                    `<div class="invalid-feedback">${result.messages[item]}</div>`
                  );
              } else {
                $("#" + item)
                  .addClass("is-invalid")
                  .parents(".form-group")
                  .append(
                    `<div class="invalid-feedback">${result.messages[item]}</div>`
                  );
              }
            }
          }
        }
      })
      .catch((error) => {
        console.log(error);
      })
      .finally(() => {
        $.cardProgressDismiss(cardTarget);
      });
  });
});
