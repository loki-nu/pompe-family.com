<?php
$mail_to = 'pompe_family@yahoo.co.jp';
$client_name = trim($_POST['name']);
$client_email = trim($_POST['email']);
$message = trim($_POST['message']);

$atom       = "[a-zA-Z0-9_!#\$\%&'*+\\/=?\^`{}~|\-]+";
$dot_atom   = "$atom(?:\.$atom)*";
$quoted     = '"(?:\\[^\r\n]|[^\\"])*"';
$local      = "(?:$dot_atom|$quoted)";
$domain_lit = "\[(?:\\\S|[\x21-\x5a\x5e-\x7e])*\]";
$domain     = "(?:$dot_atom|$domain_lit)";
$addr_spec  = $local.'@'.$domain;
if($client_name != '' && preg_match('/^'.$addr_spec.'$/', $client_email) == 1 && $message != ''){
    mail($mail_to, 'Message from a site visitor', $message, "From: {$client_name} <{$client_email}>¥r¥nReply-To: {$client_email}");
    header('Location:./thanks.php');
}
else{
    if($client_name == ''){
        print_r("名前を入力してください。<br>");
    }
    if(preg_match('/^'.$addr_spec.'$/', $client_email) == 0){
        print_r("メールアドレスが正しくない可能性があります。<br>");
    }
    if($message == ''){
        print_r("メッセージを入力してください。");
    }
}
exit();
?>