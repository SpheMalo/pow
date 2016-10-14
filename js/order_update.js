var order;
function getOrderById() {
    var url = window.location.href;
    url = url.split("=");
    var id = url[1];
    var temp = [];
    var count = 0;
  
    $.ajax({
        url: "update_order.php",
        type: "GET",
        data: { idNum: id},
        cache: false,
        success: function (response) {

            for (var i = 0; i<response.length; i++)
            {
                var obj = "";
                if (response[i]=='[')
                {
                    i++;
                    while (response[i] != '}')
                    {
                        obj += (response[i]);
                        i++;
                    }
                    obj += response[i++];
                    temp[count] = obj;
                    obj = "";
                    count++;
                }
                if (response[i] == ']')
                {
                    break;
                }
            }

            order = temp[0];
            populateFields();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function populateFields()
{
    order = JSON.parse(order);
    console.log(order);
    $("#orderNumberId").val(order.number);
    $("#orderDateId").val(order.date);
    $("#orderStatusId").val(order.status);
    $("#supplierNameId").val(order.supplier);
}