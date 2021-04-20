<?php

namespace Drupal\spe_demo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Mail handler to send out an email message array to the Salesforce Marketing Cloud API.
 */
class CustomMarketingMailController extends ControllerBase {

  public function myEmail() {
    $from = 'cesar_saavedra@spe.sony.com';
    $from_name = 'cesar_saavedra@spe.sony.com';
    $subject = 'SPE demo ' . date('Ymd H:i:s');
    $body_html = '<h1>Message from Drupal lando git</h1><p>'. date('Ymd H:i:s').'</p>';
    $to = 'cesar_saavedra@spe.sony.com';
    $cc = 'issac_sierra@spe.sony.com';
    $bcc = 'sumeet_biswal@spe.sony.com';

    $marketingcloudMessage['from']['address'] = $from;
    $marketingcloudMessage['from']['name'] = $from_name;
    $marketingcloudMessage['to'] = $to;
    $marketingcloudMessage['body'] = $body_html;
    $marketingcloudMessage['subject'] = $subject;
    $marketingcloudMessage['cc'] = 'cesar.saavedra.spe@gmail.com';
    $marketingcloudMessage['bcc'] = '';

    //print_r($marketingcloudMessage);
    //$response = \Drupal::service('marketing_cloud_emails.mail_handler')->sendMail($marketingcloudMessage);
    $response = \Drupal::service('spe_sfmc_emails.mail_handler')->sendMail($marketingcloudMessage);

    /*
     * $triggeredSendDefinitionId
     *
     * key:drupalmailtriggeredsend
     * key:drupalmailtriggeredsenddataextension
     * key:drupalmailtriggeredemailcontent
     *
     */

    return [
      '#prefix' => '<pre>',
      '#suffix' => '</pre>',
      '#markup' => 'Message is ' . $response['responses'][0]['messages'][0]
    ];

  }

}
