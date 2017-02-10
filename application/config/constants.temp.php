<?php
defined('BASEPATH') OR exit('No direct script access allowed');
# test
/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/*SIMPLE HTML DOM */
define('HDOM_TYPE_ELEMENT', 1);
define('HDOM_TYPE_COMMENT', 2);
define('HDOM_TYPE_TEXT',    3);
define('HDOM_TYPE_ENDTAG',  4);
define('HDOM_TYPE_ROOT',    5);
define('HDOM_TYPE_UNKNOWN', 6);
define('HDOM_QUOTE_DOUBLE', 0);
define('HDOM_QUOTE_SINGLE', 1);
define('HDOM_QUOTE_NO',     3);
define('HDOM_INFO_BEGIN',   0);
define('HDOM_INFO_END',     1);
define('HDOM_INFO_QUOTE',   2);
define('HDOM_INFO_SPACE',   3);
define('HDOM_INFO_TEXT',    4);
define('HDOM_INFO_INNER',   5);
define('HDOM_INFO_OUTER',   6);
define('HDOM_INFO_ENDSPACE',7);
define('DEFAULT_TARGET_CHARSET', 'UTF-8');
define('DEFAULT_BR_TEXT', "\r\n");
define('DEFAULT_SPAN_TEXT', " ");
define('MAX_FILE_SIZE', 600000);
// helper functions

define("SEND_REVIEW_REQUEST_NOTIFICATION", true);


define('MWS_API_KEY', 'AKIAIPZUQ4NJHESNHBKQ');
define('MWS_API_SECRET_KEY', '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');		
define('MWS_API_KEY_US', 'AKIAIT5UE47EGT2SWSLQ');
define('MWS_API_SECRET_KEY_US', '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');		
define('MERCHANT_ID','A3459HHXQZ09VK');
define('MERCHANT_ID_US','AOVL8T30AOYNH');

$market_places = array();
/*
$market_places["uk"] = array("id" => "A1F83G8C2ARO7P" , "country"=>"uk", "associate_tag"=>"lspr-21");
$market_places["de"] = array("id" => "A1PA6795UKMFR9" , "country"=>"de","associate_tag"=>"locksour00-21");
$market_places["es"] = array("id" => "A1RKKUPIHCS9HS" , "country"=>"es", "associate_tag"=>"lspr03-21");
$market_places["fr"] = array("id" => "A13V1IB3VIYZZH" , "country"=>"fr","associate_tag"=>"trendeal02-21");
$market_places["it"] = array("id" => "APJ6JRA9NG5V4" ,  "country"=>"it", "associate_tag"=>"locksour09-21");
$market_places["us"] = array("id" => "ATVPDKIKX0DER" ,  "country"=>"us", "associate_tag"=>"trendeal-20");
$market_places["ca"] = array("id" => "A2EUQ1WTGCTBG2" ,  "country"=>"ca", "associate_tag"=>"trendeal-20");
*/
//Updated associate_tag
$market_places["uk"] = array("id" => "A1F83G8C2ARO7P" , "country"=>"uk", "associate_tag"=>"trendeal03-21");
$market_places["de"] = array("id" => "A1PA6795UKMFR9" , "country"=>"de","associate_tag"=>"trendeal07-21");
$market_places["es"] = array("id" => "A1RKKUPIHCS9HS" , "country"=>"es", "associate_tag"=>"trendeal09-21");
$market_places["fr"] = array("id" => "A13V1IB3VIYZZH" , "country"=>"fr","associate_tag"=>"trendeal05-21");
$market_places["it"] = array("id" => "APJ6JRA9NG5V4" ,  "country"=>"it", "associate_tag"=>"trendeal11-21");
$market_places["us"] = array("id" => "ATVPDKIKX0DER" ,  "country"=>"us", "associate_tag"=>"trendeal05-20");
$market_places["ca"] = array("id" => "A2EUQ1WTGCTBG2" ,  "country"=>"ca", "associate_tag"=>"trendeal01-20");

$market_places["mx"] = array("id" => "A1AM78C64UM0Y8" ,  "country"=>"mx", "associate_tag"=>"");
$market_places["in"] = array("id" => "A21TJRUUN4KGV" ,  "country"=>"in", "associate_tag"=>"");
$market_places["jp"] = array("id" => "A1VC38T7YXB528" ,  "country"=>"jp", "associate_tag"=>"");
$market_places["cn"] = array("id" => "AAHKV2X7AFYLW" ,  "country"=>"cn", "associate_tag"=>"");

define('MARKET_PLACES',serialize($market_places));

define('DEBUG_MODE',false);

define('SALES_RANK_MAX_ASINS',5);
define('SALES_RANK_INACTIVE_MAX_REQUEST',7);
define('SALES_RANK_WAIT_TIME',4);
define('SALES_RANK_MAX_REQUESTS',20);

$store_ids = array();
$store_ids["uk"] =  "trendeal03-21";
$store_ids["de"] = "trendeal07-21";
$store_ids["es"] = "trendeal09-21";
$store_ids["it"] = "trendeal11-21";
$store_ids["fr"] = "trendeal05-21";
$store_ids["us"] = "trendeal05-20";
$store_ids["ca"] = "trendeal01-20";

define('STORE_IDS',serialize($store_ids));

define('SMTP_HOST','mail.trendledeals.com');
define('SMTP_USER','');
define('SMTP_PASSWORD','');
define('SMTP_PORT','26');
define('SMTP_CHARSET','utf-8');
define('SMTP_NEWLINE','\r\n');
define('SMTP_FROM_NAME','Trendle Deals');

define('MAIL_PROTOCOL','smtp');
define('MAIL_TYPE','html');

define('BULK_UPLOAD_ACCESS_KEY','84c259885ca410482e1dcab2cc268e87');