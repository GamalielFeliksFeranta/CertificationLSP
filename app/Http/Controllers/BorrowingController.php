<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Carbon\Carbon;
class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('member')->get(); 
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $members = Member::all(); 
        $books = Book::whereDoesntHave('borrowings', function($query) {
            $query->whereNull('actual_return_date'); 
        })->get();
        return view('borrowings.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
        ]);

        $return_date = Carbon::parse($request->borrow_date)->addDays(7)->format('Y-m-d');

        Borrowing::create([
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $return_date,
            'actual_return_date' => null,  
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dilakukan.');
    }

    public function edit($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $members = Member::all();
        $books = Book::all();
        return view('borrowings.edit', compact('borrowing', 'members', 'books'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'actual_return_date' => 'nullable|date|after_or_equal:borrow_date',
        ]);

        $borrowing = Borrowing::findOrFail($id);

        $return_date = Carbon::parse($request->borrow_date)->addDays(7)->format('Y-m-d');
        
        $actual_return_date = $request->actual_return_date;

        $borrowing->update([
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $return_date,
            'actual_return_date' => $actual_return_date,
        ]);

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dihapus.');
    }

    public function returnBook($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        if (is_null($borrowing->actual_return_date)) {
            $borrowing->actual_return_date = now();
            $borrowing->save();
            return redirect()->route('borrowings.index')->with('success', 'Buku berhasil dikembalikan!');
        }
        return redirect()->route('borrowings.index')->with('error', 'Buku sudah dikembalikan!');
    }


}
