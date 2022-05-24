$(document).ready(function(){
    $("#allMessages").click(showMessages);

})
function getDataMessages(){
    let messages;
    $.ajax({
        url: "/contact",
        success: function(data) {
            messages = data
        },
        error: function(err) {
            console.error(err);
        }
    })
    return messages
}

function showMessages(){
    const data = JSON.parse(getDataMessages());
    let html = `<table class="table table-hover">
                        <!--Table head-->
                        <thead class="mdb-color darken-3">
                            <tr class="text-white">
                                <th>Subject</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>

                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                        `
    for(let message of data){
        html += `<tr>
                                <td>${message.subject}</td>
                                <td>${message.name}</td>
                                <td>${message.email}</td>
                                <td>${message.message}</td>
                                <td><a class="deleteMessage admin-btn" href="#" data-id="${message.id}">Delete</a></td>
                            </tr>`;
    }
    html += `</tbody>
        <!--Table body-->
    </table>`;

    $("#content").html(html);

    $(".deleteMessage").click(deleteMessage);

}

function deleteMessage(){
    const id = $(this).data('id');
    if(window.confirm("Are you sure?")){
        $.ajax({
            url: `/contact/${id}`,
            data: {
                id,
                token
            },
            method: "DELETE",
            success: function(data){
                showMessages();
            },
            error: function(err){
                alert(err.responseJSON.message);
            }
        })
    }
}
