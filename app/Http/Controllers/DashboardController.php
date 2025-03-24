<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Outcome;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dahsboard';
        $posts = Post::filter(request(['search', 'category', 'author', 'name']))->orderBy('tgl_berangkat', 'DESC')->paginate(10)->withQueryString();
        $users = User::filter(request(['search', 'category', 'author', 'name']))->orderBy('updated_at', 'DESC')->paginate(5)->withQueryString();

        $totalUsers = User::count();
        $totalUser = User::where('role', 'user')->count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalTreasurer = User::where('role', 'treasurer')->count();

        $percentAdmin = ($totalAdmin / $totalUsers) * 100;
        $percentUser = ($totalUser / $totalUsers) * 100;

        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');

        $totalPosts = Post::count();
        $todayPost = Post::whereDate('created_at', $todayDate)->count();
        $thisMonthPost = Post::whereMonth('created_at', $thisMonth)->count();

        $myPosts = Post::where('author_id', auth()->user()->id)->count();

        if ($percentUser < 50) {
            $colorUser = 'pink';
        } elseif ($percentUser < 75) {
            $colorUser = 'red';
        } else {
            $colorUser = 'blue';
        }

        if ($percentAdmin < 50) {
            $colorAdmin = 'pink';
        } elseif ($percentAdmin < 75) {
            $colorAdmin = 'red';
        } else {
            $colorAdmin = 'blue';
        }

        $totalPengeluaran = Outcome::sum('biaya');

        return view(
            'dashboard.index',
            compact('title', 'posts', 'users', 'totalUsers', 'totalUser', 'totalAdmin', 'totalTreasurer', 'percentAdmin', 'percentUser', 'totalPosts', 'thisMonthPost', 'todayPost', 'colorAdmin', 'colorUser', 'totalPengeluaran', 'myPosts'),
        );
    }
}
