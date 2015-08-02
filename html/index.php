<?php
$uri    = $_SERVER['REQUEST_URI'] ;
$domain = $_SERVER['SERVER_NAME'] ;
$code   = intval($_GET['response']) ;
$title = 'Error ' . $code ;

$images = array() ;
$images[] = array('name'=>'ahorse'               , 'w'=>750, 'h'=>375) ;
$images[] = array('name'=>'astar'                , 'w'=>620, 'h'=>320) ;
$images[] = array('name'=>'herface'              , 'w'=>520, 'h'=>270) ;
$images[] = array('name'=>'intoalchemy'          , 'w'=>620, 'h'=>320) ;
$images[] = array('name'=>'leopardprint'         , 'w'=>520, 'h'=>270) ;
$images[] = array('name'=>'lore-mybaseboard'     , 'w'=>750, 'h'=>375) ;
$images[] = array('name'=>'lore-publicacceptance', 'w'=>750, 'h'=>375) ;
$images[] = array('name'=>'neighborhoodwatch'    , 'w'=>620, 'h'=>320) ;
$images[] = array('name'=>'seeclearly'           , 'w'=>520, 'h'=>270) ;
$images[] = array('name'=>'talkingstick'         , 'w'=>620, 'h'=>320) ;
$images[] = array('name'=>'thejungle'            , 'w'=>520, 'h'=>270) ;
$images[] = array('name'=>'threewords'           , 'w'=>520, 'h'=>270) ;
$images[] = array('name'=>'yourhands'            , 'w'=>620, 'h'=>320) ;

$img = $images[rand(0,count($images)-1)] ;

//======================================================================================//
// Taken from http://www.php.net/manual/en/function.http-response-code.php
$http_status_codes = array(100 => "Continue", 101 => "Switching Protocols", 102 => "Processing",
200 => "OK", 201 => "Created", 202 => "Accepted", 203 => "Non-Authoritative Information", 204 => "No Content", 205 => "Reset Content", 206 => "Partial Content", 207 => "Multi-Status",
300 => "Multiple Choices", 301 => "Moved Permanently", 302 => "Found", 303 => "See Other", 304 => "Not Modified", 305 => "Use Proxy", 306 => "(Unused)", 307 => "Temporary Redirect", 308 => "Permanent Redirect",
400 => "Bad Request", 401 => "Unauthorized", 402 => "Payment Required", 403 => "Forbidden", 404 => "Not Found", 405 => "Method Not Allowed", 406 => "Not Acceptable", 407 => "Proxy Authentication Required", 408 => "Request Timeout", 409 => "Conflict", 410 => "Gone", 411 => "Length Required", 412 => "Precondition Failed", 413 => "Request Entity Too Large", 414 => "Request-URI Too Long", 415 => "Unsupported Media Type", 416 => "Requested Range Not Satisfiable", 417 => "Expectation Failed", 418 => "I'm a teapot", 419 => "Authentication Timeout", 420 => "Enhance Your Calm", 422 => "Unprocessable Entity", 423 => "Locked", 424 => "Failed Dependency", 424 => "Method Failure", 425 => "Unordered Collection", 426 => "Upgrade Required", 428 => "Precondition Required", 429 => "Too Many Requests", 431 => "Request Header Fields Too Large", 444 => "No Response", 449 => "Retry With", 450 => "Blocked by Windows Parental Controls", 451 => "Unavailable For Legal Reasons", 494 => "Request Header Too Large", 495 => "Cert Error", 496 => "No Cert", 497 => "HTTP to HTTPS", 499 => "Client Closed Request",
500 => "Internal Server Error", 501 => "Not Implemented", 502 => "Bad Gateway", 503 => "Service Unavailable", 504 => "Gateway Timeout", 505 => "HTTP Version Not Supported", 506 => "Variant Also Negotiates", 507 => "Insufficient Storage", 508 => "Loop Detected", 509 => "Bandwidth Limit Exceeded", 510 => "Not Extended", 511 => "Network Authentication Required", 598 => "Network read timeout error", 599 => "Network connect timeout error") ;
//======================================================================================//

$error_message = 'This generated an error with code ' . $code . ' (' . $http_status_codes[$code] . ')' ;

switch($code){
  case 403: $error_message .= ', which means that you tried to access a resource that Aidan doesn\'t want you to see.  What is he hiding?' ; break ;
  case 404: $error_message .= ', which means that the resource doesn\'t exist. Sorry about that.' ; break ;
  case 500: $error_message .= ', which means that something is very wrong.' ; break ;
  default: $error_message .= ',' ; break ;
}

$stylesheets = array($_SERVER['HTTP_PREFIX'] . '/errors/style.css') ;
include($_SERVER['FILE_PREFIX'] . '/_core/preamble.php') ;
?>

<div class="right">
  <div class="blurb">
    <p id="p_access">Bad news!  You tried to access the following uri:<br /><br />
    <span id="span_uri"><?php echo $domain , $uri ; ?></span><br /><br />
    <?php echo $error_message ; ?>
    </p>
    <div id="lore_wrapper">
      <p id="p_lore">There was a problem with that uri, so here's a funny comic instead:</p>
      <img src="<?=$_SERVER['HTTP_PREFIX']?>/errors/images/<?php echo $img['name'] ; ?>.png" width="<?php echo $img['w'] ; ?>px" height="<?php echo $img['h'] ; ?>px"/>
      <div id="div_lore_link"><a href="http://badgods.com/view/<?php echo $img['name'] ; ?>">Lore Brand Comics</a></div>
      </div>
    </div>
  </div>
</div>

<?php foot() ; ?>