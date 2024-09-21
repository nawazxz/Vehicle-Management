<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Expense Form -->
            <div class="col-12 col-md-6 mb-4">
                <div class="card">
                    <h5 class="card-header">Add Expense</h5>
                    <div class="card-body">
                        <form action="{{ route('expenses.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="expense_name" class="form-label">Expense Name</label>
                                <input type="text" class="form-control" id="expense_name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="expense_amount" class="form-label">Amount</label>
                                <input type="number" step="0.01" class="form-control" id="expense_amount" name="amount" required>
                            </div>
                            <div class="mb-3">
                                <label for="expense_date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="expense_date" name="date" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Expense</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Expenses Table -->
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card">
                    <h5 class="card-header">Recent Expenses</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($expenses as $expense)
                                        <tr>
                                            <td>{{ $expense->name }}</td>
                                            <td>{{ $expense->amount }}</td>
                                            <td>{{ $expense->date }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No expenses found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Download Report Button -->
                <div class="col-12 mb-4 mt-2 text-center">
                    <a href="{{ route('report.download') }}" class="btn btn-secondary">Download Report as PDF</a>
                </div>
            </div>
        </div>

        <!-- Back to Dashboard Button -->
       
    </div>

    @push('css')
    <!-- You can include additional CSS here if needed -->
    @endpush

    @push('script')
    <!-- You can include additional scripts here if needed -->
    @endpush
</x-app-layout>
