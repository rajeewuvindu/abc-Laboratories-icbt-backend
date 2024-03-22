<div class="modal fade" id="assignDoctorModal" tabindex="-1" aria-labelledby="assignDoctorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignDoctorLabel">Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('technician.assign_doctor') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="appointment_id" id="appointment_id">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Select Doctor</label>
                            <select class="form-select" name="doctor_id" id="doctor_id" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach($doctors as $doctor)
                                <option value="{{$doctor->id}}">
                                    {{$doctor->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 row mt-5 mb-5">
                        <div class="col-6">
                            <input type="date" name="date" id="time" class="form-control col-12" required>
                        </div>
                        <div class="col-6">
                            <input type="time" name="time" id="time" class="form-control col-12" required>
                        </div>
                    </div>
                    <div class="col-12 mt-5 mb-5">
                        <input class="form-control" type="text" name="price" id="price" placeholder="Price" required>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Assign Doctor">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>