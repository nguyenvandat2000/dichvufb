<meta charset="utf-8">
<?php
require_once 'config.php';
set_time_limit(0);
#============ token check ==================
$token = mysqli_fetch_assoc(mysqli_query($kunloc,"SELECT token FROM token ORDER BY RAND() LIMIT 0,1"))['token'];
$live = json_decode(auto("https://graph.facebook.com/me?access_token=$token"),true);
$active = $live['id'];
    if(empty($active))
    {
    exit('Token CRON Die Rồi');
    }else if(isset($active)){ 
    ?>
<p align="left">TỔNG : <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM mualike")); ?></b> - Tự Động Thêm Bài LIKE.<br>
                               <?php
                               #============== Auto Add POST LIKE ===============
                                $coutlike = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM mualike"));
                                if($coutlike < 100){
                                $feed =json_decode(auto("https://graph.facebook.com/me/home?fields=id,type,privacy,from,object_id&access_token=$token&limit=50"),true);
                                if(isset($feed['data'])){
                            	    foreach($feed['data'] as $feeddata){
                            		     if(!isset($feeddata['from']['category']) && $feeddata['privacy']['value'] == 'EVERYONE' && $feeddata['type'] != 'video'){
                            		          $idpost = explode('_',$feeddata['id'])[1];
                            	            if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM mualike WHERE idpost = '".$idpost."'"))){
                               	        	    $insert_post = mysqli_query($kunloc,"UPDATE mualike SET idpost = '".$idpost."', ghichu = '".$feeddata['from']['name']."'  WHERE idpost = '".$idpost."' AND username = 'kunloc'  ");
                               	    	     echo '<h style="color:green">+ Update thêm:</h> -> <h style="color:blue">'.$idpost.' </h>'."<br>";
                               	    	     echo $feeddata['privacy']['value']."<br>";
                                                #continue;
                            	            }else{
                               	       	        $insert_post = mysqli_query($kunloc,"INSERT INTO mualike SET idpost= '$idpost', ghichu = '".$feeddata['from']['name']."' ,soluong = '10' , done= '0', trangthai = 'fail', loai = 'LIKE', username = 'kunloc'");
                               	   	         echo '<h style="color:red">+ Đã thêm:</h> -> <h style="color:blue">'.$idpost.' </h>'."<br>";
                               	   	         echo $feeddata['privacy']['value']."<br>";
                                                #continue;
                            	            }
                            		   	}
                            	    }  
                                }
                                }
                                echo 'Số bài trong SQL:'.$coutlike;
                                ?>
                            </p>
<hr>
<p align="left">TỔNG : <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muacamxuc")); ?></b> - Tự Động Thêm Bài REACTION.<br>
                               <?php
                               #============== Auto Add POST LIKE ===============
                                $coutcamxuc = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muacamxuc"));
                                $camxuc = array('HAHA','LOVE','WOW');
                                $cx = $camxuc[rand(1,count($camxuc)-1)]; 
                                $feed =json_decode(auto("https://graph.facebook.com/me/home?fields=id,type,privacy,from,object_id&access_token=$token&limit=50"),true);
                                if(isset($feed['data'])){
                            	    foreach($feed['data'] as $feeddata){
                            	        if($coutcamxuc < 100){
                            		     if(!isset($feeddata['from']['category']) && $feeddata['privacy']['value'] == 'EVERYONE' && $feeddata['type'] != 'video'){
                            		          $idpost = explode('_',$feeddata['id'])[1];
                            	            if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM muacamxuc WHERE idpost = '".$idpost."'"))){
                               	        	    $insert_post = mysqli_query($kunloc,"UPDATE muacamxuc SET idpost = '".$idpost."', ghichu = '".$feeddata['from']['name']."'  WHERE idpost = '".$idpost."' AND username = 'kunloc' ");
                               	    	     echo '<h style="color:green">+ Update thêm:</h> -> <h style="color:blue">'.$idpost.' </h>'."<br>";
                               	    	     echo $feeddata['privacy']['value']."<br>";
                                                #continue;
                            	            }else{
                               	       	        $insert_post = mysqli_query($kunloc,"INSERT INTO muacamxuc SET idpost= '$idpost', ghichu = '".$feeddata['from']['name']."' ,soluong = '10' , done= '0', trangthai = 'fail', loai = '$cx', username = 'kunloc'");
                               	   	         echo '<h style="color:red">+ Đã thêm:</h> -> <h style="color:blue">'.$idpost.' </h>'."<br>";
                               	   	         echo $feeddata['privacy']['value']."<br>";
                                                #continue;
                            	            }
                            		        }
                            		   	}
                            	    }  
                                }
                                echo 'Số bài trong SQL:'.$coutcamxuc;
                                ?>
</p>
<hr>
<p align="left">TỔNG : <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muashare")); ?></b> - Tự Động Thêm Bài SHARE.<br>
                            <?php
                                #============== Auto Add POST Share ===============
                               $coutshare = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muashare"));
                               $feed =json_decode(auto("https://graph.facebook.com/me/home?fields=id,type,privacy,from,object_id&access_token=$token&limit=50"),true);
                                if(isset($feed['data'])){
                            	    foreach($feed['data'] as $feeddata){
                            	   if($coutshare < 100){
                            		  if(!isset($feeddata['from']['category']) && $feeddata['privacy']['value'] == 'EVERYONE' && $feeddata['type'] != 'video'){
                            		       $idpost = explode('_',$feeddata['id'])[1];
                            	            if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM muashare WHERE idpost = '".$idpost."'"))){
                               	        	    $insert_post = mysqli_query($kunloc,"UPDATE muashare SET idpost = '".$idpost."', ghichu = '".$feeddata['from']['name']."'  WHERE idpost = '".$idpost."' AND username = 'kunloc' ");
                               	    	        echo '<h style="color:green">+ Update thêm:</h> -> <h style="color:blue">'.$idpost.' </h>'."<br>";
                               	    	        echo $feeddata['privacy']['value']."<br>";
                                                continue;
                            	            }else{
                               	       	        $insert_post = mysqli_query($kunloc,"INSERT INTO muashare SET idpost= '$idpost', ghichu = '".$feeddata['from']['name']."' ,soluong = '10' , done= '0', trangthai = 'fail', username = 'kunloc'");
                               	   	            echo '<h style="color:red">+ Đã thêm:</h> -> <h style="color:blue">'.$idpost.' </h>'."<br>";
                               	   	            echo $feeddata['privacy']['value']."<br>";
                               	   	            continue;
                            	            }
                            		   	}
                            	    }  
                                }
                                }
                                echo 'Số bài trong SQL:'.$coutshare;
                                ?>
</p> 
<hr>
<p align="left">TỔNG : <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muasub")); ?></b> - Tự Động Thêm Bài SUB.<br>
                                <?php
                                #============== Auto Add ID SUB ===============
                               $coutsub = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muasub"));
                               $feed =json_decode(auto("https://graph.facebook.com/me/home?fields=id,type,privacy,from,object_id&access_token=$token&limit=50"),true);
                                if(isset($feed['data'])){
                            	    foreach($feed['data'] as $feeddata){
                            	        if($coutsub < 50){
                            		    if(!isset($feeddata['from']['category']) && $feeddata['privacy']['value'] == 'EVERYONE' && $feeddata['type'] != 'video'){
                            	            $idsub = $feeddata['from']['id'];
                            	            $namesub = $feeddata['from']['name'];
                            	            $count_sub = json_decode(auto('https://graph.facebook.com/'.$idsub.'/subscribers?filed=id,from&limit=100000&access_token='.$token.'&method=get'),true);
                            	            echo $count_sub['data'][0]['id'];
                                            if($count_sub['data'][0]['id']){
                                              if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM muasub WHERE idfb = '".$idsub."'"))){
                               	        	    $insert_post = mysqli_query($kunloc,"UPDATE muasub SET idfb = '".$idsub."', ghichu = '".$namesub."'  WHERE idfb = '".$idsub."' AND username = 'kunloc' ");
                               	    	        echo '<h style="color:green">+ Update thêm:</h> -> <h style="color:blue">'.$idsub.' </h>'."<br>";
                                                continue;
                            	              }else{
                               	       	        $insert_post = mysqli_query($kunloc,"INSERT INTO muasub SET idfb= '$idsub', ghichu = '".$namesub."' ,soluong = '10' , done= '0', trangthai = 'fail', username = 'kunloc'");
                               	   	            echo '<h style="color:red">+ Đã thêm:</h> -> <h style="color:blue">'.$idsub.' </h>'."<br>";
                               	   	            continue;
                            	              } 
                            	            
                                           }
                            	            
                            		   	}
                            	    }  
                                }
                                }
                                echo 'Số bài trong SQL:'.$coutsub;
                                ?>
</p>
<hr>
<p align="left">TỔNG : <b style="color:blue"><?= $cout = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muacmt")); ?></b> - Tự Động Thêm Bài CMT.<br>
                                 <?php
                                #============== Auto Add POST CMT ===============
                                $coutcmt = mysqli_num_rows(mysqli_query($kunloc,"SELECT id FROM muacmt"));
                                $feed =json_decode(auto("https://graph.facebook.com/me/home?fields=id,type,privacy,from,object_id&access_token=$token&limit=50"),true);
                                if(isset($feed['data'])){
                            	    foreach($feed['data'] as $feeddata){
                            	      if($coutcmt < 50){ 
                            		  if(!isset($feeddata['from']['category']) && $feeddata['privacy']['value'] == 'EVERYONE' && $feeddata['type'] != 'video'){
                            		       $idpost = explode('_',$feeddata['id'])[1];
                            	            if(mysqli_num_rows(mysqli_query($kunloc,"SELECT * FROM muacmt WHERE idpost = '".$idpost."'"))){
                               	        	    $insert_post = mysqli_query($kunloc,"UPDATE muacmt SET idpost = '$idpost', ghichu = '".$feeddata['from']['name']."' WHERE idpost = '$idpost' AND username = 'kunloc' ");
                               	    	        echo '<h style="color:green">+ Update thêm:</h> -> <h style="color:blue">'.$idpost.' </h>'."<br>";
                               	    	        echo $feeddata['privacy']['value']."<br>";
                                                continue;
                            	            }else{
                               	       	        $insert_post = mysqli_query($kunloc,"INSERT INTO muacmt(idpost, soluong, done, trangthai, ghichu, noidung, username) VALUES ('$idpost','10','0','fail','".$feeddata['from']['name']."','Auto Thêm Post','kunloc')");
                               	   	            echo '<h style="color:red">+ Đã thêm:</h> -> <h style="color:blue">'.$idpost.' </h>'."<br>";
                               	   	            echo $feeddata['privacy']['value']."<br>";
                               	   	            continue;
                            	            }
                            		   	}
                            	    }
                                }
                                }
                                 echo 'Số bài trong SQL:'.$coutcmt;
                                ?>
</p>
<?php
    }
    function auto($url){
    $data = curl_init();
    curl_setopt($data, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($data, CURLOPT_URL, $url);
    $hasil = curl_exec($data);
    curl_close($data);
    return $hasil;
    }
?>
