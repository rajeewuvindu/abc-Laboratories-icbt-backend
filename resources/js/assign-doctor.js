$(document).ready(function () {
    // console.log('hi');

    $('body').on('click', '.assignDoctor', function () {
        // table.on('click', '.rejectEdit', function() {
            // console.log("HI ")
        var id = $(this).val();
        // alert(adminId);

        $('#assign_appointment_id').val(id);
        // $('#editForm').attr('action', '/reject_admin/'+ adminId)
        $('#assignDoctorModal').modal('show');

    });

    $('body').on('click', '.editAppointment', function () {
        // table.on('click', '.rejectEdit', function() {
            // console.log("HI ")
        var id = $(this).val();
        // alert(adminId);

        $('#edit_appointment_id').val(id);
        // $('#editForm').attr('action', '/reject_admin/'+ adminId)
        $('#editAppointmentModal').modal('show');

    });

});

