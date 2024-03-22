<div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-labelledby="editAppointmentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAppointmentLabel">Change Appointment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('technician.assign_doctor') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="appointment_id" id="edit_appointment_id">

                    @if($appointments->count() == 0)
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
                    @else

                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Select Doctor</label>
                            <select class="form-select" name="doctor_id" id="doctor_id" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach($doctors as $doctor)
                                @if($doctor->id == $appointment->doctor_id)
                                <option value="{{$doctor->id}}" selected>
                                    {{$doctor->name}}
                                </option>
                                @else
                                <option value="{{$doctor->id}}">
                                    {{$doctor->name}}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class="col-12 row mt-5 mb-5">
                        <div class="col-6">
                            @if($appointments->count() == 0)
                            <input type="date" name="date" id="time" class="form-control col-12" required>
                            @else
                            <input type="date" name="date" id="time" value="{{ $appointment->date }}" class="form-control col-12" required>
                            @endif
                        </div>
                        <div class="col-6">
                            @if($appointments->count() == 0)
                            <input type="time" name="time" id="time" class="form-control col-12">
                            @else
                            <input type="time" name="time" id="time" value="{{ $appointment->time }}" class="form-control col-12" required>
                            @endif

                        </div>
                    </div>

                    <div class="col-12 mt-5 mb-5">
                        @if($appointments->count() == 0)
                        <input class="form-control" type="text" name="price" id="price" placeholder="Price" required>
                        @else
                        <input class="form-control" type="text" name="price" id="price" placeholder="Price" value="{{ $appointment->price }}" required>
                        @endif
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