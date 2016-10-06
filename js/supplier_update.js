var supplier;
function getSupplierById() {
    var url = window.location.href;
    url = url.split("=");
    var id = url[1];
    var temp = [];
    var count = 0;

    $.ajax({
        url: "update_supplier.php",
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

            supplier = temp[0];
            populateFields();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function populateFields() 
{
    supplier = JSON.parse(supplier);
    $("#supplierNameId").val(supplier.name);
}

function setPracticeLocation() {
    var dentist = $("#dentistSelect").val();

    if (dentist == "Dr J.P. Maponya") {
       $("#optionThembisa").attr('selected','selected');
    }
    else {
        $("#optionBirchAcres").attr('selected','selected');;
    }
}