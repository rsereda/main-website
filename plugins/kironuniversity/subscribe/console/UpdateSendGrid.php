<?php namespace Kironuniversity\Subscribe\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\ConsoleOutput;
use Kironuniversity\Subscribe\Models\Subscription;

class UpdateSendGrid extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'kironuniversity:updsg';

    /**
     * @var string The console command description.
     */
    protected $description = 'Sents the latest subscriptions to sendgrid';


    protected function getArguments()
    {
        return [
            ['skip', InputArgument::REQUIRED, 'How many subscriptions should be skipped'],
        ];
    }

    /**
     * Execute the console command.
     * @return void
     */
    public function fire()
    {
      //Preapre Client
      $sendgrid_apikey = getenv('SENDGRID_APIKEY');
      $guzzleOption = array(
          'request.options' => array(
              'verify' => true,
              'exceptions' => false
          )
      );
      $guzzleOption['request.options']['headers'] = array('Authorization' => 'Bearer ' . $sendgrid_apikey, 'Content-Type' => 'application/json', 'Accept'=> '*/*');
      $client = new \Guzzle\Http\Client('https://api.sendgrid.com', $guzzleOption);
      $client->setUserAgent('sendgrid/4.0.4;php');
      $skip = $this->argument('skip');
      $subscriptions =  Subscription::where('confirmed', '=', 1)->skip($skip)->take(1000)->lists('email');
      $emails = [];
      foreach($subscriptions as $email){
        $emails[] =  ['email' => $email];
      }
      //$response = $client->get('/v3/contactdb/lists/119096/recipients')->send();
      $response = $client->post('v3/contactdb/recipients', null, json_encode($emails))->send();
      //var_dump($response);


      $response = json_decode($response->getBody());
      echo var_dump($response->persisted_recipients);
      if(is_array($response->persisted_recipients)){
        $response2 = $client->post('v3/contactdb/lists/119096/recipients', null, json_encode($response->persisted_recipients))->send();
        var_dump((string)$response2->getBody());
      }
      //echo 'test';
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

}
