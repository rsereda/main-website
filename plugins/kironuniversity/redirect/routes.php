<?php

Route::any('world/{path?}', function($path = null){
  return Redirect::to('/about', 301);
})->where(['path' => '.*']);

Route::any('jobs', function(){
  return Redirect::to('/for-individuals/jobs', 301);
});

Route::any('study/tracks', function(){
  return Redirect::to('/for-students/what-are-my-study-options', 301);
});

Route::any('/study/student-services', function(){
  return Redirect::to('/for-students/how-can-we-help-your-studies', 301);
});

$keepStudy = ['apply-admission'];
Route::any('study/{path?}', function($path = null) use ($keepStudy){
  if(in_array($path,$keepStudy)){
    return Redirect::to('/for-students/'.$path, 301);
  }
  return Redirect::to('/for-students', 301);
})->where(['path' => '.*']);

$redirectSupport = [
'individuals' => 'for-individuals',
'corporate' =>	'/for-organisations/corporate-engagement',
'foundation' =>	'/for-organisations/support-us-as-a-founda;tion',
'academic-institutions' =>	'/for-academic-institutions/academic;-institutions',
'supporters' =>	'/for-individuals/our-supporters',
'ngo-and-non-profits' =>	'/for-organisations/supp;ort-us-as-an-ngo-or-non-profit',
'friends' =>	'/for-organisations/support-us-as-a-friend',
];

Route::any('support/{path?}', function($path = null) use ($redirectSupport){
  if(array_key_exists($path,$redirectSupport)){
    return Redirect::to('/'.$redirectSupport[$path], 301);
  }
  return Redirect::to('/', 301);
})->where(['path' => '.*']);


 ?>
