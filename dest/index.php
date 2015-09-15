<html>
<head>
  <link href='main.min.css' rel='stylesheet' />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="main.min.js"></script>
</head>
<body>
  <div id="main-content">
    <header>
  <img src="ipicon.svg"><h1>IPropSearch</h1>
  <h2>A search engine for finding and retrieving information about intellectual property</h2>
  </header>
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
            <input type="checkbox" name="worldCat" <?php if(isset($_GET['worldCat'])) echo "checked='checked'"; ?> />
            <label>OCLC</label>
          </div>
        </div>
  </form>
  <?php 
  if (isset($_GET['safeCreative'])) {
    echo "<h3>Results from Safe Creative for {$_GET['search-keywords']}</h3>";
    include("SafeCreativeAPI.search.php");
  }
  if (isset($_GET['worldCat'])) {
    echo "<h3>Results from the OCLC for {$_GET['search-keywords']}</h3>";
    include("WorldCatAPI.search.php");
  }
  ?>
</div>
<footer>
  <div id="footer-content">
    <p>This is a final project by <a href="http://www.gembarrett.com" target="_blank">Gem Barrett</a> for her <a href="https://msds.open.ac.uk/students/study/undergraduate/qualification/b67" target="_blank">BSc(Hons) Computing, IT and Design</a> studies. All code is available at <a href="https://github.com/gembarrett/ip-copyright-search" target="_blank">GitHub</a> under an <a href="http://choosealicense.com/licenses/mit/" target="_blank">MIT license</a>. Huge thanks to <a href="https://www.safecreative.org/" target="_blank">SafeCreative</a> and the <a href="https://www.oclc.org" target="_blank">Online Computer Library Center (OCLC)</a> for their assistance during the development of this project and for sharing data through their public APIs.</p>
  </div>
</footer>
</body>
</html>