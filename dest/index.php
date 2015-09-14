<html>
<head>
  <link href='main.min.css' rel='stylesheet' />
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="main.min.js"></script>
</head>
<body>
  <div id="content">
  <img src="ipicon.svg"><h1>IPropSearch</h1>
  <h2>A search engine for finding and retrieving information about intellectual property</h2>
  <form method='GET'>
        <div id="search-field">
          <input type='text' name='search-keywords' size='30'
                  value='<?php echo $_GET['search-keywords']; ?>' /> 
          <button type='submit' />Search</button>
        </div>
        <div id="checkboxes">
          <div class="criteria">
            <input type="checkbox" name="safeCreative" checked=checked <?php if(isset($_GET['safeCreative'])) echo "checked='checked'"; ?> />
            <label>SafeCreative</label>
          </div>
          <div class="criteria">
            <input type="checkbox" name="worldCat" checked=checked <?php if(isset($_GET['worldCat'])) echo "checked='checked'"; ?> />
            <label>OCLU</label>
          </div>
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
</div>
</body>
</html>