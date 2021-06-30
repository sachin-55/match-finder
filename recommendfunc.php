<?php


class Recommend {

    
    public function similarityDistance($preferences,$person1,$person2)
    {
        $similar = array();
        $sum = 0;
       
     
     
         foreach($preferences[$person1] as $key=>$value)
        {
            // echo"hollo";
            if(array_key_exists($key, $preferences[$person2]) )
                $similar[$key] = 1;
        }


        
        if(count($similar) == 0)
            return 0;
        
        foreach($preferences[$person1] as $key=>$value)
        {
            if(array_key_exists($key, $preferences[$person2]))
                $sum = $sum + pow($value - $preferences[$person2][$key], 2);
        }

        
        return  1/(1 + sqrt($sum)); 

    }
    
    
    public function matchItems($preferences, $person)
    {
        $score = array();
        
            foreach($preferences as $otherPerson=>$values)
            {
                if($otherPerson !== $person)
                {
                    $sim = $this->similarityDistance($preferences, $person, $otherPerson);
                    
                    if($sim > 0)
                        $score[$otherPerson] = $sim;
                }
            }
        
        array_multisort($score, SORT_DESC);
        return $score;
    
    }
    
    
    public function transformPreferences($preferences)
    {
        $result = array();
        
        foreach($preferences as $otherPerson => $values)
        {
            foreach($values as $key => $value)
            {
                $result[$key][$otherPerson] = $value;
            }
        }
        
        return $result;
    }
    

    
    public function getRecommendations($preferences, $person)
    {
        $total = array();
        $simSums = array();
        $ranks = array();
        $sim = 0;
        echo "<br>";
        echo $person;
        
       // echo "here i am ";
        
        foreach($preferences as $otherPerson=>$values)
        {
            if($otherPerson != $person)
            {
               // echo "otherPerson: ";
                $sim = $this->similarityDistance($preferences, $person, $otherPerson);
                //echo $sim;
                //echo $otherPerson;
               // echo "<br>";
               // echo $sim;

            }
            
            if($sim > 0)
            {
                foreach($preferences[$otherPerson] as $key=>$value)
                {
                    //echo "<br>insidous<br>";
                     

                    if(($preferences[$person][$key])==0)//care
                    {
                       // echo "<br>insidenull<br>";
                     
                    
                    //echo  $preferences[$otherPerson][$key];echo"<br>";
                        
                        if(!array_key_exists($key, $total)) {
                            //echo "bhitra xu ma<br>";
                            $total[$key] = 0;
                        }

                        $total[$key] += $preferences[$otherPerson][$key] * $sim;
                        //echo $total[$key];echo "<br>";
                       // echo $sim;echo "<br>";
                       // echo  $preferences[$otherPerson][$key];echo"<br>";

                        
                        if(!array_key_exists($key, $simSums)) {
                            $simSums[$key] = 0;
                        }
                        $simSums[$key] += $sim;

                        //echo $simSums[$key];
                    }
                   
                }
                
            }
        }

        foreach($total as $key=>$value)
        {
            $ranks[$key] =round( $value / $simSums[$key]);     //approximate rating
        }
        
    //array_multisort($ranks, SORT_DESC);    
    return $ranks;
        
    }
   
}

?>








