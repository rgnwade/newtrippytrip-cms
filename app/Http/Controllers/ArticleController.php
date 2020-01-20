<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Filesystem\Filesystem;
use Alert;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function addArticle()
    {
        if (Session::get('arr_login_success')) {
            $client = new \GuzzleHttp\Client();

            //Location1
            $res_location = $client->requestAsync('GET', env('API_CMS_URL').'article/location?parent=102')
            ->then(
                function ($response_location) {
                    return json_decode($response_location->getBody()->getContents());
                }
            );
            $response_location = $res_location->wait();

            //Region
            $res_region = $client->requestAsync('GET', env('API_CMS_URL').'article/region?location_id=1')
            ->then(
                function ($response_region) {
                    return json_decode($response_region->getBody()->getContents());
                }
            );
            $response_region = $res_region->wait();


            //ParentCategory
            $res_parent = $client->requestAsync('GET', env('API_CMS_URL').'article/all-category')
            ->then(
                  function ($response_parent) {
                      return json_decode($response_parent->getBody()->getContents());
                  }
              );
            $response_parent = $res_parent->wait();


            //GetClient
            $res_client = $client->requestAsync('GET', env('API_CMS_URL').'admin/all-client')
            ->then(
                    function ($response_client) {
                        return json_decode($response_client->getBody()->getContents());
                    }
                );
            $response_client = $res_client->wait();

            //ChildCategory
            // $res_parent = $client->request('GET', env('API_CMS_URL').'child-category?parent_id=');
            //
            // $get_parent= json_decode($res_parent->getBody()->getContents());

            //Roles
            // $res_roles = $client->request('GET', env('API_CMS_URL').'admin/roles');
            //
            // $get_roles= json_decode($res_roles->getBody()->getContents());

            //Author
            $res_author = $client->requestAsync('GET', env('API_CMS_URL').'admin/get-author')
              ->then(
                      function ($response_author) {
                          return json_decode($response_author->getBody()->getContents());
                      }
                  );
            $response_author = $res_author->wait();


            // dd($get_all_admin->data[0]->roles);
            return view('pages.article.post-article', array(
                'location' => $response_location->data,
                'region' => $response_region->data,
                'parent' => $response_parent->data,
                'author' => $response_author->data,
                'client' => $response_client->data,
            ));
        } else {
            return redirect()->intended('/');
        }
    }

    public function postArticle(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'thumbnail_pict' => 'required|mimes:jpeg,jpg,png|max:2048'
        ));
        $parent_category_id= $request->input('parent_category_id');
        $category_id       = $request->input('category_id');
        $region_id         = $request->input('region_id');
        $author_id         = $request->input('author_id');
        $client_id         = $request->input('client_id');
        $location_id       = $request->input('location_id');
        $title             = $request->input('title');
        $video             = $request->input('video');
        $content           = $request->input('editor-full');
        $is_homepage       = $request->input('is_homepage');
        $is_page           = $request->input('is_page');
        $thumbnail_pict    = $request->file('thumbnail_pict');
        $description       = $request->input('description');
        $active      = $request->input('active');

        // dd($category_id);


        $client = new Client();

        $res = $client->request('POST', env('API_CMS_URL').'article/post-article', array(
            'multipart' => array(
                array(
                    'name'     => 'parent_category_id',
                    'contents' => $parent_category_id,

                ),
                array(
                    'name'     => 'category_id',
                    'contents' => $category_id,

                ),
                array(
                    'name'     => 'author_id',
                    'contents' => $author_id,
                ),
                array(
                    'name'     => 'client_id',
                    'contents' => $client_id,
                ),
                array(
                    'name'     => 'location_id',
                    'contents' => $location_id,
                ),
                array(
                    'name'     => 'title',
                    'contents' => $title,
                ),
                array(
                    'name'     => 'video',
                    'contents' => $video,
                ),
                array(
                    'name'     => 'content',
                    'contents' => $content,
                ),
                array(
                    'name'     => 'is_homepage',
                    'contents' => $is_homepage,
                ),
                array(
                    'name'     => 'is_page',
                    'contents' => $is_page,
                ),
                array(
                    'name'     => 'active',
                    'contents' => $active,
                ),
                array(
                    'name'     => 'description',
                    'contents' => $description,
                ),
                array(
                    'name'     => 'thumbnail_pict',
                    'contents' => fopen($thumbnail_pict->move(public_path('uploads/thumbnail'), $thumbnail_pict->getClientOriginalName()), 'r'),
                    'filename' => $thumbnail_pict->getClientOriginalName(),
                ),
            )
        ));

        $post_article = json_decode($res->getBody()->getContents());
        if ($post_article->code == 200) {
            $file = new Filesystem;
            $file->delete(public_path('uploads/thumbnail/') . $thumbnail_pict->getClientOriginalName());
            Alert::success('What the hell are you doing here?! Keep working Bitch!', 'Fuck! You Did It Asshole! ')->persistent("Ok");
            return redirect('/add-article');
        } else {
            Alert::error('Oh Snap!', 'You have got wrong!')->persistent("Ok");
            return redirect('/add-article');
        }
    }


    public function getArticleSingle($id)
    {
        if (Session::get('arr_login_success')) {
            $client = new Client();

            $res_article_single = $client->request('GET', env('API_CMS_URL').'article/get-article-by-id/'.$id);

            $get_article_single= json_decode($res_article_single->getBody()->getContents());

            // dd($get_article_single->data[0]->region);

            return view('pages.article.edit-article', array(
                'article' => $get_article_single->data,
                'region' => $get_article_single->data[0]->region,
                'parent' => $get_article_single->data[0]->parent_category,
                'category' => $get_article_single->data[0]->category,
            ));
        } else {
            return redirect()->intended('/');
        }
    }
}
