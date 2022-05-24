$(document).ready(function(){
    $("#allRecipes").click(showRecipes);

})
function getDataRecipes(){
    let recipes;
    $.ajax({
        url: "/recipes",
        success: function(data) {
            recipes = data
        },
        error: function(err) {
            console.error(err);
        }
    })
    return recipes
}

function showRecipes(){
    const data = JSON.parse(getDataRecipes());
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
    for(let recipe of data){
        html += `<tr>
                                <td>${recipe.name}</td>
                                <td><a class="editRecipe admin-btn " href="/recipes/${recipe.id}/edit" data-id="${recipe.id}">Edit</a></td>
                                <td><a class="deleteRecipe admin-btn" href="#" data-id="${recipe.id}">Delete</a></td>
                            </tr>`;
    }
    html += `</tbody>
        <!--Table body-->
    </table>`;

    $("#content").html(html);

    $(".deleteRecipe").click(deleteRecipe);
}

function deleteRecipe(){
    const id = $(this).data('id');
    if(window.confirm("Are you sure?")){
        $.ajax({
            url: `/recipes/${id}`,
            data: {
                id,
                token
            },
            method: "DELETE",
            success: function(data){
                showRecipes();
            },
            error: function(err){
                alert(err.responseJSON.message);
            }
        })
    }

}
