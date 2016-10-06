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
    $("#contactPersonNameId").val(supplier.contactPerson);
    $("#supplierEmailId").val(supplier.email);
    $("#telephoneId").val(supplier.telephone);
    $("#faxNumberId").val(supplier.fax);

    $("#add_line_ph1").val(supplier.physical);
    $("#add_line_ph2").val(supplier.physical);
    $("#add_line_ph3").val(supplier.physical);
    $("#add_line_ph4").val(supplier.physical);
    $("#add_line_ph5").val(supplier.physical);

    $("#bankNameId").val(supplier.bank);
    $("#branchNameId").val(supplier.branchN);
    $("#branchCodeId").val(supplier.branchC);
    $("#accountNumberId").val(supplier.accNum);
    $("#referenceId").val(supplier.ref);
    $("#statusId").val(supplier.status);
}