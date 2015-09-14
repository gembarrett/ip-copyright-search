<html>
<head>
  <link href='main.min.css' rel='stylesheet' />
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="main.min.js"></script>
</head>
<body>
  <form method='GET'>
        <input type='text' name='search-keywords' size='30'
                value='<?php echo $_GET['search-keywords']; ?>' /> 
        <input type='submit' value='search' />
        
        <div class="criteria">
          <input type="checkbox" name="safeCreative" <?php if(isset($_GET['safeCreative'])) echo "checked='checked'"; ?> />
          <label>Search SafeCreative</label>
        </div>
        <div class="criteria">
          <input type="checkbox" name="worldCat" <?php if(isset($_GET['worldCat'])) echo "checked='checked'"; ?> />
          <label>Search OCLC</label>
        </div>
  </form>
  <?php 
  if (isset($_GET['safeCreative'])) {
    include("SafeCreativeAPI.search.php");
  }
  if (isset($_GET['worldCat'])) {
    include("WorldCatAPI.search.php");
  }
  ?>

</body>
</html>