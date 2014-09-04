<?php
function HashString(char *lpszFileName, unsigned long dwHashType) 
{ 
unsigned char *key = (unsigned char *)lpszFileName; 
unsigned long seed1 = 0×7FED7FED, seed2 = 0xEEEEEEEE; 
int ch; 
while(*key != 0) 
{ 
ch = toupper(*key ); 
seed1 = cryptTable[(dwHashType < < 8 ) ch] ^ (seed1 seed2); 
seed2 = ch seed1 seed2 (seed2 < < 5 ) 3; 
} 
return seed1; 
} 
?>