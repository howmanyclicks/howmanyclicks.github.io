<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="This is a project to see how many clicks the button below will get from being hosted publicly on the internet.">
    <meta name="robots" content="index,nofollow,noarchive">
    <title>How Many Clicks?</title>
    <link type="text/plain" rel="author" href="humans.txt" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    <link rel="icon" sizes="192x192" href="assets/icon.png">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

  <main role="main" class="inner cover">
    <h1 class="click-header">How Many Clicks?</h1>
    <p class="lead site-desc">This is a project to see how many clicks the button below will get from being hosted publicly on the internet. Click as many times as you like and share the site around, let's try and break this thing!</p>
    <p class="lead">
      <?php

      $clickcount = explode("\n", file_get_contents('clicks.txt'));
      foreach($clickcount as $line){
      	$tmp = explode('||', $line);
      	$count[trim($tmp[0])] = trim($tmp[1]);
      	}

      ?>
      <button type="button" class="btn btn-lg click-trigger" data-click-id="clicks">Click Me</button>
    </p>
    <p class="lead clicks">
      <span id="clicks" class="click-count"><?php echo $count['clicks'];?></span><br/>
      Clicks
    </p>
  </main>

  <footer class="footer">
    <div class="inner">
      <p>by <a href="https://github.com/JordyValentine">JordyValentine</a> | <a href="https://github.com/howmanyclicks/howmanyclicks.github.io"><i class="la la-github la-lg"></i> GitHub</a></p>
    </div>
  </footer>
</div>
<script>
var clicks = document.querySelectorAll('.click-trigger'); // IE8
for(var i = 0; i < clicks.length; i++){
	clicks[i].onclick = function(){
		var id = this.getAttribute('data-click-id');
		var post = 'id='+id; // post string
		var req = new XMLHttpRequest();
		req.open('POST', 'counter.php', true);
		req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		req.onreadystatechange = function(){
			if (req.readyState != 4 || req.status != 200) return;
			document.getElementById(id).innerHTML = req.responseText;
			};
		req.send(post);
		}
	}
</script>
</body>
</html>
