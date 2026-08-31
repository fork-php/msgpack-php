--TEST--
Issue #182 (unknown enum case)
--SKIPIF--
<?php
if (!extension_loaded("msgpack")) {
    exit('skip because msgpack extension is missing');
}
if (version_compare(PHP_VERSION, '8.1.0', '<')) {
    exit('skip Enum tests in PHP older than 8.1.0');
}
?>
--FILE--
Test
<?php
enum TestEnum
{
    case A;
}

$data = file_get_contents(__DIR__.'/issue186.ser.txt');
$unserilized = msgpack_unserialize($data);
?>
OK
--EXPECTF--
Test

Warning: [msgpack] (msgpack_unserialize_map_item) Enum case B does not exist in Enum TestEnum in %s/issue186.1.php on line 9
OK
