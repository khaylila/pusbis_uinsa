const baseURL = "http://localhost:8080";
const redirect = (url) => {
  return window.location.replace(url);
};

$(document).ready(function () {
  $("#admin-area").click(function () {
    redirect(baseURL + "/admin");
  });

  $("#store").click(function () {
    redirect(baseURL + "/shop");
  });

  $("#canteen").click(function () {
    redirect(baseURL + "/canteen");
  });

  $("#hotel").click(function () {
    redirect(baseURL + "/hotel");
  });
});
