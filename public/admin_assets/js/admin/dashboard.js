const token = $('meta[name="csrf-token"]').attr('content');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': token
    },
    async: false
});

$(document).ready(function(){
    $("#showDashboard").click(showDashboard);

})


function showDashboard(){
    var date = null;
    $.ajax({
        url: "/activity",
        data:{
            "date":date
        },
        success:function(data){
            var print="<h1>Activity</h1>"
            print+=`<form>
                        <select id="ddlActivity" class="form-control">
                            <option value="null">Choose</option>
                            <option value="-15 minutes">Last 15 minutes</option>
                            <option value="-30 minutes">Last 30 minutes</option>
                            <option value="-1 hour">Last 1 hour</option>
                            <option value="-1 day">Last 24h hours</option>
                        </select>
                    </form><div id="activityTable"></div>`
            $("#content").html(print)
            $("#ddlActivity").change(getByTime)
            printActivity(data)

        },
        error:function(xhr){
            $("#content").html(xhr.responseText)
        }
    })
}

function getByTime(){
    let date = this.value
    $.ajax({
        url: "/activity",
        data:{
            "date" : date
        },
        success:function(data){
            printActivity(data)

        },
        error:function(xhr){
            $("#content").html(xhr.responseText)
        }
    })
}

function printActivity(data){
    let printActivity = ''
    printActivity += `<table class="table table-hover">
                        <thead class="mdb-color darken-3">
                            <tr class="text-white">
                                <th>Ip address</th>
                                <th>Page</th>
                                <th>User</th>
                                <th>Action</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        `
    for(let d of data.log){
        printActivity+=`<tr>
                                    <td>${d.split("\t")[0]}</td>
                                    <td>${d.split("\t")[1]}</td>
                                    <td>${d.split("\t")[3]}</td>
                                    <td>${d.split("\t")[4]}</td>
                                    <td>${d.split("\t")[5]}</td>
                                </tr>`
    }
    printActivity += `</table>`
    $("#activityTable").html(printActivity)
}
