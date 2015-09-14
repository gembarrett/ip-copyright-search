<html>
<head>
  <link href='main.min.css' rel='stylesheet' />
  <script href="main.min.js"></script>
</head>
<body onload="initElement();">
  <form action='search.php' method='GET'>
        <input type='text' name='search-keywords' size='30'
                value='<?php echo $_GET['search-keywords']; ?>' /> <input type='submit'
                value='search' />
  </form>
</body>
</html>