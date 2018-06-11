<!Doctype html>
<html>

<head>
    <center>
        <br><br>        <br><br>

<title>S121 - Url shortener</title>
<h1>S121</h1>

</center>
</head>
<br><br>

<body>
<center>
<h1>URL shortener</h1>
<br><br>
<form method="post" action="<?php  ?>">
<label>Enter URL with http or https</label>
<input type="text" required name="url" placeholder="Enter URL with http or https"/><br><br>
<label  style="color:blue">s121.ml/ </label>
<input type="text" required name="key" placeholder="Enter keyword" /><br><br>
<input type="submit" style="background-color:green" width="50" height="30" value="Shorten"/>

</form>

<br><br>
<h1>
<?php
if(!empty($_POST['url'])){
            $keyword=$_POST['key'];
            $url=$_POST['url'];
            if(!strstr($url,"http") && !strstr($url,"https") )
            	{
            	  $url = "http://".$url;
            	}
            
            $content='<?php
            		$myurl="'.$url.
            		'";
            		header("Location:$myurl", true, 302);
            		exit();
            ?>';
             if(empty($_POST['url'])){
            	 echo "Url cannot be empty!";
            	 exit();
             }
            if(!empty($_POST['key'])&& strlen($keyword)>2) {
            		if (!file_exists($keyword)) {
            			mkdir($keyword, 0777, true);
            			$fp =fopen("./$keyword/index.php",'wp');
            			fwrite($fp,$content);
            			fclose($fp);
            
            			$surl = "s121.ml/".$keyword;
            		    $rurl = "https://s121.ml/".$keyword;
            			echo "<a href=$rurl>$surl</a>";
            		}
            		else{
            			echo "Keyword Already exists!";
            		}
            }
            else{
            	echo "Minimum keyword length should be 3!";
            }
}
            
        ?>
</h1>
<center>
</body>

<footer>
<h3>URLs Shortened - 
<?php
 echo count( glob("*", GLOB_ONLYDIR) );
?>
</h3>

<p>Copyright &copy 2018, S121, <a href="https://linkedin.com/in/ashishayadav/">Ashish Yadav</a></p>
</footer>