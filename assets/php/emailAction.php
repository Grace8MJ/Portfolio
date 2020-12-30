<?php
 function send_htmlmail($fromEmail, $fromName, $toEmail, $toName, $subject, $message){

  $charset='utf-8';
  $body = iconv('utf-8', 'euc-kr', $message);
  $encoded_subject="=?".$charset."?B?".base64_encode($subject)."?=\n"; // encoded subject
  $to= "\"=?".$charset."?B?".base64_encode($toName)."?=\" <".$toEmail.">" ; // encoded to
  $from= "\"=?".$charset."?B?".base64_encode($fromName)."?=\" <".$fromEmail.">" ; // encoded from

  $headers="MIME-Version: 1.0\n".
  "Content-Type: text/html; charset=euc-kr; format=flowed\n".
  "To: ". $to ."\n".
  "From: ".$from."\n".
  "Return-Path: ".$from."\n".
  "urn:content-classes:message\n".
  "Content-Transfer-Encoding: 8bit\n"; // setting header

  //send the email
  $mail_sent = @mail( $to, $encoded_subject, $body, $headers );
  //if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"

  return $mail_sent;
 }

 $fromEmail = $_POST['fromEmail'];
 $fromName = $_POST['fromName'];
 $toEmail = "ejlove927@naver.com";
 $toName = "Minji Choi";
 $subject = "[Portfolio에서 보내진 메일]".date("Y-m-d H:i:s", time());
 $message = $_POST['message'];
 $result = send_htmlmail($fromEmail, $fromName, $toEmail, $toName, $subject, $message);

 echo $result;
?>