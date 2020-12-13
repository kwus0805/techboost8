<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Carbon\Carbon;
use App\Models\ProfileHistory;

class ProfileController extends Controller
{
    //以下を追記
    public function add() {
      return view('admin.profile.create');
    }

    public function create(Request $request)
    {
      $this->validate($request, Profile::$rules);

      $news = new Profile;
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $news->fill($form);
      $news->save();


      return redirect ('admin/profile/create');
    }

    public function index(Request $request)
      {
          $cond_name = $request->cond_name;
          if ($cond_name != '') {
              $posts = Profile::where('title', $cond_name)->get();
          } else {
              $posts = Profile::all();
          }
          return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
      }

    public function edit(Request $request)
    {
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);
      }
      return view('admin.profile.edit',['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
      $this->validate($request, Profile::$rules);
      $profile = Profile::find($request->id);
      $profile_form = $request->all();

        unset($profile_form['_token']);
        unset($profile_form['remove']);

        $profile->fill($profile_form)->save();

        $history = new ProfileHistory;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();




        return redirect('admin/profile/');
    }



}
