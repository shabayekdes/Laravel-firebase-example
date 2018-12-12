<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Messaging\CloudMessage;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class FirebaseController extends Controller
{

    /**
     * Read Realtime Database from Firebase.
     */
    public function index(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://shabayek-des.firebaseio.com/')
            ->create();   
            
        $database = $firebase->getdatabase();   

        // $newPost = $database->getReference('blog/posts')
        //                     ->push([
        //                             'title' => 'Post title',
        //                             'body' => 'This should probably be longer.'
        //                         ]);

        $reference = $database->getReference('blog/posts');
        $snapshot = $reference->getSnapshot();

        dd($snapshot->getValue());                  

            //$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
            //$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
            //$newPost->getChild('title')->set('Changed post title');
            //$newPost->getValue(); // Fetches the data from the realtime database
            //$newPost->remove();
    }
    /**
     *  Send Scm to Firebase.
     */
    public function notifySingle(){

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
  
        $notificationBuilder = new PayloadNotificationBuilder('Adwitter');
        $notificationBuilder->setBody('Welcome to adwitter please update!!')
                            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData([
            'title' => 'Adwitter',
            'body' => 'Welcome to adwitter please update!!']);
 
        
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        // $deviceToken
        $token = "dE1CGUQ5O4w:APA91bGY7-l7oyOLJyFl2c9gY-iIaq9CGSPm2-DnRUZwBxLondFRZgJg0ScALmEi4vZPUbiVtmQ-GttMq44SaDVBvDjeWVdN84Am7BnINsQHv-M-voPcC0uVI4palREIv_GS7kyIOByT";
        
        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
        
        // $downstreamResponse->numberSuccess();
        // $downstreamResponse->numberFailure();
        dd($downstreamResponse->numberModification());
        
        // //return Array - you must remove all this tokens in your database
        // $downstreamResponse->tokensToDelete();
        
        // //return Array (key : oldToken, value : new token - you must change the token in your database )
        // $downstreamResponse->tokensToModify();
        
        // //return Array - you should try to resend the message to the tokens in the array
        // $downstreamResponse->tokensToRetry();

        // $message = CloudMessage::withTarget('token', $deviceToken);
        // $messaging->send($message);
        // $result = $messaging->send($message);
        // dd($result);

    }

}
