<?php
/**
 * @description : This is homepage controller.
 * @author :Uranus
 * @created date :2023-07-11 
 * 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;

class HomeController extends Controller
{
    /**
     * @description Top Page
     * @return pages.home.index
     * 
     */
    public function index() {
        $users = User::paginate(10);
        return view('pages.home.index', [
            'users' => $users
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return pages.home.index
     */
    public function search(Request $request) {
        $point = explode(';',$request->point);
        
        if ($point[0] == 0 && $point[1] == 1000) {
            $users = User::where('name','like','%'.$request->name.'%')
                         ->whereIn('level', array_values($request->level ?? []))
                         ->paginate(10);
        } else if ($point[0] == 0) {
            $users = User::where('name','like','%'.$request->name.'%')
                         ->whereIn('level', array_values($request->level ?? []))
                         ->where('point', '<', $point[1])
                         ->paginate(10);
        } elseif ($point[1] == 1000) {
            $users = User::where('name','like','%'.$request->name.'%')
                         ->whereIn('level', array_values($request->level ?? []))
                         ->where('point', '>', $point[0])
                         ->paginate(10);
        } else {
            $users = User::where('name','like','%'.$request->name.'%')
                         ->whereIn('level', array_values($request->level ?? []))
                         ->where('point', '>', $point[0])
                         ->where('point', '<', $point[1])
                         ->paginate(10);
        }
        return view('pages.home.index', [
            'users' => $users
        ]);
    }
}

?>
