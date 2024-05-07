<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class SessionController extends Controller
{
    public function setLogin(Request $request)
    {
        $session = new Session();
        $session->set('access_token', $request->access_token);
        $session->set('name', $request->name);
        $session->set('guid', $request->guid);
        $session->set('role_guid', $request->role_guid);
        $session->set('role_name', $request->role_name);
        $session->set('division_name', $request->division_name);

        return $request->role_guid;
    }

    public function clearSession()
    {
        $session = new Session();
        $session->clear();

        return true;
    }
}
