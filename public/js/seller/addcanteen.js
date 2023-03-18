$(document).ready(function () {
  $("#formAddCanteen").submit(function (e) {
    e.preventDefault();

    const cardTarget = "#addCanteen";
    $.cardProgress(cardTarget, {
      dismiss: false,
    });
    const formData = new FormData();
    $(
      cardTarget +
        " input," +
        cardTarget +
        " textarea," +
        cardTarget +
        " select"
    ).each(function () {
      if ($(this).prop("type") == "file") {
        formData.append($(this).prop("name"), $(this)[0].files[0]);
      } else {
        formData.append($(this).prop("name"), $(this).val());
      }
    });
    reqData(baseURL + "canteen/menu", {
      method: "POST",
      data: formData,
    })
      .then((result) => {
        responseResult(result);
      })
      .catch((error) => {
        console.log(error);
      })
      .finally(() => {
        $.cardProgressDismiss(cardTarget);
      });
  });

  $("input[id^=menuPoster]").change(function () {
    console.log($(this));
    const posterId = $(this)
      .prop("id")
      .replace(/menuPoster/g, "");
    previewImage($(this)[0].files, "#previewMenuPoster" + posterId);
  });

  $("#menuType").select2({
    placeholder: "Pilih Tipe Menu",
    tags: true,
    ajax: {
      delay: 250,
      url: baseURL + "canteen/menu/type",
      data: function (params) {
        var query = {
          search: params.q,
        };
        return query;
      },
      processResults: function (data) {
        return {
          results: data.menuType,
        };
      },
    },
  });

  $("#menuCategories").select2({
    placeholder: "Pilih Tipe Menu",
    tags: true,
    ajax: {
      delay: 250,
      url: baseURL + "canteen/menu/categories",
      data: function (params) {
        var query = {
          search: params.q,
        };
        return query;
      },
      processResults: function (data) {
        return {
          results: data.menuCategories,
        };
      },
    },
  });
});
