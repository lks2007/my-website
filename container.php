<?php
if(isset($_GET['extension'])){ 
    if($_GET['extension'] ==  "json"){
        $file = './json/data.json'; 
        // mettre le contenu du fichier dans une variable
        $Jsondata = file_get_contents($file); 
        // décoder le flux JSON
        $data = json_decode($Jsondata); 

        foreach($data as $page){
            echo "<div class='container-app contrainer-app1' id='container-app' style='display: block;'>";
            echo "<div class='container-img'>";
            echo "<a href='". $page->href ."'><img class='img' src='". $page->img ."' title='". $page->title ."'></img></a>";
            echo "</div>";
            echo "<div class='ligne'></div>";
            echo "<div class='container-logo'>";
            echo "<img src='". $page->logo ."' class='logo css'>";
            echo "</div>";
            echo "<div class='container-text'>";
            echo "<a href='". $page->href ."' id='color_black'><b title='". $page->title ."'>". $page->text ."</b></a>";
            echo "</div>";
            echo "<div class='container-creator'>";
            echo "<p>". $page->creator ."</p>";
            echo "</div>
            <br /></div>";
        }
    }
}
if(!isset($_GET['extension']) AND empty($_GET['extension'])){
    require_once("include/dotenv/pdo.php");

    $req = $bdd->query('SELECT * from course ORDER BY id DESC LIMIT 6;');

    $results = $req;

    while ($donnees = $results->fetch())
    {
        echo "<div class='container-app contrainer-app1' id='container-app' style='display: block;'>";
        echo "<div class='container-img'>";
        echo "<a href='". $donnees['lien'] ."'><img class='img' src='". $donnees['image'] ."' title='". $donnees['title'] ."'></img></a>";
        echo "</div>";
        echo "<div class='ligne'></div>";
        echo "<div class='container-logo'>";
        echo "<img src='". $donnees['logo'] ."' class='logo css'>";
        echo "</div>";
        echo "<div class='container-text'>";
        echo "<a href='". $donnees['lien'] ."' id='color_black'><b title='". $donnees['title'] ."'>". $donnees['text'] ."</b></a>";
        echo "</div>";
        echo "<div class='container-creator'>";
        echo "<p>". $donnees['creator'] ."</p>";
        echo "</div>
        <br /></div>";
    }
    $results->closeCursor();
}
?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
            ?>
            <script>
                const button = document.getElementById("b");
                button.innerHTML = "<a href='./' class='left' id='a'><b><i class='fas fa-home'></i> Revenir a la page d'accueil</b></a>";
            </script>
            <?php
        if($id === "6"){
            ?>
            <script>
                const text = document.getElementById("container");
                text.innerHTML = "<br /><div class='container-h2'><h2 id='contenue'>Souligner un texte</h2></div><p class='text'>Bonjour aujourd'hui nous allons commencé un nouveau cours pour savoir comment souligner <U>un texte</U>.</p><p class='text'>Il y a deux façons soit on utilise les balises html U:</p><div class='code'><p class='a'>1</p><p class='a'>2</p><p class='a'>3</p><p class='a'>4</p><p class='a'>5</p><p class='a'>6</p><p class='a'>7</p><p class='a'>8</p><code id='code'><code id='code' class='notagname'><</code><code id='code' class='tagname'>html</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab'><</code><code id='code' class='tagname'>head</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab2'><</code><code id='code' class='tagname'>link&nbsp;</code><code id='code' class='tagattribute'>rel</code><code id='code' class='notagname'>=</code><code id='code' class='string'>'stylesheet'&nbsp;</code><code id='code' class='tagattribute'>href</code><code id='code' class='notagname'>=</code><code id='code' class='string'>'style.css'</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab'><</code><code id='code' class='notagname'>/</code><code id='code' class='tagname'>head</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab'><</code><code id='code' class='tagname'>body</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab2'><</code><code id='code' class='tagname'>p</code><code id='code' class='notagname'>></code><code id='code' class='notagname'><</code><code id='code' class='tagname'>U</code><code id='code' class='notagname'>>Souligner un texte</code><code id='code' class='notagname'><</code><code id='code' class='tagname'>U</code><code id='code' class='notagname'>></code><code id='code' class='notagname'><</code><code id='code' class='notagname'>/</code><code id='code' class='tagname'>p</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab'><</code><code id='code' class='notagname'>/</code><code id='code' class='tagname'>body</code><code id='code' class='notagname' >></code> <br /><code id='code' class='notagname'><</code><code id='code' class='notagname'>/</code><code id='code' class='tagname'>html</code><code id='code' class='notagname' >></code></code></div><br /><p class='text' id='bas'>Ou on utilise le css avec text-decoration:</p><div class='code'><p class='a'>1</p><p class='a'>2</p><p class='a'>3</p><p class='a'>4</p><p class='a'>5</p><p class='a'>6</p><p class='a'>7</p><p class='a'>8</p><code id='code'><code id='code' class='tagname'>p&nbsp</code><code id='code' class='notagname'>{</code><br /><code id='code' class='css tab'>text-decoration</code><code id='code' class='notagname'>:&nbsp</code><code id='code' class='css'>underline black solid</code><code id='code' class='notagname'>;</code><br /><code id='code' class='notagname'>}</code></code></div><br /><p class='text'>Bon voila c'est tout pour aujourd'hui on se retrouve la semaine prochaine.</p><br />";
            </script>
            <?php
        }
        if($id === "5"){
            ?>
            <script>
                const text = document.getElementById("container");
                text.innerHTML = "<br /><div class='container-h2'><h2 id='contenue'>Div et span</h2></div><p class='text'>Bonjour aujourd'hui nous allons commencer un nouveau cours sur les balises div et span.</p><p class='text'>Les balises div et span servent à faire des blocks qui contiennent du contenu: </p><div class='code codeheight'><p class='a'>1</p><p class='a'>2</p><p class='a'>3</p><p class='a'>4</p><p class='a'>5</p><p class='a'>6</p><p class='a'>7</p><p class='a'>8</p><p class='a'>9</p><p class='a'>10</p><div class='codetop'><code id='code'><code id='code' class='notagname'><</code><code id='code' class='tagname'>html</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab'><</code><code id='code' class='tagname'>head</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab2'><</code><code id='code' class='tagname'>link&nbsp;</code><code id='code' class='tagattribute'>rel</code><code id='code' class='notagname'>=</code><code id='code' class='string'>'stylesheet'&nbsp;</code><code id='code' class='tagattribute'>href</code><code id='code' class='notagname'>=</code><code id='code' class='string'>'style.css'</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab'><</code><code id='code' class='notagname'>/</code><code id='code' class='tagname'>head</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab'><</code><code id='code' class='tagname'>body</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab2'><</code><code id='code' class='tagname'>div</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab3'><</code><code id='code' class='tagname'>p</code><code id='code' class='notagname'>></code><code id='code' class='notagname'><</code><code id='code' class='tagname'>U</code><code id='code' class='notagname'>>Souligner un texte</code><code id='code' class='notagname'><</code><code id='code' class='tagname'>U</code><code id='code' class='notagname'>></code><code id='code' class='notagname'><</code><code id='code' class='notagname'>/</code><code id='code' class='tagname'>p</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab2'><</code><code id='code' class='tagname'>div</code><code id='code' class='notagname'>></code><br /><code id='code' class='notagname tab'><</code><code id='code' class='notagname'>/</code><code id='code' class='tagname'>body</code><code id='code' class='notagname' >></code> <br /><code id='code' class='notagname'><</code><code id='code' class='notagname'>/</code><code id='code' class='tagname'>html</code><code id='code' class='notagname' >></code></code></div></div><br /><p class='text'>Et si on mets du css dans notre fichier style.css:</p><div class='code codeminimal'><p class='a'>1</p><p class='a'>2</p><p class='a'>3</p><div class='codedown'><code id='code'><code id='code' class='tagname'>div</code><code id='code' class='notagname'>&nbsp {</code><br /><code id='code' class='css tab'>background-color</code><code id='code' class='notagname'>:</code><code id='code' class='css'>&nbsp blue</code><code id='code' class='notagname'>;</code><br /><code id='code' class='notagname'>}</code></code></div></div><br /><p class='text'>Voici le résultat:</p><div class='result1'><div class='div'><p><U>Souligner un texte</U></p></div></div></div><br/><p class='text'>On peut voir que le texte est dans un block que l'on va pouvoir redimensionner et faire plein d'autres choses.</p><p class='text'>Bon voila, c'est tout pour aujourd'hui, on se retrouve la semaine prochaine.</p>";
            </script>
            <?php
        }
    }

?>