<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewsletter;
use App\Models\Customer;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;


class NewsletterController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $newsletters = Newsletter::all();
        return view('admin.newsletter.index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsletter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mailsPerJob = env('NUMBER_OF_MAILS_PER_JOB');

        $data = request()->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $data['user_id'] = 1;

        $newsletter = Newsletter::create($data);

        $numberOfJobs = ceil(Customer::count() / $mailsPerJob);
        $batch = Bus::batch([])->dispatch();

        for ($index = 0; $index < $numberOfJobs; $index++) {
            $batch->add(new SendNewsletter($newsletter, $index));
        }

        return redirect()->back()->with(
            'success',
            'استرخ الآن سنعمل بجد لإيصال النشرة لكل مشتركينا'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        return view('admin.newsletter.show', compact('newsletter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        return view('admin.newsletter.edit', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        $data = request()->validate([
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $data['user_id'] = 1;

        $newsletter->update($data);

        return redirect()->back()->with(
            'success',
            '  عُدلت بيانات النشرة بنجاح'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect()->back()->with(
            'success',
            '  حُذفت بيانات النشرة بنجاح'
        );
    }
}
