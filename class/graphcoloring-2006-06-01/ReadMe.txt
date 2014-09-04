What's graph coloring:

In a connected graph (where vertices are connected e.g. no isolated vertex exists), graph coloring is the process that ensures proper marker (/color) has (/have) been assigned to a vertex so that no adjacent (connected) vertices hold the same marker (/color).

How this class works:
This class implemented a new algorithm of graph coloring. The present class works as follow:

1. Gets graph from source (file OR DB)
1. Represents the graph (connections as well) as an array
2. Traverses the array to color vertices according to the algorithm
3. Displays the color result

The New Graph Coloring Algorithm:
 
The new approach of graph coloring works as follow:
==========================================================================
graph = graph array
i=1
j=1
while(i<=no_of_vertices)
   while(j<=no_of_vertices)
     if (graph[i][j]==1)
        i. color vertex i, push it into the colored array
        ii. process(i)
     else
        graph[i][j]:= 0;
     endif
6. j++
   End of while
7. i++
End of while

-----------------------------------------
function process(j)
 i=1 
 while(i<=no_of_vertices)
   if(graph[j][i]==1)
    (i). graph[j][i]:=0 //Disconnects the colered vertex j from its connected ones -- duplex disconnection
    (ii).Disconnects vertex i(which is connected to the newly colored vertex j)from its connected ones--simplex disconnection
   endif
 End of while   

end of function
====================================================================================

I am not giving the complexity analysis of this algorithm here. Future versions will come with so.

And Me:
I have designed and implemented this new graph coloring algorithm in C++ first. Then, as a Web Programmer, I decided to implement it in PHP. This class is the result of such thinking. I hope that everyone (especially those like programming) will enjoy it and implement it to their applications.

Please rate this class if you like and if it comes to your needs. Please feel free to contact me for any further assistance
regarding the algorithm and implementation.

==============================================================================
MA Razzaque Rupom
Moderator, phpResource Group
http://groups.yahoo.com/group/phpresource/
My Blog : http://www.rupom.info
Emails:
rupom_315@yahoo.com
rupom.bd@gmail.com