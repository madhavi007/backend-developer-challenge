<?php

namespace App\Http\Controllers;

use App\UserQuote;
use DB;
use Illuminate\Http\Request;
use Validator;

class QuoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        $user_id = \Auth::id();
        $quotes = UserQuote::where('user_id', \Auth::id())->get();
        return view('pages.all', compact('quotes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'season_number' => 'required|regex:/^[0-9]+$/',
            'episode' => 'required|regex:/^[0-9]+$/',
        ]);

        if ($validator->fails()) {
            \Toastr::error('Error occured during creating quote', 'Error', []);
            return redirect()
                ->route('quote.create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $user_quote = new UserQuote();
            $user_quote->season_number = $request->input('season_number');
            $user_quote->episode = $request->input('episode');
            $user_quote->quote = $request->input('quote');
            $user_quote->user_id = \Auth::id();

            $user_quote->save();

            $random_number = rand();
            $url = 'https://picsum.photos/200/300?random=' . $random_number;
            $image = file_get_contents($url);

            $logo_path = public_path('data/' . '/images/' . $user_quote->id . '/icon/');

            if (!file_exists($logo_path)) {
                \File::makeDirectory($logo_path, 0777, true);
            } else {
                \File::deleteDirectory($logo_path, 0777, true);
                if (!file_exists($logo_path)) {
                    \File::makeDirectory($logo_path, 0777, true);
                }
            }

            $icon_file = 'random.jpg';
            \Image::make($image)->save($logo_path . $icon_file);
            $user_quote->file = $icon_file;
            $user_quote->update();

            DB::commit();
            \Toastr::success('Quote Created successfully', 'Success', []);
        } catch (\Exception $e) {
            DB::rollback();
            \Toastr::error('Error occured during creating quote', 'Error', []);
        }

        return redirect()->route('quote.all');

    }

    public function create()
    {
        return view('pages.create');
    }

    public function edit($id)
    {
        $quote = UserQuote::find($id);
        return view('pages.create', compact('quote', 'id'));

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'season_number' => 'required|regex:/^[0-9]+$/',
            'episode' => 'required|regex:/^[0-9]+$/',
        ]);

        if ($validator->fails()) {
            \Toastr::error('Error occured during editing quote', 'Error', []);
            return redirect()
                ->route('quote.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $user_quote = UserQuote::find($id);
        $user_quote->season_number = $request->input('season_number');
        $user_quote->episode = $request->input('episode');
        $user_quote->quote = $request->input('quote');
        $user_quote->user_id = \Auth::id();
        $random_number = rand();
        $url = 'https://picsum.photos/200/300?random=' . $random_number;
        $image = file_get_contents($url);

        $logo_path = public_path('data/' . '/images/' . $id . '/icon/');

        if (!file_exists($logo_path)) {
            \File::makeDirectory($logo_path, 0777, true);
        } else {
            \File::deleteDirectory($logo_path, 0777, true);
            if (!file_exists($logo_path)) {
                \File::makeDirectory($logo_path, 0777, true);
            }
        }

        $icon_file = 'random.jpg';
        \Image::make($image)->save($logo_path . $icon_file);
        $user_quote->file = $icon_file;
        $user_quote->update();

        \Toastr::success('Quote Updated successfully', 'Success', []);

        return redirect()->route('quote.all');

    }

    public function delete($id)
    {
        $quote = UserQuote::find($id);
        if ($quote && $quote->user_id == \Auth::id()) {
            $quote->delete();
            return ['status' => true, 'message' => 'Quote deleted successfully'];
        }
        return ['status' => false, 'message' => 'Quote Not Found'];
    }
}
