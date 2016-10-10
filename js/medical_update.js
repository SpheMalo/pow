var medical;
function getMedicalById() {
    var url = window.location.href;
    url = url.split("=");
    var id = url[1];
    var temp = [];
    var count = 0;

    $.ajax({
        url: "update_medical.php",
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

            medical = temp[0];
            populateFields();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function populateFields() 
{
    medical = JSON.parse(medical);
      console.log(medical);
    $("#nameId").val(medical.name);
    $("#telId").val(medical.tell);
    $("#emailId").val(medical.email);
    $("#faxId").val(medical.fax);

    medical.postal =  medical.postal.split("_");
    $("#add_line_po1").val(medical.postal[0]);
    $("#add_line_po2").val(medical.postal[1]);
    $("#add_line_po3").val(medical.postal[2]);
    var city = "#"+medical.postal[3]+"Postal";
    $(city).attr("selected", "selected");
    $("#add_line_po5").val(medical.postal[4]);

    medical.physical =  medical.physical.split("_");
    $("#add_line_ph1").val(medical.physical[0]);
    $("#add_line_ph2").val(medical.physical[1]);
    $("#add_line_ph3").val(medical.physical[2]);
    var city = "#"+medical.physical[3];
    $(city).attr("selected", "selected");
    $("#add_line_ph5").val(medical.physical[4]);

    $("#type1").val(medical.description);   
}