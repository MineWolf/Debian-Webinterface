<?php
	error_reporting(0);
	include('./config.php');
	include('Net/SSH2.php');
    if (isset($_POST['Apache-Installieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-get update && apt-get install apache2 php5 -y');
    }
    if (isset($_POST['Apache-Uninstallieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-get remove apache2 php5 -y && apt-get update');
    }
    if (isset($_POST['MYSQL-Installieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-get update && apt-get install mysql-server mysql-client && apt-get install phpmyadmin');
    }
    if (isset($_POST['MYSQL-Uninstallieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-get remove mysql-server mysql-client && apt-get remove phpmyadmin && apt-get update');
    }
    if (isset($_POST['Minecraft-Installieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('wget https://github.com/MineWolf/Minecraft-Server/blob/master/mc.tar.gz && tar xfz mc.tar.gz');
		$ssh->exec('cd /mc/ &&  chmod -R 7777 start.sh && chmod -R 7777 restart.sh && ./start.sh');
    }
    if (isset($_POST['Minecraft-Uninstallieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('rm -r mc/');
		$ssh->exec('rm -r mc/');
    }	
    if (isset($_POST['Teamspeak-Installieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('wget http://dl.4players.de/ts/releases/3.0.10.3/teamspeak3-server_linux-amd64-3.0.10.3.tar.gz && tar xfz teamspeak3-server_linux-amd64-3.0.10.3.tar.gz');
		$ssh->exec('cd /teamspeak3-server_linux-amd64/ && chmod -R 7777 ts3server_startscript.sh && ./ts3server_startscript.sh start');
    }
    if (isset($_POST['Teamspeak-Uninstallieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
        $ssh->exec('cd /teamspeak3-server_linux-amd64/ && ./ts3server_startscript.sh stop && cd /');
		$ssh->exec('rm -r teamspeak3-server_linux-amd64/');
    }
    if (isset($_POST['Java-Installieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv-keys EEA14886 && apt-get update && apt-get install oracle-java8-installer');
    }
    if (isset($_POST['Java-Uninstallieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-get remove oracle-java8-installer && apt-get update');
    }
    if (isset($_POST['WordPress-Installieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('cd /var/www/html/ && wget http://wordpress.org/latest.tar.gz && tar xfz latest.tar.gz');
    }
    if (isset($_POST['WordPress-Uninstallieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('cd / && rm -r /var/www/html/wordpress/');
    }
    if (isset($_POST['Screen-Installieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-get update && apt-get install screen');
    }
    if (isset($_POST['Screen-Uninstallieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-get remove screen && apt-get update');
    }
    if (isset($_POST['Nano-Installieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-get update && apt-get install nano');
    }
    if (isset($_POST['Nano-Uninstallieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-get remove nano && apt-get update');
    }
    if (isset($_POST['Sudo-Installieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-get update && apt-get install Sudo');
    }
    if (isset($_POST['Sudo-Uninstallieren']))
    {
	    $ssh = new Net_SSH2($Server);
		if (!$ssh->login($Benutzer, $Password)) {
			exit('Login Failed');
		}
		$ssh->exec('apt-get remove Sudo && apt-get update');
    }
?>
<!DOCTYPE html>
<html lang="de"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mine-Host - Panel</title>

    <link href="./css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

	<div id="wrapper">
	<div class="container">
		<center class="alert alert-danger"> <a href="./logout.php">-=Logout=-</a> Klicke hir um dich aus zu Loggen!  <a href="./logout.php">-=Logout=-</a> </center>   
        <div class="table-responsive">
        <table class="table">
        		<tr class="bg-success">
		<td>Apache</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Apache Installieren möchtest?&#39;)" name="Apache-Installieren" class="btn btn-success">Installieren</button>
		<button  onclick="return confirm(&#39;Bist du sicher das du Apache Entfernen möchtest?&#39;)" name="Apache-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>Mysql</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du MYSQL Installieren möchtest?&#39;)" name="MYSQL-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Mysql Entfernen möchtest?&#39;)" name="MYSQL-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>Minecraft</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Minecraft Installieren möchtest?&#39;)" name="Minecraft-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Minecraft Entfernen möchtest?&#39;)" name="Minecraft-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>Teamspeak</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Teamspeak Installieren möchtest?&#39;)" name="Teamspeak-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Teamspeak Entfernen möchtest?&#39;)" name="Teamspeak-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr> 
       		<tr class="bg-success">
		<td>Java</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Java Installieren möchtest?&#39;)" name="Java-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Java Entfernen möchtest?&#39;)" name="Java-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>WordPress</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du WordPress Installieren möchtest?&#39;)" name="WordPress-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du WordPress Entfernen möchtest?&#39;)" name="WordPress-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>Screen</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Screen Entfernen möchtest?&#39;)" name="Screen-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Screen Entfernen möchtest?&#39;)" name="Screen-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>Nano</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Nano Installieren möchtest?&#39;)" name="Nano-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Nano Entfernen möchtest?&#39;)" name="Nano-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
      		<tr class="bg-success">
		<td>Sudo</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Sudo Installieren möchtest?&#39;)" name="Sudo-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Sudo Entfernen möchtest?&#39;)" name="Sudo-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
				</tbody></table>
        </div>
    </div>
    </div>

<footer class="footer">
      <div class="container"><center>
        <span class="text-muted">Copyright &copy; MineWolf 2016. All rights reserved.</span>
	  </center></div>
</footer>
</div>
</body></html><?php
	include('Net/SSH2.php');
    if (isset($_POST['Apache-Installieren']))
    {
	    $ssh = new Net_SSH2('Mine-Planet.de');
		if (!$ssh->login('root', 'Killerscharf1')) {
			exit('Login Failed');
		}
		echo $ssh->exec('screen -X -S minecraft kill');
    }

    if (isset($_POST['Apache-Uninstallieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['MYSQL-Installieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['MYSQL-Uninstallieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Minecraft-Installieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Minecraft-Uninstallieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Teamspeak-Installieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Teamspeak-Uninstallieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Java-Installieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Java-Uninstallieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['WordPress-Installieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['WordPress-Uninstallieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Screen-Installieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Screen-Uninstallieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Nano-Installieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Nano-Uninstallieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Sudo-Installieren']))
    {
         exec('test.pl');
    }
    if (isset($_POST['Sudo-Uninstallieren']))
    {
         exec('test.pl');
    }
?>
<!DOCTYPE html>
<html lang="de"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mine-Host - Panel</title>

    <link href="./BungeeCloud Portal Home_files/bootstrap.min.css" rel="stylesheet">

</head>

<body>

	<div id="wrapper">
	<div class="container">

        <div class="table-responsive">
        <table class="table">
		<tbody><tr>
		<td>Programme</td>
		<td>Action</td>
		<td></td>
		</tr>
        		<tr class="bg-success">
		<td>Apache</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Apache Installieren möchtest?&#39;)" name="Apache-Installieren" class="btn btn-success">Installieren</button>
		<button  onclick="return confirm(&#39;Bist du sicher das du Apache Entfernen möchtest?&#39;)" name="Apache-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>Mysql</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du MYSQL Installieren möchtest?&#39;)" name="MYSQL-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Mysql Entfernen möchtest?&#39;)" name="MYSQL-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>Minecraft</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Minecraft Installieren möchtest?&#39;)" name="Minecraft-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Minecraft Entfernen möchtest?&#39;)" name="Minecraft-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>Teamspeak</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Teamspeak Installieren möchtest?&#39;)" name="Teamspeak-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Teamspeak Entfernen möchtest?&#39;)" name="Teamspeak-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr> 
       		<tr class="bg-success">
		<td>Java</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Java Installieren möchtest?&#39;)" name="Java-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Java Entfernen möchtest?&#39;)" name="Java-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>WordPress</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du WordPress Installieren möchtest?&#39;)" name="WordPress-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du WordPress Entfernen möchtest?&#39;)" name="WordPress-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>Screen</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Screen Entfernen möchtest?&#39;)" name="Screen-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Screen Entfernen möchtest?&#39;)" name="Screen-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
       		<tr class="bg-success">
		<td>Nano</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Nano Installieren möchtest?&#39;)" name="Nano-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Nano Entfernen möchtest?&#39;)" name="Nano-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
      		<tr class="bg-success">
		<td>Sudo</td>
		<td>
		<form method="post" action="" autocomplete="off">
		<button onclick="return confirm(&#39;Bist du sicher das du Sudo Installieren möchtest?&#39;)" name="Sudo-Installieren" class="btn btn-success">Installieren</button>
		<button onclick="return confirm(&#39;Bist du sicher das du Sudo Entfernen möchtest?&#39;)" name="Sudo-Uninstallieren" class="btn btn-danger">Entfernen</button>
		</form>
		</td>
		</tr>
				</tbody></table>
        </div>
        </div>
    
    </div>
    
    </div>

<footer class="footer">
      <div class="container"><center>
        <span class="text-muted">Copyright &copy; MineWolf 2016. All rights reserved.</span>
	  </center></div>
</footer>
</div>
</body></html>