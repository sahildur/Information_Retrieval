
<?php
//<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    $q=$_GET['search_term'];//=rawurlencode ( $_GET['search_term'] ); 
    
    
    $output = array();
    exec("python projc_qe.py "."\"".$q."\"", $output);
    //var_dump($output);
    $st=$output[0];
    
    
 //$_GET['status']='none';
 //$_GET['search_term']='syrian';
    if($_GET['status']=='none')
    {
    
    //echo $st;
    //echo $_GET['search_term'];
    $json_url = "http://sahildur.koding.io:8983/solr/VSM/select?&facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=".$st."&wt=json&indent=true&rows=1000&sort=score%20desc";        
 //   echo $json_url;
    $json = file_get_contents($json_url);
    
    $json=new_rank($json);
    
    ///
    
    echo $json;
    }
    else{
     //echo "sahil is here";   
        //echo $_GET['facet_field'];
        
        $field_particular = array();
        $field_particular_val = array();
        $i=0;
        foreach($_GET['facet_field'] as $field)
        {
            $field_particular[$field] = 'fq='.$field.':';
        }
        foreach($_GET['fac_val'] as $val)
        {
            
        $field_particular_val[$_GET['facet_field'][$i]] = $field_particular_val[$_GET['facet_field'][$i]].'%20'.$val;
            
        //"http://suramrit.koding.io:8983/solr/VSM/select?fq=Country:Iraq%20Syria&fq=City:LONDON&facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=syria&fl=id%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc"
            
        // echo 'label:'.$val.'field:'.$_GET['facet_field'][$i];
        $i = $i+1;
        }
        $i=0;
        foreach( $field_particular_val as $labels )
        {
            $field_particular[$_GET['facet_field'][$i]] = $field_particular[$_GET['facet_field'][$i]].$labels;
        $i = $i+1;
            }
        foreach( $field_particular as $facet_terms )
        {
            $facet_terms_2=$facet_terms_2.'&'.$facet_terms;
        }
        //echo $facet_terms_2;
        //$json_url = "http://sahildur.koding.io:8983/solr/VSM/select?".$facet_terms_2."&facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=".$_GET['search_term']."&fl=id%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc";
        // echo 'sahil is not here';
        // echo $facet_terms_2;
        // echo 'sahil is';
        $json_url = "http://sahildur.koding.io:8983/solr/VSM/select?".$facet_terms_2."&facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=".$st."&wt=json&indent=true&rows=1000&sort=score%20desc";        
        $json = file_get_contents($json_url);
        
        $json=new_rank($json);
        
        echo $json;
        
    }
    
    //chnged from here---- suramrit
    
    /*elseif($_GET['status']==true & isset($_GET['fac_val']))
    {
        
    $json_url = "http://suramrit.koding.io:8983/solr/VSM/select?fq=Country:".$_GET['fac_val']."&facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=".$_GET['search_term']."&fl=id%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc";                
   $json = file_get_contents($json_url);
    echo $json;
    }
    elseif($_GET['status']==false)  {
    $json_url = "http://suramrit.koding.io:8983/solr/VSM/select?facet=on&facet.field=TwitterHandle&facet.field=Country&facet.field=City&facet.field=Person&facet.field=Hashtag&q=".$_GET['search_term']."&fl=id%2Ctext_en%2Cscore%2Ctweet_hashtags&wt=json&indent=true&rows=1000&sort=score%20desc";        
    $json = file_get_contents($json_url);
    echo $json;
    }
    else{
        $json_url ="";
        $json = file_get_contents($json_url);
    echo $json;
    }*/
    
    //print_r($_GET['add'],1);
    $lines = explode(PHP_EOL, $json);
    
  //  $array = array();
//    $json_to_arr=json_decode($json);
    //echo '<pre>',print_r($json_to_arr,1),'</pre>';
 //   foreach ($json_to_arr->response->docs as $line) {
    //echo $line->text_en.'</br></br>';
    
   //            $array[] = $line->text_en;
//    }


//echo $str;

//echo json_encode( array( "name"=>$name,"time"=>$time ) ); 
//echo json_encode( array( "name"=>"Mary","time"=>"10pm" ) ); 

 ///************** RANKING ***********//
    
    function new_rank($json)
    {
        
         $decoded=json_decode($json);
    
    
    $all=$decoded->response->docs;
    $size=10;
    
    $chunks=array_chunk ( $all , $size , $preserve_keys = false  );
    $new_array=array();
    foreach ($chunks as $key => $value)
    {
      $TR=array();
      $PR=array();
      $VI=array();
      $TR2=array();
      $PR2=array();
      for($twt=0;$twt<count($value);$twt++)
      {
       
      if(($value[$twt]->is_user_verified) == NULL)
       {
        $value[$twt]->is_user_verified=0;
       }
       $pv=($value[$twt]->favorite_count+$value[$twt]->retweet_count+$value[$twt]->user_followers);
       if($value[$twt]->is_user_verified==1)
       {
           $pv=$pv*1.25;
       }
       //print_r($pv." ");
       array_push($PR,$pv);
       array_push($TR,$value[$twt]->created_at);
        //$value[0]->score=10;
      }
       
      array_unshift($TR,null);
      unset($TR[0]);
      array_unshift($PR,null);
      unset($PR[0]);
      arsort($TR);
      asort($PR);
    
      //print_r('<pre>');
      //print_r($value);
      //print_r('</pre>'); 
    
      for($twt=1;$twt<=count($value);$twt++)
      {
          $trank=array_search($twt, array_keys($TR));
          $trank=$trank+1;
          array_push($TR2,$trank);
          
          $prank=array_search($twt, array_keys($PR));
          $prank=$prank+1;
          array_push($PR2,$prank);
          
          $viralityIndex=$prank/$trank;
          array_push($VI,$viralityIndex);
      }
     // print_r($TR2);
     // print_r($PR2);
      arsort($VI);
     // print_r($VI);
      $ranking=array_keys($VI);
      $reordered=array();
     // print_r($ranking);
      for($twt=0;$twt<count($value);$twt++)
      {
         $r=$ranking[$twt];
         $reordered[$twt]=$value[$r];
         $new_array[]=$reordered[$twt];
      }
        $value=$reordered;
        //$new_array[]=$value;
    }
    
    
    $decoded->response->docs=$new_array;
    
    $json=json_encode($decoded);
   
   return $json;     
        
    }
    
   


?>