/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

const baseURL = "http://localhost:8080/";

// Example POST method implementation:
async function reqData(url = "", data = {}) {
  // Default options are marked with *
  let headers = {
    "X-Requested-With": "XMLHttpRequest",
  };
  if (data.headers) {
    headers = { ...headers, ...data.headers };
  }
  // "Content-Type": "application/json",
  // 'Content-Type': 'application/x-www-form-urlencoded',
  const response = await fetch(url, {
    method: data.method,
    mode: "cors", // no-cors, *cors, same-origin
    cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
    credentials: "same-origin", // include, *same-origin, omit
    headers: headers,
    redirect: "follow", // manual, *follow, error
    referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    body: data.data, // body data type must match "Content-Type" header
  });
  return response.json(); // parses JSON response into native JavaScript objects
}

// function confirmDialog(config = {}, type, data) {
//   return Swal.fire(config).then((result) => {
//     if (type == "delete") {
//       return reqData(data.url, data.config);
//     }
//   });
// }

function responseResult(result) {
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
}

function previewImage(files, selector) {
  const [file] = files;
  if (file) {
    $(selector).prop("src", URL.createObjectURL(file));
  } else {
    $(selector).prop("src", "/img/upload-thumb.png");
  }
}

$("#logout").click(function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Log out",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.replace("/logout");
    }
  });
});
