<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense; // Ensure the model is imported
use Alert; // Assuming you're using a package like Laravel Alert

class ExpenseController extends Controller
{
    public function index()
    {
        // Fetch expenses from the database
        $expenses = Expense::all(); // Or you might want to use pagination

        // Return a view with the expenses data
        return view('expenses.index', compact('expenses'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        // Create a new expense instance and assign validated data
        $expense = new Expense();
        $expense->name = $validated['name'];
        $expense->amount = $validated['amount'];
        $expense->date = $validated['date'];

        // Save the expense to the database
        $expense->save();

        // Optional: Use Laravel Alert or similar to provide feedback
        Alert::success('Congrats', 'Expense submitted successfully. Thanks');

        // Redirect back to the previous page
        return back();
    }
}
