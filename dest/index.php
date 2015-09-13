<html>
<head>
  <link href='main.css' rel='stylesheet' />
</head>
<body>
  <form action='search.php' method='GET'>
        <input type='text' name='search-keywords' size='30'
                value='<?php echo $_GET['search-keywords']; ?>' /> <input type='submit'
                value='search' />
  </form>
</body>
</html>