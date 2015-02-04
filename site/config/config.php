<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'K2-PRO-3534d746563b55976f41699aec0faab2');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/
c::set('debug', true);

c::set('routes', array(
    array(
        'pattern' => 'api',
        'action'  => function() {
            header('Content-type: application/json; charset=utf-8');
            $per_page = 100;
            $page = site()->children();
            $data = $page->children()->visible()->flip()->paginate($per_page);

            $count = 0;
            $json = array();
            $posts = array();

            $json['data']  = array();
            $json['pages'] = $data->pagination()->countPages();
            $json['page']  = $data->pagination()->page();
            $json['items'] = $data->pagination()->items();
            $json['per_page'] = $per_page;

            // fetch all tags
            $json['tags'] = $data->visible()->pluck('tags', ',', true);



            $posts = $data;

            foreach($posts as $post) {


                $images = array();

                foreach($post->images() as $image) {
                    $images[] = array(
                        'url'    => $image->url(),
                        'width'  => $image->width(),
                        'height' => $image->height()
                    );
                }


                $feature_url = ($image = $post->image('feature.jpg') ? $image->url() : null ) ;

                if($post->hasPrevVisible()):

                    $prev_feature_url = ($post->prevVisible()->image('feature.jpg') ? $post->prevVisible()->image('feature.jpg')->url() : null );


                    $previous = (object)array(
                        'url' => $post->prevVisible()->url(),
                        'uid' => $post->prevVisible()->uid(),
                        'title' => html($post->prevVisible()->title()),
                        'feature_image' => (string)$prev_feature_url
                    );

                else :
                    $previous = null;
                endif;

                if($post->hasNextVisible()):

                    $next_feature_url = ($post->nextVisible()->image('feature.jpg') ? $post->nextVisible()->image('feature.jpg')->url() : null ) ;

                    $next = (object)array(
                        'url' => $post->nextVisible()->url(),
                        'uid' => $post->nextVisible()->uid(),
                        'title' => html($post->nextVisible()->title()),
                        'feature_image' => (string)$next_feature_url

                    );
                else :
                    $next = null;

                endif;

                // Build Tags Array
                $tagsForPost = $post->pluck('tags', ',', true);;
                $tags = $post->tags();
                $tagsAsArray = explode(",", $tags);
                $tagsAsArray=array_map('trim',$tagsAsArray);


                $json['data'][] = array(
                    'index' => (int)$count,
                    'url'   => (string)$post->url(),
                    'uid'   => (string)$post->uid(),
                    'title' => (string)$post->title(),
                    'year' => (string)$post->year(),
                    'tagsAsArray' => (array)$tagsAsArray,
                    'tags' => (string)$post->tags(),
                    'published'  => (string)$post->published(),
                    'number'  => (string)$post->number(),
                    'subtitle'  => (string)$post->subtitle(),
                    'company'  => (string)$post->company(),
                    'website'  => (string)$post->website(),
                    'text'  => (string)$post->text()->kirbytext(),
                    'summary'  => (string)$post->summary()->kirbytext(),
                    'parent'    => (string)$post->parent()->uid(),
                    'feature_image' => (string)$feature_url,
                    'images'=> (array)$images,
                    'previous' => $previous,
                    'next' => $next
                );

                $count++;

            }

            return response::json($json);

        }

    )
));
