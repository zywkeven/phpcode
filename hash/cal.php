<meta charset='utf-8'>

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

函数后面注释中是我本地测试的执行1000次的速度（单位：s），可以看出来MD5Hash是最快的，而且要比其他函数快很多很多...但是从这个函数的算法也可以看出来，它仅仅是依赖于md5后字符串的前7个字符，也就是说如果前7个字符相同的话那么获得的hash值是完全一样的，所以实际来说它的分布情况是不太令人信任的....如果按照32个字符来计算的话速度那就远远的慢于其他算法了... 
除了MD5Hash，其他算法都会受到字符串长度的影响，越长越慢，我测试用的是10个字符的英文。 
每个函数最后的 return $hash % 701819; 中 701819 表示是哈希的最大容积，也就是说这些哈希函数最后得到的数字范围是0~701819，这个数字是可以改的一般认为使用一个大的质数结果的分布会是比较均匀的，在 701819 附近的几个建议的值是：175447, 350899, 1403641, 2807303, 5614657。 
或许你又问了，这个到底可以用来做什么呢...
呵呵，我来解释一下我为什么要整理 and 测试这些哈希算法，我在写多用户 Blog，恩...之前的日志里面也有提过，多用户 Blog 一般都有一个功能，那就是使用一个英文和数字组合的用户名来作为 Blog 的地址（二级域名或者目录）。那么就有一个问题了，如何根据用户名来获取用户的 ID，多一次查询吗？有了哈希函数就不用了，使用哈希函数处理用户名，得到一个数字，再对数字做一定的处理（我是按照2位分割成层次的目录，目的是防止一个目录下有太多的文件而影响磁盘检索速度），然后就形成了一个路径，把对应的ID保存在这个路径下的文件内（我个人推荐用户名做文件名），这样就可以根据用户名来直接获得用户的ID，不需要查询，用户名做文件名，所以即使最后结果相同也是在不同的文件中，所以可以不用担心出现碰撞。

当然...如果你的系统完全是根据用户名来操作那当我前面这些都没说 = =b，悄悄的非议一句 SELECT 也是数字比字符串要快一些地。

我选择的是DJB算法，等以后上线后如果测试MD5分布还算可以接受的话再考虑换用。

从这里也可以看出来其实哈希对于分布还是很有用地，呵呵，可以用来作缓存，静态或者其他需要分布存储的东西上面，这都要看你怎么用了。
 
