<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Check-In Form -->
            <div class="mb-4 col-lg-6">
                <div class="card">
                    <h5 class="card-header">Vehicle Check-In</h5>
                    <div class="card-body">
                        <form action="{{ route('checkin.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="vehicle_name_checkin" class="form-label">Vehicle Name</label>
                                <input type="text" class="form-control" id="vehicle_name_checkin" name="vehicle_name" value="Revo Champ 2021" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="checkin_time" class="form-label">Check-In Time</label>
                                <input type="datetime-local" class="form-control" id="checkin_time" name="checkin_time" required>
                            </div>
                            <div class="mb-3">
                                <label for="checkin_mileage" class="form-label">Mileage at Check-In (km)</label>
                                <input type="number" step="0.01" class="form-control" id="checkin_mileage" name="mileage" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Check In</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Check-Out Form -->
            <div class="mb-4 col-lg-6">
                <div class="card">
                    <h5 class="card-header">Vehicle Check-Out</h5>
                    <div class="card-body">
                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="vehicle_name_checkout" class="form-label">Vehicle Name</label>
                                <input type="text" class="form-control" id="vehicle_name_checkout" name="vehicle_name" value="Revo Champ 2021" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="checkout_time" class="form-label">Check-Out Time</label>
                                <input type="datetime-local" class="form-control" id="checkout_time" name="checkout_time" required>
                            </div>
                            <div class="mb-3">
                                <label for="checkout_mileage" class="form-label">Mileage at Check-Out (km)</label>
                                <input type="number" step="0.01" class="form-control" id="checkout_mileage" name="checkout_mileage" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Check Out</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Average Mileage -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <h5 class="card-header">Average Mileage</h5>
                    <div class="card-body">
                        <p>The average mileage for the vehicle is: {{ number_format($averageMileage, 2) }} km</p>
                    </div>
                </div>
            </div>

            <!-- Recent Check-Ins -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <h5 class="card-header">Recent Check-Ins</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Vehicle Name</th>
                                    <th>Check-In Time</th>
                                    <th>Check-In Mileage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($checkins as $checkin)
                                    <tr>
                                        <td>{{ $checkin->vehicle_name }}</td>
                                        <td>{{ $checkin->checkin_time }}</td>
                                        <td>{{ $checkin->mileage }} km</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Check-Outs -->
                <div class="card mb-4">
                    <h5 class="card-header">Recent Check-Outs</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Vehicle Name</th>
                                    <th>Check-Out Time</th>
                                    <th>Check-Out Mileage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($checkouts as $checkout)
                                    <tr>
                                        <td>{{ $checkout->vehicle_name }}</td>
                                        <td>{{ $checkout->checkout_time }}</td>
                                        <td>{{ $checkout->checkout_mileage }} km</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Download Report Button -->
                <div class="mb-4">
                    <a href="{{ route('report.download') }}" class="btn btn-secondary">Download Report as PDF</a>
                </div>
            </div>
        </div>
    </div>

    @push('css')
    @endpush
    @push('script')
    @endpush
</x-app-layout>
