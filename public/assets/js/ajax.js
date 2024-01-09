function archive(id) {
    $.ajax({
        url: "http://localhost/WikiTM/archive",
        method: "post",
        data: {
            id: id
        },
        success: function (data) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: data,
                showConfirmButton: false,
                timer: 1500
              });
        },
    });
}
function Publiced(id) {
    $.ajax({
        url: "http://localhost/WikiTM/accept",
        method: "post",
        data: {
            id: id
        },
        success: function (data) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: data,
                showConfirmButton: false,
                timer: 1500
              });
        },
    });
}