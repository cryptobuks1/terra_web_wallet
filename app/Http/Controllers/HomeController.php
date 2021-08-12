<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteNotification;
use App\Models\Core\Invitations;

class HomeController extends Controller
{
    public function getInvited(Request $request)
    {
        $invite_code = Str::random();

        $invited = Invitations::updateOrCreate(
            ['email'=>$request->email_address],
            ['invite_code'=>$invite_code]
        );
        if($invited){

            $emailcontent = ['invite_code' => $invite_code];

            Mail::to($request->email_address)->send(new InviteNotification($emailcontent));

            return redirect()->back()->with('success', "Successfully Sent Invitation Code");

        }else{
            return redirect()->back()->with('error', "Failed to Sent Invitation Code");
        }

    }

    public function sitemaps()
    {
        return response()->view('sitemaps')
            ->header('Content-Type', 'text/xml');

    }
}
