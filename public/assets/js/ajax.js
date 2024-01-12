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


function FilterByCategory(id) {
    $.ajax({
        url: "http://localhost/WikiTM/FilterByCategory",
        method: "post",
        data: {
            category: id
        },
        success: function (data) {
            $('#wiki-card').html(data);
        }, 
    });
}

function Filter() {
    var text = $('#searchWiki').val();
    $.ajax({
        url: "http://localhost/WikiTM/FilterByTagTitle",
        method: "post",
        data: {
            search : text
        },
        success: function (data) {
            $('#wiki-card').html(data);
        },
    });
}