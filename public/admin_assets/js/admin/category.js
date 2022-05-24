$(document).ready(function(){
    $("#allCategories").click(showCategories);
    $("#insertCategory").click(showInsertCategory);


})
function showCategories(){
    const data = JSON.parse(getDataCategories());
    console.log(data)
    let html = `<table class="table table-hover">
                        <!--Table head-->
                        <thead class="mdb-color darken-3">
                            <tr class="text-white">
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                        `
    for(let category of data){
        html += `<tr>
                                <td>${category.name}</td>
                                <td><a class="editCategory admin-btn " href="#" data-id="${category.id}">Edit</a></td>
                                <td><a class="deleteCategory admin-btn" href="#" data-id="${category.id}">Delete</a></td>
                            </tr>`;
    }
    html += `</tbody>
        <!--Table body-->
    </table>`;

    $("#content").html(html);

    $(".editCategory").click(showEditCategory);
    $(".deleteCategory").click(deleteCategory);

}

function getDataCategories(){
    let categories;
    $.ajax({
        url: "/categories",
        success: function(data) {
            categories = data
        },
        error: function(err) {
            console.error(err);
        }
    })
    return categories
}

function showInsertCategory(){
    let html = `
        <div class="form-group mb-4">
            <label>Category name</label>
            <input id="categoryName" type="text" class="form-control" placeholder="Enter category name"/>
        </div>
             <a class="admin-btn insertCategory" href="#">Insert category</a>
    `
    $("#content").html(html);

    $(".insertCategory").click(function (){
        insertCategory()
    })
}

function insertCategory(){
    const name = $("#categoryName").val();

    $.ajax({
        url: `/categories`,
        data: {
            name,
            token
        },
        method: "POST",
        success: function(data){
            alert(data);
            showCategories();
        },
        error: function(err){
            alert(err.responseJSON.message);
        }
    })
}

function showEditCategory(){
    const id = $(this).data('id');

    let html = `
        <div class="form-group mb-4">
            <label>Category name</label>
            <input id="newCategoryName" type="text" class="form-control" placeholder="Enter category name"/>
        </div>
             <a class="admin-btn changeCategory" href="#">Edit category name</a>
    `
    $("#content").html(html);

    $(".changeCategory").click(function (){
        changeCategory(id)
    })
}

function changeCategory(id){
    const name = $("#newCategoryName").val();

    $.ajax({
        url: `/categories/${id}`,
        data: {
            name,
            token
        },
        method: "PUT",
        success: function(data){
            alert(data);
            showCategories();
        },
        error: function(err){
            alert(err.responseJSON.message);
        }
    })
}

function deleteCategory(){
    const id = $(this).data('id');
    if(window.confirm("Are you sure?")){
        $.ajax({
            url: `/categories/${id}`,
            data: {
                id,
                token
            },
            method: "DELETE",
            success: function(data){
                showCategories();
            },
            error: function(err){
                alert(err.responseJSON.message);
            }
        })
    }

}
