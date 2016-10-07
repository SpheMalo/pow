var product;
function getProductById() {
    var url = window.location.href;
    url = url.split("=");
    var id = url[1];
    var temp = [];
    var count = 0;

    $.ajax({
        url: "update_product.php",
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

            product = temp[0];
            populateFields();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function populateFields() 
{
    product = JSON.parse(product);
    $("#pNumberId").val(product.pNumber);
    $("#nameId").val(product.name);
    $("#descId").val(product.desc);
    $("#priceId").val(product.price);
    $("#sizeId").val(product.size);
    $("#criticalId").val(product.critical);

    if(product.fav == 1)
    {
        $("#favoId").attr("checked", "checked");
    }

    $("#quantityId").val(product.quantity);

    product.type = product.type.split("_");
    $("#p_t_nameId").val(product.type[0]);
    $("#p_t_descId").val(product.type[1]);

}