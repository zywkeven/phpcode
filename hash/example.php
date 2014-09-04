<meta charset='utf-8'>
<?php


function DEKHash($str) // 0.23
{
$n = strlen($str);
$hash = $n;

for ($i = 0; $i <$n; $i++)
{
$hash = (($hash <<5) ^ ($hash>> 27)) ^ ord($str[$i]);
}
return $hash % 701819;
}

function FNVHash($str) // 0.31
{
$hash = 0;
$n = strlen($str);

for ($i = 0; $i <$n; $i++)
{
$hash *= 0x811C9DC5;
$hash ^= ord($str[$i]);
}

return $hash % 701819;
}

function PJWHash($str) // 0.33
{
$hash = $test = 0;
$n = strlen($str);

for ($i = 0; $i <$n; $i++)
{
$hash = ($hash <<4) + ord($str[$i]);

if(($test = $hash & -268435456) != 0)
{
$hash = (( $hash ^ ($test>> 24)) & (~-268435456));
}
}

return $hash % 701819;
}

function PHPHash($str) // 0.34
{
$hash = 0;
$n = strlen($str);

for ($i = 0; $i <$n; $i++)
{
$hash = ($hash <<4) + ord($str[$i]);
if (($g = ($hash & 0xF0000000)))
{
$hash = $hash ^ ($g>> 24);
$hash = $hash ^ $g;
}
}
return $hash % 701819;
}

function OpenSSLHash($str) // 0.22
{
$hash = 0;
$n = strlen($str);

for ($i = 0; $i <$n; $i++)
{
$hash ^= (ord($str[$i]) <<($i & 0x0f));
}
return $hash % 701819;
}

function MD5Hash($str) // 0.050
{
$hash = md5($str);
$hash = $hash[0] | ($hash[1] <<8 ) | ($hash[2] <<16) | ($hash[3] <<24) | ($hash[4] <<32) | ($hash[5] <<40) | ($hash[6] <<48) | ($hash[7] <<56);
return $hash % 701819;

}





function ELFHash($str) // 0.35
{
$hash = $x = 0;
$n = strlen($str);

for ($i = 0; $i <$n; $i++)
{
$hash = ($hash <<4) + ord($str[$i]);
if(($x = $hash & 0xf0000000) != 0)
{
$hash ^= ($x>> 24);
$hash &= ~$x;
}
}
return $hash % 701819;
}

function JSHash($str) // 0.23
{
$hash = 0;
$n = strlen($str);

for ($i = 0; $i <$n; $i++)
{
$hash ^= (($hash <<5) + ord($str[$i]) + ($hash>> 2));
}
return $hash % 701819;
}

function SDBMHash($str) // 0.23
{
$hash = 0 ;
$n = strlen($str);

for ($i = 0; $i <$n; $i++)
{
$hash = ord($str[$i]) + ($hash <<6 ) + ($hash <<16 ) - $hash;
}
return $hash % 701819;
}

function APHash($str) // 0.30
{
$hash = 0 ;
$n = strlen($str);

for ($i = 0; $i <$n; $i++)
{
if (($i & 1 ) == 0 )
{
$hash ^= (($hash <<7 ) ^ ord($str[$i]) ^ ($hash>> 3 ));
}
else
{
$hash ^= ( ~ (($hash <<11 ) ^ ord($str[$i]) ^ ($hash>> 5)));
}
}
return $hash % 701819;
}


function DJBHash($str) // 0.22
{
$hash = 0;
$n = strlen($str);
for ($i = 0; $i <$n; $i++)
{
$hash += ($hash <<5 ) + ord($str[$i]);
}
return $hash % 701819;
}



echo dechex(701819).'<br>';
echo dechex(DEKHash("kdsaf在职 df df dsk6")).'<br>';
echo dechex(FNVHash("kdsaf在职 df df dsk6")).'<br>';
echo dechex(PJWHash("kdsaf在职 df df dsk6")).'<br>';
echo dechex(PHPHash("kdsaf在职 df df dsk6")).'<br>';
echo dechex(OpenSSLHash("kdsaf在职 df df dsk6")).'<br>';
echo dechex(MD5Hash("kdsaf在职 df df dsk6")).'<br>';
echo dechex(DJBHash("kdsaf在职 df df dsk6")).'<br>';
echo dechex(ELFHash("kdsaf在职 df df dsk6")).'<br>';
echo dechex(JSHash("kdsaf在职 df df dsk6")).'<br>';
echo dechex(SDBMHash("kdsaf在职 df df dsk6")).'<br>';
echo dechex(APHash("kdsaf在职 df df dsk6")).'<br>';
echo '<br><br>';
echo (DEKHash("kdsaf在职 df df dsk6")).'<br>';
echo (FNVHash("kdsaf在职 df df dsk6")).'<br>';
echo (PJWHash("kdsaf在职 df df dsk6")).'<br>';
echo (PHPHash("kdsaf在职 df df dsk6")).'<br>';
echo (OpenSSLHash("kdsaf在职 df df dsk6")).'<br>';
echo (MD5Hash("kdsaf在职 df df dsk6")).'<br>';
echo (DJBHash("kdsaf在职 df df dsk6")).'<br>';
echo (ELFHash("kdsaf在职 df df dsk6")).'<br>';
echo (JSHash("kdsaf在职 df df dsk6")).'<br>';
echo (SDBMHash("kdsaf在职 df df dsk6")).'<br>';
echo (APHash("kdsaf在职 df df dsk6")).'<br>';
echo '<br><br>';


echo (DJBHash("http://www.163.com165645545")).'<br>';
echo hash("md4","a",false).'<br>';
echo hash("md5","a",false).'<br>';
print_r(hash_algos());

?>