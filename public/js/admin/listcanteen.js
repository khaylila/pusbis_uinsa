$(document).ready(function () {
  $(".canteen-delete").click(function (e) {
    e.preventDefault();
    const link = $(this).prop("href");
    const cardTarget = "#canteen_user";
    $.cardProgress(cardTarget, {
      dismiss: false,
    });
    Swal.fire({
      title: "Ingin menghapus kantin dari daftar?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Hapus",
    }).then((result) => {
      if (result.isConfirmed) {
        reqData(link, {
          method: "POST",
          data: "_method=DELETE",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
        })
          .then((data) => {
            if (data.status == 200) {
              Swal.fire({
                title: "Success",
                text: data.messages?.success,
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Ok!",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.replace(data.url);
                }
              });
            } else {
              Swal.fire("Error", data.messages?.error, "error");
            }
          })
          .catch((error) => {
            console.log(error);
            Swal.fire("Error", "Terjadi kesalahan!", "error");
          })
          .finally(() => {
            $.cardProgressDismiss(cardTarget);
          });
      }
    });
  });
});
