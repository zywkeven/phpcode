<meta charset='utf-8'>
有一根27厘米的细木杆，在第3厘米、7厘米、11厘米、17厘米、23厘米这五个位置上各有一只蚂蚁。 木杆很细，不能同时通过一只蚂蚁。开始 时，蚂蚁的头朝左还是朝右是任意的，它们只会朝前走或调头， 两只蚂蚁会同时调头朝反方向走。假设蚂蚁们每秒钟可以走一厘米的距离。 编写程序，求所有蚂蚁都离开木杆 的最小时间和最大时间。
<br>
<br>
<br>
<?php
set_time_limit(5);
class Ant{
    public $step = 1;
    public $position;
    public $direction = 1; 
       
    public function walk() {
        if ($this->isOut()) {
          //  echo ("the ant is out<br>");
        }
        $this->position = $this->position + $this->direction * $this->step;
    }
    public function walkWithEncounter($distance){        
        $this->position = $this->position+(($distance/2/$this->step))*$this->direction-(1-($distance/2/$this->step))*$this->direction;
    }
    public function isOut(){    
        return $this->position <= 0 || $this->position >= 27;
    }
    
    public function isEncounter($ant) {
        if(($this->position==$ant->position)){
            return true;    
        }else{
            return false;
        }  
    }

    public function changeDistation() {
        $this->direction = -1 * ($this->direction);
    }
    
    public function Ant($position, $direction) {
        $this->position=$position;
        if ($direction != 1) {
            $this->direction = -1;//方向设置初始位置,比如为0时,也将其设置为1.这样可以方便后面的处理
        } else {
            $this->direction = 1;
        }
    }
}

class Controller {
    public $aryAnt;
    public $seconds=0;
    
    public function Controller($aryAnt){
        $this->aryAnt=$aryAnt;
        while(!$this->isAllOut()){
            $this->antsWalk();
            $this->seconds+=1;             
            $this->printStatus(); 
        }
       
    }
    
    public function antsWalk(){
        for($i=0;$i<sizeof($this->aryAnt);$i++){        
            if(isset($this->aryAnt[$i+1])){                
                if ($this->aryAnt[$i]->isEncounter($this->aryAnt[$i+1])){ 
                    $absValue=abs($this->aryAnt[$i+1]->position-$this->aryAnt[$i]->position);
                    $this->aryAnt[$i]->walkWithEncounter($absValue);                  
                    $this->aryAnt[$i+1]->walkWithEncounter($absValue);                                
                    $this->aryAnt[$i]->changeDistation();    
                    $this->aryAnt[$i+1]->changeDistation(); 
                    $i++;                         
                }else{
                    $this->aryAnt[$i]->walk();                       
                }
            }else{           
                $this->aryAnt[$i]->walk(); 
            }     
        }
    }
    
    public function  isAllOut(){
        $returnBoolean=true;
        for($i=0;$i<sizeof($this->aryAnt);$i++){
            if($this->aryAnt[$i]->position<0||$this->aryAnt[$i]->position>27){                    
            }else{                
                $returnBoolean=false;
                break;
            }
        }
        return  $returnBoolean;      
    }
    
    public function printStatus(){
        echo "seconds:".$this->seconds."aa<br>";
        for($i=0;$i<sizeof($this->aryAnt);$i++){
            echo "ant: $i   ;position:".$this->aryAnt[$i]->position.
            "         ;directrion:".$this->aryAnt[$i]->direction.'<br>';
        }
        echo '<br><br>';
    }
}


for($counter=0;$counter<32;$counter++){
    $arylogic[0]=($counter%2)==1?1:-1;
    $arylogic[1]=($counter/2%2)==1?1:-1;
    $arylogic[2]=($counter/4%2)==1?1:-1;
    $arylogic[3]=($counter/8%2)==1?1:-1;
    $arylogic[4]=($counter/16%2)==1?1:-1;
    
    
    
    $ant[0]=new Ant(3,$arylogic[0]);
    $ant[1]=new Ant(7,$arylogic[1]);
    $ant[2]=new Ant(11,$arylogic[2]);
    $ant[3]=new Ant(17,$arylogic[3]);
    $ant[4]=new Ant(23,$arylogic[4]);
    $test=new Controller($ant);    
}







?>