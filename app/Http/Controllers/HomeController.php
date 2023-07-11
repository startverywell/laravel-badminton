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
}

?>
