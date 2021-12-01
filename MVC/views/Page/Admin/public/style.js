// PRODUCTS
function deleteProduct(id) {
  var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
  if(!option) {
    return;
  }
  $.post('./deleteProduct', {
    'id': id,
    'action': 'delete'
  }, function(data) {
    location.reload()
  })
}

// USER
function deleteUser(id) {
  var option = confirm('Bạn có chắc chắn muốn xoá người dùng này không?')
  if(!option) {
    return;
  }
  $.post('./deleteUser', {
    'id': id,
    'action': 'delete'
  }, function(data) {
    location.reload()
  })
}



// CATEGORY
function deleteCategory(id) {
  var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
  if(!option) {
    return;
  }
  $.post('./deleteCategory', {
    'id': id,
    'action': 'delete'
  }, function(data) {
    location.reload()
  })
}

const ctx = document.getElementById("myChartLine").getContext("2d");
      const myChartLine = new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
          datasets: [
            {
              label: "# of Votes",
              data: [1, 19, 3, 5, 12, 9],
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
              ],
              borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
              ],
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      // chart 2
      const ctx2 = document.getElementById("myChartLine2").getContext("2d");
      const myChartLine2 = new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
          datasets: [
            {
              label: "# of Votes",
              data: [8, 19, 3, 5, 2, 3],
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
              ],
              borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
              ],
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      function sortbyAZ(a, b) {
        return $(a).text() > $(b).text() ? 1 : -1;
      }
      function sortbyZA(a, b) {
        return $(a).text() < $(b).text() ? 1 : -1;
      }
  
      $(document).ready(function () {
        // Lọc theo A-Z Z-A
        $("#mySelect").on("change", function () {
          var value = $(this).val();
          if (value == "Theo A-Z") {
            $(".sortby li").sort(sortbyAZ).appendTo(".sortby");
          } else if (value == "Theo Z-A") {
            $(".sortby li").sort(sortbyZA).appendTo(".sortby");
          }
        });
  
        // Tìm kiếm
        $("#searchCategory").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $("#tableCategory tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
          });
        });
      });

      $(document).ready(function () {
        //   Search ptoducts
        $("#searchProduct").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $("#tableProduct tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
          });
        });
      });