var orders;

function getOrderList() {
    var ordList = $('#OrderId').val();

    if (ordList != "-- select current date --") {
        $.ajax({
            url: "monthly_order_rpt.php",
            type: "GET",
            data: {order: ordList},
            success: function (response) {
                console.log(response);
                if (response == false) {
                    alert("No Order List available for " + ordList);
                }
                else {
                    var temp = [];
                    var count = 0;
                    for (var i = 0; i<response.length; i++) {
                        var obj = "";
                        if (response[i]=='[') {
                            i++;
                            while (response[i] != '}') {
                                obj += (response[i]);
                                i++;
                            }
                            obj += response[i++];
                            temp[count] = JSON.parse(obj);
                            obj = "";
                            count++;
                        }
                        if (response[i] == ']') {
                            break;
                        }

                        if (response[i] == '{') {

                            while (response[i] != '}') {
                                obj += (response[i]);
                                i++;
                            }
                            obj += response[i++];
                            temp[count] = JSON.parse(obj);
                            obj = "";
                            count++;
                        }
                    }

                    orders = temp;
                }

                generateTable();
            },
            error: function (error) {
                alert("Error: " + JSON.stringify(error));
            }
        });
    }
}

function generateTable() {
    var newHtml = "<table width=''>" +
        "<colgroup>"+
        "<col width='25%'>"+
        "<col width='25%'>"+
        "<col width='25%'>"+
        "<col width='25%'>"+
        "</colgroup>"+
        "</thread>"+
        "<tr>" +
        "<th>Order Number</th>"+
        "<th>Order Date</th>"+
        "<th>Order Status</th>"+
        "<th>Supplier</th>"+
        "</tr>"
    "</thread>";


    for (var i = 0; i<orders.length; i++) {
        newHtml += "<tr>" +
            "<td>" + orders[i].number+ "</td>" +
            "<td>" + orders[i].order_date + "</td>" +
            "<td>" + orders[i].status + "</td>"  +
            "<td>" + orders[i].supplier + "</td>" +
            "</tr>"
    }

    newHtml += "</table>";
    $("#order").html(newHtml);
}