<?php namespace Kironuniversity\Subscribe\Components;

use Cms\Classes\ComponentBase;
use Kironuniversity\Subscribe\Models\Subscription;
use Request;
use Input;
use Mail;
use View;
class SubscribeForm extends ComponentBase
{

  public function componentDetails()
  {
    return [
      'name'        => 'SubscribeForm Component',
      'description' => 'No description provided yet...'
    ];
  }

  public function defineProperties()
  {
    return [];
  }

  function onRender(){
    $this->page['confirm'] = false;
    if(Input::has('t')){
      $token = Input::get('t');
      $subscription = Subscription::where('token', $token)->first();
      $this->page['confirm'] = true;
      if(empty($subscription) or empty($token)){
        $this->page['type'] = 'danger';
        $this->page['alert'] = 'Your confirmation token is invalid!';
      }else{
        if($subscription->confirmed == 1){
          $this->page['type'] = 'danger';
          $this->page['alert'] = 'You already confirmed your email!';
        }else{
          $subscription->confirmed = 1;
          $subscription->save();
          $this->page['type'] = 'success';
          $email = $subscription->email;
          $this->page['alert'] = 'Your email was successfully confirmed!';
        }
      }
    }
  }

  function onSubscribe(){
    if (($email = filter_var(post('email'), FILTER_VALIDATE_EMAIL)) === false) {
      $a_errors[] = 'Please enter a valid email!';
    } else {
      $results = Subscription::where('email', 'LIKE', $email)->get();
      if (!$results->isEmpty()) {
        $a_errors[] = 'The entered email is already in the database!';
      }
    }
    if (empty($a_errors)) {
      $token = md5(uniqid($email));
      $params = ['url' => Request::url().'/?t='.$token];
      Mail::send('kironuniversity.subscribe::mail.confirm', $params, function($message) use ($email){
        // Message recipient
        $message->to($email);
      });
      Subscription::Create(['email' => $email, 'token' => $token]);
      $this->page['result'] = ['type' => 'success', 'messages' => ['Thank you for subscribing! To complete your subscription,
      please confirm your email address by clicking on the link in the email we have just sent you.']];
    }else{
      $this->page['result'] = ['type' => 'danger', 'messages' => $a_errors];
    }
  }

}
