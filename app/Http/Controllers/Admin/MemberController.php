<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Members;
use App\Models\User;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $members = Members::where('status', '!=', 'deleted')->paginate(10);

        return view('admin.members.index', compact('members'));
    }

    // Show the form for creating a new member
    public function create()
    {
        return view('admin.members.create');
    }

    // Store a newly created member in the database
    public function store(Request $request)
    {
        // Validation rules (customize as needed)
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8', // Add password validation rules
            // Add more validation rules for member attributes
        ]);

        // Create a new user
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->roles()->attach(2);

        // Create a new member associated with the user
        $member = new Members([
            'user_id' => $user->id,
            'name' => $validatedData['name'],
            'status' => 'active', // Assuming a default status of 'active'
            // Add other Members attributes here
        ]);
        $member->save();

        // Redirect to the member listing page with a success message
        return redirect()->route('admin.members.index')->with('success', 'Member created successfully.');
    }

    // Show the details of a specific member
    public function show($id)
    {
        $member = Members::findOrFail($id);

        return view('admin.members.member-details', compact('member'));
    }

// Show the form for editing an existing member
    public function edit(Request $request, $id)
    {
        // Check if $id is not a number
        if (!is_numeric($id)) {
            return redirect()->back()->with('error', 'Invalid member ID.');
        }

        $member = Members::find($id);

        // Check if the member with the given ID was not found
        if (!$member) {
            return redirect()->back()->with('error', 'Member not found.');
        }

        return view('admin.members.edit', compact('member'));
    }


    // Update the specified member in the database
    public function update(Request $request, $id)
    {
        // Validation rules (customize as needed)
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6', // Validate the password if provided
        ]);

        $member = Members::findOrFail($id);

        // Check if the email is different
        if ($member->user->email !== $validatedData['email']) {
            // Update the email in the users table
            $request->validate([
                'email' => 'unique:users,email', // Validate uniqueness only if the email has changed
            ]);
            $member->user->email = $validatedData['email'];
            $member->user->save();
        }

        // Update other member attributes
        $member->name = $validatedData['name'];

        // Update the password if provided
        if (isset($validatedData['password'])) {
            $member->user->password = Hash::make($validatedData['password']);
            $member->user->save();
        }

        $member->save();

        // Redirect to the member listing page with a success message
        return redirect()->route('admin.members.index')->with('status', 'Member updated successfully.');
    }



    // Remove the specified member from the database
    public function destroy($id)
    {
        $member = Members::findOrFail($id);
        $member->status = 'deleted'; // Set the status to 'deleted'
        $member->save();

        // Redirect to the member listing page with a success message
        return redirect()->route('admin.members.index')->with('success', 'Member marked as deleted successfully.');
    }
}
