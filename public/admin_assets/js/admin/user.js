$(document).ready(function(){
    $("#allUsers").click(showUsers);

})

function showUsers(){
    const data = getDataUsers();
    let html = `<table class="table table-hover">
                        <!--Table head-->
                        <thead class="mdb-color darken-3">
                            <tr class="text-white">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Edit password</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                        `
    for(let user of data){
        html += `<tr>
                                <td>${user.first_name}</td>
                                <td>${user.last_name}</td>
                                <td>${user.email}</td>
                                <td>${user.role.name}</td>
                                <td><a class="editPassword admin-btn" href="#" data-id="${user.id}">Edit</a></td>

                            </tr>`;
    }
    html += `</tbody>
        <!--Table body-->
    </table>`;

    $("#content").html(html);

    $(".editPassword").click(showEditPassword);
}

function getDataUsers(){
    let users;
    $.ajax({
        url: "/users",
        success: function(data) {
            users = data
        },
        error: function(err) {
            console.error(err);
        }
    })
    return users
}

function showEditPassword(){
    const id = $(this).data('id');

    let html = `
        <div class="form-group mb-4">
            <label>New Password</label>
            <input id="newPassword" type="text" class="form-control" placeholder="Enter new password"/>
        </div>
             <a class="admin-btn changePassword" href="#">Submit password</a>
    `
    $("#content").html(html);

    $(".changePassword").click(function (){
        changePassword(id)
    })
}

function changePassword(id){
    const password = $("#newPassword").val();

    $.ajax({
        url: `/users/${id}`,
        data: {
            password,
            token
        },
        method: "PUT",
        success: function(data){
            alert(data);
            showUsers();
        },
        error: function(err){
            alert(err.responseJSON.message);
        }
    })
}
