var booking;
function getBookingById() {
    var url = window.location.href;
    url = url.split("=");
    var id = url[1];
    var temp = [];
    var count = 0;

    $.ajax({
        url: "update_booking.php",
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

            booking = temp[0];
            populateFields();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function populateFields()
{
    booking = JSON.parse(booking);
    $("#ids").val(booking.pat);
    $("#patientName").val(booking.pat_name);
    $("#patientSurname").val(booking.pat_sur);

    // booking.employee =  booking.employee.split("_");
    // $("#add_line_ph1").val(booking.employee[0]);
    // $("#add_line_ph2").val(booking.employee[1]);

    var loc ="#"+booking.location;
    $(loc).attr("selected", "selected");

    $("#dateID").val(booking.c_date);
    $("#statusId").val(booking.status);
}