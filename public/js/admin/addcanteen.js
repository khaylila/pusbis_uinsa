$(document).ready(function () {
  $("#form_canteenadd").on("submit", function (e) {
    e.preventDefault();
    const cardTarget = "#add_canteen";
    $.cardProgress(cardTarget, {
      dismiss: false,
    });
    const formData = new URLSearchParams($(this).serialize());
    reqData(baseURL + "admin/canteen", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      data: formData,
    })
      .then((result) => {
        $(".is-invalid").removeClass("is-invalid");
        $(".invalid-feedback").remove();
        if (result.error == 400) {
          for (let item in result.messages) {
            $("#" + item)
              .addClass("is-invalid")
              .parents(".form-group")
              .append(
                `<div class="invalid-feedback">${result.messages[item]}</div>`
              );
          }
        } else if ((result.error ?? result.httpCode) == 308) {
          Swal.fire({
            title: result.status ?? "Info",
            text: result.messages,
            icon: "info",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
            allowOutsideClick: false,
          }).then((rst) => {
            if (rst.isConfirmed) {
              window.location.replace(result.url);
            }
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: result.messages ?? result.message,
          });
        }
      })
      .catch((err) => {
        console.log(err);
      })
      .finally(() => {
        $.cardProgressDismiss(cardTarget);
      });
  });
});
