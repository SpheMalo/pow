var stocked;

function getGoodsReceiving() {
    var date = $('#goodsRecId').val();

    if (date != "-- select current date --") {
        $.ajax({
            url: "goods_receiving_note.php",
            type: "GET",
            data: {stockWeek: date},
            success: function (response) {
                if (response == false) {
                    alert("No orders to be received according to the system");
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

                    stocked = temp;
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
    var newHtml = "<table width='100%'>" +
        "<colgroup>"+
        "<col width='15%'>"+
        "<col width='12%'>"+
        "<col width='15%'>"+
        "<col width='15%'>"+
        "<col width='10%'>"+
        "<col width='8%'>"+
        "<col width='8%'>"+
        "</colgroup>"+
        "</thread>"+
        "<tr>" +
        "<th>Product No</th>"+
        "<th>Product Name</th>"+
        "<th>Product Description</th>"+
        "<th>Product Type</th>"+
        "<th>Product Size</th>"+
        "<th>Quanity Ordered</th>"+
        "<th>Quanity Received</th>"+
        "</tr>"
    "</thread>";


    for (var i = 0; i<stocked.length; i++) {
        newHtml += "<tr>" +
            "<td>" + stocked[i].prodNo + "</td>" +
            "<td>" + stocked[i].prodName + "</td>" +
            "<td>" + stocked[i].prodDesc + "</td>"  +
            "<td>" + stocked[i].prodType + "</td>" +
            "<td>" + stocked[i].size + "</td>" +
            "<td>" + stocked[i].prodQty + "</td>" +
            "<td>" + " " + "</td>" +
            "</tr>"
    }

    newHtml += "</table>";
    $("#receive").html(newHtml);
}