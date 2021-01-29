<?php

namespace App\Http\Controllers;

/**
 * Description of BlogController
 *
 * @author root
 */
class BlogController extends Controller {
    //put your code here
    
    
    
        public function index() {
        return view('blog.index');
    }
}
