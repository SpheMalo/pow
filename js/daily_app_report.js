function getDrSchedule() {
    var doctor = $('#DrSelect').val();
    $.ajax({
        url: "daily_app_report.php",
        type: "GET",
        data: { doctorName: doctor, option: "get" },
        cache: false,
        success: function (response) {
            alert(response);
        },
        error: function (error) {
            console.log(error);
        }
    });
}