var bookings;

function getDrSchedule() {
    var doctor = $('#DrSelect').val();

    if (doctor != "-- Select Dentist --") {
        $.ajax({
            url: "daily_app_report.php",
            type: "GET",
            data: {doctorName: doctor},
            success: function (response) {
                if (response == false) {
                    alert("No consultations available for " + doctor);
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

                    bookings = temp;
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
        "<col width='10%'>"+
        "<col width='10%'>"+
        "<col width='10%'>"+
        "<col width='30%'>"+
        "<col width='30%'>"+
        "<col width='10%'>"+
        "</colgroup>"+
        "</thread>"+
        "<tr>" +
        "<th>Schedule Date</th>"+
        "<th>Start Time</th>"+
        "<th>End Time</th>"+
        "<th>Employee Name</th>"+
        "<th>Patient Name</th>"+
        "<th>Booking Description</th>"+
        "</tr>"
        "</thread>";


    for (var i = 0; i<bookings.length; i++) {
        newHtml += "<tr>" +
            "<td>" + bookings[i].appointment_date.substring(0, 10) + "</td>" +
            "<td>" + bookings[i].appointment_time + "</td>" +
            "<td>" + bookings[i].appointment_time.substring(0, 3) + "45" + "</td>" +
            "<td>" + bookings[i].empl_name + " " + bookings[i].empl_surname + "</td>"  +
            "<td>" + bookings[i].patient_name + "</td>" +
            "<td>" + bookings[i].booking_type + "</td>" +
                "</tr>"
    }

    newHtml += "</table>";
    $("#Sphe").html(newHtml);
}