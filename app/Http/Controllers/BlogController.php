<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Carbon;


/**
 * Description of BlogController
 *
 * @author root
 */
class BlogController extends Controller {

    //put your code here



    public function index() {
        $blogs = Blog::all();
        $title = "Masela - Learn about investing in Property the right way in Kenya.";
        $blogdata = [];

        foreach ($blogs as $key => $blog) {
            $imagesData = json_decode($blog->blog_img);
            $images = [];
            foreach ($imagesData as $img) {
                array_push($images, "/media/blog/" . $img);
            }
            $once = [
                "blog_id" => $blog->blog_id,
                "title" => $blog->blog_title,
                "url" => "/blog/" . $this->generateUrl($blog->blog_title, $blog->blog_id) . "/",
                "content" => substr($blog->blog_content, 0, 100),
                "img" => $images[0],
            ];


            $blogdata[$blog->category][] = $once;
        }

        return view('blog.index', compact('blogdata', 'title'));
    }

    public function read($blogUri) {
        $explodedUril = explode('-', $blogUri);
        $blog_id = end($explodedUril);
        $blog = Blog::find($blog_id);
        if (!$blog) {
            return redirect('/blog');
        }
        $imagesData = json_decode($blog->blog_img);
        $images = [];
        foreach ($imagesData as $img) {
            array_push($images, "/media/blog/" . $img);
        }


        $blogdata = [
            "blog_id" => $blog->blog_id,
            "title" => $blog->blog_title,
            "url" => "/blog/" . $this->generateUrl($blog->blog_title, $blog->blog_id) . "/",
            "content" => $blog->blog_content,
            "img" => $images[0],
            "category"=>$blog->category,
            "created"=>Carbon::parse($blog->created)->format('d M, Y'),
        ];
        $title = $blog->blog_title;


        return view('blog.read', compact('blogdata', 'title'));
    }

}
