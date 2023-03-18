$(document).ready(function () {
  $(".use-select2").select2({
    placeholder: "Select one",
  });

  $("#province").select2({
    placeholder: "Select one",
    ajax: {
      url: baseURL + "api/provinces",
      delay: 250,
      data: function (params) {
        var query = {
          search: params.term,
        };
        return query;
      },
      processResults: function (result) {
        return {
          results: result.data,
        };
      },
    },
  });

  $("#province").on("change", function () {
    $("#city").select2({
      placeholder: "Select one",
      ajax: {
        url: baseURL + "api/regencies/" + $("#province").val(),
        delay: 250,
        data: function (params) {
          var query = {
            search: params.term,
          };
          return query;
        },
        processResults: function (result) {
          return {
            results: result.data,
          };
        },
      },
    });
    $("#city,#regency,#district").val(null).trigger("change");
    $("#city").prop("disabled", false);
    $("#regency,#district").prop("disabled", true);
  });

  $("#city").on("change", function () {
    $("#regency").select2({
      placeholder: "Select one",
      ajax: {
        url: baseURL + "api/districts/" + $("#city").val(),
        delay: 250,
        data: function (params) {
          var query = {
            search: params.term,
          };
          return query;
        },
        processResults: function (result) {
          return {
            results: result.data,
          };
        },
      },
    });
    $("#regency,#district").val(null).trigger("change");
    $("#regency").prop("disabled", false);
    $("#district").prop("disabled", true);
  });

  $("#regency").on("change", function () {
    $("#district").select2({
      placeholder: "Select one",
      ajax: {
        url: baseURL + "api/urbans/" + $("#regency").val(),
        delay: 250,
        data: function (params) {
          var query = {
            search: params.term,
          };
          return query;
        },
        processResults: function (result) {
          return {
            results: result.data,
          };
        },
      },
    });
    $("#district").val(null).trigger("change");
    $("#district").prop("disabled", false);
  });

  $("#form_register").on("submit", function (e) {
    e.preventDefault();
    const cardTarget = "#auth";
    $.cardProgress(cardTarget, {
      dismiss: false,
    });
    const formData = new URLSearchParams($(this).serialize());
    reqData(baseURL + "register", {
      method: "POST",
      data: formData,
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
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
