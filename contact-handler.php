<?php
// PHP mail availability depends on your host configuration. Update these settings before publishing.
$recipient_email = 'replace@example.com';
$website_name = 'Website Development and AI Agency';
$success_page = 'contact.html?status=success';
$error_page = 'contact.html?status=error';
ini_set('display_errors', '0');
function go($url){ header('Location: '.$url, true, 303); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { go($error_page); }
if (!empty($_POST['company_website'])) { go($success_page); }
$fields=['first_name'=>80,'last_name'=>80,'business_name'=>120,'email'=>160,'phone'=>40,'website'=>200,'service'=>80,'project_type'=>80,'ai_feature'=>100,'budget'=>80,'timeframe'=>80,'contact_method'=>20,'description'=>3000];
$data=[]; foreach($fields as $key=>$max){ $value=trim((string)($_POST[$key]??'')); if(strlen($value)>$max || preg_match('/[\r\n]/',$value) && in_array($key,['email','first_name','last_name'],true)){go($error_page);} $data[$key]=filter_var($value,FILTER_SANITIZE_SPECIAL_CHARS); }
$allowed=['New Website','Website Redesign','Landing Page','Ecommerce Website','AI Chatbot','AI Lead Qualification','Website Automation','Website Maintenance','Other'];
if($data['first_name']===''||$data['last_name']===''||$data['description']===''||!filter_var($data['email'],FILTER_VALIDATE_EMAIL)||!in_array($data['service'],$allowed,true)||empty($_POST['consent'])) go($error_page);
$lines=["New consultation request for $website_name"]; foreach($data as $k=>$v){$lines[]=ucwords(str_replace('_',' ',$k)).': '.$v;} $subject='Consultation request - '.$data['first_name'].' '.$data['last_name']; $headers="From: $website_name <no-reply@".($_SERVER['HTTP_HOST']??'example.com').">\r\nReply-To: ".$data['email']."\r\nContent-Type: text/plain; charset=UTF-8";
@mail($recipient_email,$subject,implode("\n",$lines),$headers); go($success_page);
