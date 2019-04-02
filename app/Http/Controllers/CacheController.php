<?php
 namespace App\Http\Controllers;
 use Illuminate\Support\Facades\Cache;
 class CacheController extends Controller
{
    public function show()
    {
        // the "count" value is set in url "posts/all" we will now fetch that value from cache and return
        $value = Cache::get('count');
        return $value;
    }
}
