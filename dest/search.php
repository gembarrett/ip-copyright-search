<?php 
include("SafeCreativeAPI.search.php");
include("WorldCatAPI.search.php");
?>
<html>
<head>
  <link href='main.min.css' rel='stylesheet' />
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="main.min.js"></script>
</head>
<body>
  <form action='search.php' method='GET'>
        <input type='text' name='search-keywords' size='30'
                value='<?php echo $_GET['search-keywords']; ?>' /> <input type='submit'
                value='search' />
  </form>
</body>
</html>
