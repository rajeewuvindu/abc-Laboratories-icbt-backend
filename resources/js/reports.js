$(document).ready(function () {
    $('#user_id').on('change',  function () {        
        var url = '/technician/fetch-user-appointments/' + $(this).val();
        axios.get(url).then((response) => {
            $('#appointment_id').empty();
            $.each(response.data, function (index, value) {
                $('#appointment_id').append('<option value="' + value.id + '">' + value.appointment_id + ' ('+ value.test_type +') </option>');
                // $('#appointment_id').show();
            });
        });
    })

});