<?php
set_time_limit(5);
function HashString($lpszFileName, $dwHashType=0){ 
    $key = $lpszFileName; 
    $seed1 = 0x7FED7FED;
    $seed2 = 0xEEEEEEEE; 
    $ch=0;
    echo $key;
    while($key!=0){ 
        echo $ch = strtoupper($key++); 
        $seed1 = $cryptTable[($dwHashType<<8)+$ch]^($seed1+$seed2); 
        $seed2 = $ch+$seed1 +$seed2 +($seed2<<5) +3; 
    } 
return $seed1; 
}
echo  HashString("aaaaaab").'<br>';
echo dechex (HashString("aaaaaab"));



?>


1 概述

链表查找的时间效率为O(N)，二分法为log2N，B+ Tree为log2N，但Hash链表查找的时间效率为O(1)。 
设计高效算法往往需要使用Hash链表，常数级的查找速度是任何别的算法无法比拟的，Hash链表的构造和冲突的不同实现方法对效率当然有一定的影响，然 而Hash函数是Hash链表最核心的部分，本文尝试分析一些经典软件中使用到的字符串Hash函数在执行效率、离散性、空间利用率等方面的性能问题。



2 经典字符串Hash函数介绍 
作者阅读过大量经典软件原代码，下面分别介绍几个经典软件中出现的字符串Hash函数。 
2.1 PHP中出现的字符串Hash函数 
static unsigned long hashpjw(char *arKey, unsigned int nKeyLength) 
{ 
unsigned long h = 0, g; 
char *arEnd=arKey+nKeyLength;


while (arKey < arEnd) { 
h = (h << 4) + *arKey++; 
if ((g = (h & 0xF0000000))) { 
h = h ^ (g >> 24); 
h = h ^ g; 
} 
} 
return h; 
} 
2.2 OpenSSL中出现的字符串Hash函数 
unsigned long lh_strhash(char *str) 
{ 
int i,l; 
unsigned long ret=0; 
unsigned short *s;


if (str == NULL) return(0); 
l=(strlen(str)+1)/2; 
s=(unsigned short *)str; 
for (i=0; i 
ret^=(s[i]<<(i&0x0f)); 
return(ret); 
} */


/* The following hash seems to work very well on normal text strings 
* no collisions on /usr/dict/words and it distributes on %2^n quite 
* well, not as good as MD5, but still good. 
*/ 
unsigned long lh_strhash(const char *c) 
{ 
unsigned long ret=0; 
long n; 
unsigned long v; 
int r;


if ((c == NULL) || (*c == '\0')) 
return(ret); 
/* 
unsigned char b[16]; 
MD5(c,strlen(c),b); 
return(b[0]|(b[1]<<8)|(b[2]<<16)|(b[3]<<24)); 
*/


n=0x100; 
while (*c) 
{ 
v=n|(*c); 
n+=0x100; 
r= (int)((v>>2)^v)&0x0f; 
ret=(ret(32-r)); 
ret&=0xFFFFFFFFL; 
ret^=v*v; 
c++; 
} 
return((ret>>16)^ret); 
} 
在下面的测量过程中我们分别将上面的两个函数标记为OpenSSL_Hash1和OpenSSL_Hash2，至于上面的实现中使用MD5算法的实现函数我们不作测试。 
2.3 MySql中出现的字符串Hash函数 
#ifndef NEW_HASH_FUNCTION


/* Calc hashvalue for a key */


static uint calc_hashnr(const byte *key,uint length) 
{ 
register uint nr=1, nr2=4; 
while (length--) 
{ 
nr^= (((nr & 63)+nr2)*((uint) (uchar) *key++))+ (nr << 8); 
nr2+=3; 
} 
return((uint) nr); 
}


/* Calc hashvalue for a key, case indepenently */


static uint calc_hashnr_caseup(const byte *key,uint length) 
{ 
register uint nr=1, nr2=4; 
while (length--) 
{ 
nr^= (((nr & 63)+nr2)*((uint) (uchar) toupper(*key++)))+ (nr << 8); 
nr2+=3; 
} 
return((uint) nr); 
}


#else


/* 
* Fowler/Noll/Vo hash 
* 
* The basis of the hash algorithm was taken from an idea sent by email to the 
* IEEE Posix P1003.2 mailing list from Phong Vo (kpv@research.att.com) and 
* Glenn Fowler (gsf@research.att.com). Landon Curt Noll (chongo@toad.com) 
* later improved on their algorithm. 
* 
* The magic is in the interesting relationship between the special prime 
* 16777619 (2^24 + 403) and 2^32 and 2^8. 
* 
* This hash produces the fewest collisions of any function that we've seen so 
* far, and works well on both numbers and strings. 
*/


uint calc_hashnr(const byte *key, uint len) 
{ 
const byte *end=key+len; 
uint hash; 
for (hash = 0; key < end; key++) 
{ 
hash *= 16777619; 
hash ^= (uint) *(uchar*) key; 
} 
return (hash); 
}


uint calc_hashnr_caseup(const byte *key, uint len) 
{ 
const byte *end=key+len; 
uint hash; 
for (hash = 0; key < end; key++) 
{ 
hash *= 16777619; 
hash ^= (uint) (uchar) toupper(*key); 
} 
return (hash); 
}


#endif 
Mysql中对字符串Hash函数还区分了大小写，我们的测试中使用不区分大小写的字符串Hash函数，另外我们将上面的两个函数分别记为MYSQL_Hash1和MYSQL_Hash2。 
2.4 另一个经典字符串Hash函数 
unsigned int hash(char *str) 
{ 
register unsigned int h; 
register unsigned char *p;


for(h=0, p = (unsigned char *)str; *p ; p++) 
h = 31 * h + *p;


return h; 
} 
3 测试及结果 
3.1 测试说明 
从上面给出的经典字符串Hash函数中可以看出，有的涉及到字符串大小敏感问题，我们的测试中只考虑字符串大小写敏感的函数，另外在上面的函数中有的函数需要长度参数，有的不需要长度参数，这对函数本身的效率有一定的影响，我们的测试中将对函数稍微作一点修改，全部使用长度参数，并将函数内部出现的计算长度代码删除。 
我们用来作测试用的Hash链表采用经典的拉链法解决冲突，另外我们采用静态分配桶（Hash链表长度）的方法来构造Hash链表，这主要是为了简化我们的实现，并不影响我们的测试结果。 
测试文本采用单词表，测试过程中从一个输入文件中读取全部不重复单词构造一个Hash表，测试内容分别是函数总调用次数、函数总调用时间、最大拉链长度、 平均拉链长度、桶利用率（使用过的桶所占的比率），其中函数总调用次数是指Hash函数被调用的总次数，为了测试出函数执行时间，该值在测试过程中作了一 定的放大，函数总调用时间是指Hash函数总的执行时间，最大拉链长度是指使用拉链法构造链表过程中出现的最大拉链长度，平均拉链长度指拉链的平均长度。 
测试过程中使用的机器配置如下： 
PIII600笔记本，128M内存，windows 2000 server操作系统。 
3.2 测试结果 
以下分别是对两个不同文本文件中的全部不重复单词构造Hash链表的测试结果，测试结果中函数调用次数放大了100倍，相应的函数调用时间也放大了100倍。




从上表可以看出，这些经典软件虽然构造字符串Hash函数的方法不同，但是它们的效率都是不错的，相互之间差距很小，读者可以参考实际情况从其中借鉴使用。





打造最快的Hash表(和Blizzard的对话)

最近在网上看到篇文章，大家一起学习学习。

先提一个简单的问题，如果有一个庞大的字符串数组，然后给你一个单独的字符串，让你从这个数组中查找是否有这个字符串并找到它，你会怎么做？

有一个方法最简单，老老实实从头查到尾，一个一个比较，直到找到为止，我想只要学过程序设计的人都能把这样一个程序作出来，但要是有程序员把这样的程序交给用户，我只能用无语来评价，或许它真的能工作，但...也只能如此了。

最合适的算法自然是使用HashTable（哈希表），先介绍介绍其中的基本知识，所谓Hash，一般是一个整数，通过某种算法，可以把一个字符串"压缩" 成一个整数，这个数称为Hash，当然，无论如何，一个32位整数是无法对应回一个字符串的，但在程序中，两个字符串计算出的Hash值相等的可能非常小，下面看看在MPQ中的Hash算法

unsigned long HashString(char *lpszFileName, unsigned long dwHashType)
{ 
unsigned char *key = (unsigned char *)lpszFileName;
unsigned long seed1 = 0x7FED7FED, seed2 = 0xEEEEEEEE;
int ch;

while(*key != 0)
{ 
   ch = toupper(*key++);

seed1 = cryptTable[(dwHashType << 8) + ch] ^ (seed1 + seed2);
seed2 = ch + seed1 + seed2 + (seed2 << 5) + 3; 
}
return seed1; 
}

Blizzard的这个算法是非常高效的，被称为"One-Way Hash"，举个例子，字符串"unitneutralacritter.grp"通过这个算法得到的结果是0xA26067F3。
是不是把第一个算法改进一下，改成逐个比较字符串的Hash值就可以了呢，答案是，远远不够，要想得到最快的算法，就不能进行逐个的比较，通常是构造一个哈希表(Hash Table)来解决问题，哈希表是一个大数组，这个数组的容量根据程序的要求来定义，例如1024，每一个Hash值通过取模运算 (mod)对应到数组中的一个位置，这样，只要比较这个字符串的哈希值对应的位置又没有被占用，就可以得到最后的结果了，想想这是什么速度？是的，是最快的O(1)，现在仔细看看这个算法吧
int GetHashTablePos(char *lpszString, SOMESTRUCTURE *lpTable, int nTableSize)
{ 
int nHash = HashString(lpszString), nHashPos = nHash % nTableSize;

if (lpTable[nHashPos].bExists && !strcmp(lpTable[nHashPos].pString, lpszString)) 
   return nHashPos; 
else 
   return -1; //Error value 
}

看到此，我想大家都在想一个很严重的问题："如果两个字符串在哈希表中对应的位置相同怎么办？",毕竟一个数组容量是有限的，这种可能性很大。解决该问题的方法很多，我首先想到的就是用"链表",感谢大学里学的数据结构教会了这个百试百灵的法宝，我遇到的很多算法都可以转化成链表来解决，只要在哈希表的每个入口挂一个链表，保存所有对应的字符串就OK了。

事情到此似乎有了完美的结局，如果是把问题独自交给我解决，此时我可能就要开始定义数据结构然后写代码了。然而Blizzard的程序员使用的方法则是更精妙的方法。基本原理就是：他们在哈希表中不是用一个哈希值而是用三个哈希值来校验字符串。

中国有句古话"再一再二不能再三再四"，看来Blizzard也深得此话的精髓，如果说两个不同的字符串经过一个哈希算法得到的入口点一致有可能，但用三个不同的哈希算法算出的入口点都一致，那几乎可以肯定是不可能的事了，这个几率是1: 18889465931478580854784，大概是10的 22.3次方分之一，对一个游戏程序来说足够安全了。

现在再回到数据结构上，Blizzard使用的哈希表没有使用链表，而采用"顺延"的方式来解决问题，看看这个算法：
int GetHashTablePos(char *lpszString, MPQHASHTABLE *lpTable, int nTableSize)
{ 
const int HASH_OFFSET = 0, HASH_A = 1, HASH_B = 2;
int nHash = HashString(lpszString, HASH_OFFSET);
int nHashA = HashString(lpszString, HASH_A);
int nHashB = HashString(lpszString, HASH_B);
int nHashStart = nHash % nTableSize, nHashPos = nHashStart;

while (lpTable[nHashPos].bExists)
{ 
   if (lpTable[nHashPos].nHashA == nHashA && lpTable[nHashPos].nHashB == nHashB) 
    return nHashPos; 
   else 
    nHashPos = (nHashPos + 1) % nTableSize;

   if (nHashPos == nHashStart) 
    break; 
}

return -1; //Error value 
}

1. 计算出字符串的三个哈希值（一个用来确定位置，另外两个用来校验)
2. 察看哈希表中的这个位置
3. 哈希表中这个位置为空吗？如果为空，则肯定该字符串不存在，返回
4. 如果存在，则检查其他两个哈希值是否也匹配，如果匹配，则表示找到了该字符串，返回
5. 移到下一个位置，如果已经越界，则表示没有找到，返回
6. 看看是不是又回到了原来的位置，如果是，则返回没找到
7. 回到3

