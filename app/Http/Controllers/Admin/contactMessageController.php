<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class contactMessageController extends Controller
{
    public function getContactMessages()
    {
        $contactMessages = ContactMessage::orderBy('id', 'desc')->get();
        return view('admin.contact.contactlist', compact('contactMessages'));
    }

    
    public function deleteContactMessage ($id)
    {
        $message = ContactMessage::find($id);
        $message->delete();

        toastr()->success('Deleted successfully');
        return redirect()->back();
    }
   
}
