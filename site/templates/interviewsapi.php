<?php
//if(!r::is_ajax()) notFound();

header('Content-type: application/json; charset=utf-8');

$data = $pages->find('interviews')->children()->visible()->paginate(10);

$json = array();

$json['data']  = array();
$json['uid']  = (string)$_POST['uid'];
$json['pages'] = $data->pagination()->countPages();
$json['page']  = $data->pagination()->page();



foreach($data as $interview) {
    $images = array();

    foreach($interview->images() as $image) {
        $images[] = array(
            'url'    => $image->url(),
            'width'  => $image->width(),
            'height' => $image->height()
        );
    }

    if($image = $interview->image('feature.jpg')):
        $feature_url = $image->url();
    endif;

    if($interview->hasPrevVisible()):
        $previous = (object)array(
            'url' => $interview->prevVisible()->url(),
            'uid' => $interview->prevVisible()->uid(),
            'title' => html($interview->prevVisible()->title())
        );

    else :
        $previous = null;
    endif;

    if($interview->hasNextVisible()):
        $next = (object)array(
            'url' => $interview->nextVisible()->url(),
            'uid' => $interview->nextVisible()->uid(),
            'title' => html($interview->nextVisible()->title())
        );
    else :
        $next = null;
    endif;

    $json['data'][] = array(
    'url'   => (string)$interview->url(),
    'title' => (string)$interview->title(),
    'published'  => (string)$interview->published(),
    'number'  => (string)$interview->number(),
    'subtitle'  => (string)$interview->subtitle(),
    'company'  => (string)$interview->company(),
    'website'  => (string)$interview->website(),
    'text'  => (string)$interview->text()->kirbytext(),
    'feature_image' => (string)$feature_url,
    'images'=> (array)$images,
    'previous' => $previous,
    'next' => $next
    );

}

echo json_encode($json);

?>
