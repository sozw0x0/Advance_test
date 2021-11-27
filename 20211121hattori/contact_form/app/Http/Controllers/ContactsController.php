<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;


class ContactsController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function confirm(ContactRequest $request)
    {

        $inputs = [
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request-> building_name,
            'opinion' => $request->opinion,
            'created_at' => now(),
        ];

        $inputs = $request->all();
        return view('contact.confirm', ['inputs' => $inputs]);
    }

    public function process(Request $request)
    {
        $action = $request->get('action', 'return');
        $input  = $request->except('action');

        $validate_rule = [
            'fullname' => 'required',
        ];

        $this->validate($request, $validate_rule);

        if ($action === 'submit') {

            $contact = new Contact();
            $inputs = $request->all();
            $contact->fill($inputs)->save();

            return redirect()->route('contact.complete');
        }
            else {
            return redirect()->route('contact.index')->withInput($input);
        }

    }

    public function complete()
    {
        return view('contact.complete');
    }

    public function top(Request $request)
    {
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $email = $request->input('email');

        $query = Contact::query();

        if (!empty($gender == 3)) {
            $query->where('gender', 1)->orwhere('gender', 2);
        }else{
            $query->where('gender', $gender);
            }

        if (!empty($fullname)) {
            $query->where('fullname', 'LIKE', '%' . $fullname . '%')->where('gender', $gender);
        }

        if (!empty($request['from']) && !empty($request['until'])) {
            $query->whereBetween('created_at', [$request['from'], $request['until']])->where('gender', $gender);
        }

        if (!empty($email)) {
            $query->where('email','LIKE', '%' . $email . '%')->where('gender', $gender);
        }

        $contacts = $query->paginate(20);

        return view('/contact/admin', compact('contacts','fullname','gender','email'));
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/contact/admin');
    }
}
