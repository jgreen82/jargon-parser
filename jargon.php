<?php
    include 'jargonLibrary.php';
    if(isset($_POST['result']))
        $a_jarWordData = getJargon($_POST['result']);
    elseif(isset($_GET['jid'])){
        $jid = $_GET['jid'];
        settype ($jid, 'integer');
        $o_search = new JarSearch();
        $o_search->search($jid);
        $sa_names = $o_search->getNames();
        $a_jarWordData = getJargon($sa_names[0]);
    }
    else
        $a_jarWordData = getJargon ('hacker');
    
echo "<!DOCTYPE html>\n";
echo "<html>\n";
echo "\n";
echo "<head>\n";
echo "<meta name=\"viewport\" content=\"width=device-width, minimum-scale=1, maximum-scale=1\">\n";
echo "<title>Mobile Jargon File</title>\n";
echo "\n";
echo "<style>\n";
echo "    .imDiv\n";
echo "    {\n";
echo "    float: left;\n";
echo "    padding-right: 1em;\n";
echo "    padding-bottom: 1em;\n";
echo "    }\n";
echo "\n";
echo "    .black\n";
echo "    {\n";
echo "            color:black\n";
echo "    }\n";
echo "</style>\n";
echo "\n";
echo "<!--3 Files to include: 1 css and 2 js files-->\n";
echo "<link rel=\"stylesheet\" href=\"http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css\"></link>\n";
echo "<script src=\"http://code.jquery.com/jquery-1.6.4.min.js\"></script>\n";
echo "<script src=\"http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js\"></script>\n";
echo "<section id = \"" . $a_jarWordData['name'] . "\" data-role = \"page\">\n";
echo "  \n";
echo "	<header data-role = \"header\">\n";
echo "		<h1>" . $a_jarWordData['name'] . "</h1>\n";
echo "	</header>\n";
echo "     \n";
echo "	<div class = \"ui-btn-active\" data-role = \"navbar\">\n";
echo "		<ul data-role = \"navbar\">\n";
echo "			<li><a href = \"index.php#NewSearch\" data-transition=\"fade\">NEW SEARCH</a></li>\n";
echo "			<li><a href = \"index.php#TopRated\" data-transition=\"fade\">TOP RATED</a></li>\n";
echo "			<li><a href = \"random.php\" data-transition=\"fade\">RANDOM</a></li>\n";
echo "		</ul>\n";
echo "    </div> \n";
echo "	\n";
echo "	<h2>" . $a_jarWordData['name'] . "</h2>\n";
    echo "<blockquote>";
    foreach($a_jarWordData['def'] as $item)
        echo $item;
    echo"</blockquote></br>\n";
echo "	\n";
echo "  <footer data-role = \"footer\" data-position=\"fixed\">\n";
echo "		<div class = \"ui-btn-active\" data-role = \"navbar\">\n";
echo "			<ul data-role = \"navbar\">\n";
echo "				<li><a href=\"index.php#MainPage\" data-role=\"navbar\" data-transition=\"fade\">Back to Main Page</a></li>\n";
echo "			</ul>\n";
echo "		</div>\n";
echo "  </footer>\n";
echo "</section>\n";
echo "</body>\n";
echo "</html>\n";
?>
