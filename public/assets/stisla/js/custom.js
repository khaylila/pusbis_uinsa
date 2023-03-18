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
  const response = await fetch(url, {
    method: data.method,
    mode: "cors", // no-cors, *cors, same-origin
    cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
    credentials: "same-origin", // include, *same-origin, omit
    headers: {
      "Content-Type": data.contentType ?? "application/x-www-form-urlencoded",
      "X-Requested-With": "XMLHttpRequest",
    },
    redirect: "follow", // manual, *follow, error
    referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    body: data.data, // body data type must match "Content-Type" header
  });
  return response.json(); // parses JSON response into native JavaScript objects
}

$('#logout').click(function(e){
  e.preventDefault();
  Swal.fire({
    title: 'Are you sure?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Log out'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.replace("/logout");
    }
  })
});
