<?php

namespace App\Http\Controllers\Admin;

use App\GuestLetter;
use App\Http\Traits\Responseable;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AdminGuestLetterController extends Controller
{
    use Responseable;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $letters = GuestLetter::paginate(GuestLetter::PAGINATE_COUNT);

        return view('admin.modules.letters.index', compact('letters'));
    }

    /**
     * @param GuestLetter $letter
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(GuestLetter $letter)
    {
        $letter->delete();

        return $this->redirectSuccess('admin.letters.index');
    }
}
