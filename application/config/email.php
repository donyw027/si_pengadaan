<?php
// defined('BASEPATH') or exit('No direct script access allowed');

// $config['protocol']  = 'smtp';
// $config['smtp_host'] = 'srv177.niagahoster.com';
// $config['smtp_port'] = 465;
// $config['smtp_user'] = 'testing@akt-id.com';
// $config['smtp_pass'] = 'Testing@@akt123';
// $config['smtp_crypto'] = 'ssl'; // Tambahkan ini jika menggunakan SSL
// $config['mailtype']  = 'html';
// $config['charset']   = 'iso-8859-1';
// $config['wordwrap']  = TRUE;
// $config['newline']   = "\r\n"; // Penting untuk beberapa server email


defined('BASEPATH') or exit('No direct script access allowed');

$config['protocol']    = 'smtp';
$config['smtp_host']   = 'mail.kristo.sch.id';
$config['smtp_port']   = 465;
$config['smtp_host'] = 'srv177.niagahoster.com';
// $config['smtp_user']   = 'srv140.niagahoster.com';
// $config['smtp_pass']   = 'sistem@@kristo123';
$config['smtp_user'] = 'testing@akt-id.com';
$config['smtp_pass'] = 'Testing@@akt123';
$config['smtp_crypto'] = 'ssl'; // SSL untuk port 465, atau gunakan 'tls' untuk port 587
$config['mailtype']    = 'html';
$config['charset']     = 'utf-8'; // Menggunakan utf-8 untuk mendukung lebih banyak karakter
$config['wordwrap']    = TRUE;
$config['newline']     = "\r\n"; // Penting untuk beberapa server email
$config['smtp_timeout'] = 10; // Timeout untuk koneksi SMTP