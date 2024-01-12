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
              $(`#id${id}`).html(`<button type="button" class="btn btn-success" onclick="Publiced(${id})">Accept</button>`);
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
              $(`#id${id}`).html(`<button type="button" class="btn btn-danger" onclick="archive(${id})">archived</button>`);

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


function getCategory(id) {
    $.ajax({
        url: "http://localhost/WikiTM/getCategory",
        method: "post",
        data: {
            id: id
        },
        success: function (data) {
            $('#categoryName').val(data);
            $('#categoryid').val(id);
        }
    });
}

function getTag(id) {
    $.ajax({
        url: "http://localhost/WikiTM/getTag",
        method: "post",
        data: {
            id: id
        },
        success: function (data) {
            $('#TagName').val(data);
            $('#Tagid').val(id);
        }
    });
}