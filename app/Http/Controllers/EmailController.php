<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EmailRepositoryInterface;

class EmailController extends Controller {

    /**
     * The email repository instance.
     *
     * @var \App\Repositories\EmailRepositoryInterface
     */
    protected $emailRepository;

     /**
     * EmailController constructor.
     *
     * @param \App\Repositories\EmailRepositoryInterface $emailRepository
     */
    public function __construct(EmailRepositoryInterface $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    /**
     * Display a listing of the emails.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $emails = $this->emailRepository->all();

        return view('emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new email.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('emails.create');
    }

    /**
     * Store a newly created email.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $this->emailRepository->create($request->all());

        return redirect()->route('emails.index');
    }

    /**
     * Remove the specified email.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->emailRepository->delete($id);

        return response()->json(['success' => 'Email deleted successfully.']);
    }
}
