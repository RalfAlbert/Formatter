<?php
require_once 'class-formatter.php';

$format  = "Mein Name ist %name% und ich bin %jahre[02d]% Jahre alt. Ich wohne in %plz['05d]% %ort%.<br>";
$format .= "%name% wohnt in %plz[05d]% %ort% und ist %jahre['_4d]% Jahre alt.";

$values = array(
			'name'		=> 'Bob',
			'jahre'		=> 42,
			'plz'		=> 6732,
			'ort'		=> 'Klein Codehausen',
		 );

Formatter::printf( $format, $values );

echo '<hr>';
$values = array(
	'number_one'	=> 3,
	'number_two'	=> 155,
 );
$format	 = 'Number One filled to 5 positions: %number_one[05d]%';
$format	.= ' and Number Two as hex (upper chars) filled to 6 positions: %number_two[06X]%';
Formatter::printf( $format, $values );

echo '<hr>';
$values = new stdClass();
$values->key_1 = 'value 1';
$values->key_2 = 'value 2';
$format = '<<<key_1>>> belongs to key_1, <<<key_2>>> belongs to key_2';
 
Formatter::set_delimiter( '<<<', '>>>' );
$e = Formatter::sprintf( $format, $values );
echo $e;