<!DOCTYPE html>
<html>
<meta charset="cp1250"> <!--dijakritički znakovi -->
<title>Formula 1</title>

<link rel="stylesheet" href="stil2.css"> 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<body>
<main>

<div class="navigacija">
	<a href="index.php" class="link">Naslovnica</a>
    <a href="onama.php" class="link">O nama</a>
    <a href="kontakt.php" class="link">Kontakt</a>
</div>
<div class="naslov">
<img src="logo.png">
<h2>Vrhunac svijeta motosporta</h2>
</div>


<header>
  <img src="1.jpg" alt="Formula">
  <div class="bottom-left">
    “Želim izgraditi auto koji će biti brži od svih drugih, a onda želim umrijeti.” - Enzo Ferrari
  </div>
</header>
<center><div class="poveznice" style="font-size:20px">
			<a href="#a">O formuli/Svjetski prva</a>
			<a href="#b">Vijesti</a>
			<a href="#c">Svjetski prvaci</a>
			</div></center>
 <a name="a"></a>
  <div class="oformuli"> 
    
      <h1><u>O formuli</u></h1><br>
      <p> <em>Formula 1 (FIA Formula One World Championship) je najviša klasa jednosjeda u automobilističkom utrkivanju</em>, 
	  a pod ingerencijom je Međunarodne automobilističke federacije (FIA). Svake godine održava se određen broj utrka diljem svijeta. 
	  Broj utrka varira od sezone do sezone, a u 2016. godini sezonu je činila ukupno 21 utrka – svaka u drugoj državi. 
	  Na svakoj od tih utrka vozači dobiju bodove ovisno o plasmanu u cilju, a osim vozača bodove dobije i njegova momčad. 
	  Dakle, u svakom trenutku sezone imamo dvije odvojene bodovne tablice – poredak vozača i poredak momčadi (konstruktora).</p><br>
    <img src="3.jpg">
          
    </div>
    
	 <div class="max"> 
    
      <h1 style="text-align:center;color:blue">Prvak sezone 2023.</h1><br>
      <p style="text-align:justify"><b>Max Emilian Verstappen</b> (Hasselt, Belgija, 30. rujna 1997.) je nizozemski vozač Formule 1 za momčad Red Bulla, aktualni svjetski prvak u Formuli 1 te sin bivšeg vozača Formule 1 Josa Verstappena. U kartingu je osvojio preko dvadeset naslova prvaka u raznim kategorijama, a 2014. osvojio je treće mjesto u Europskoj Formuli 3 za momčad Van Amersfoort Racing. U Formuli 1 se natječe od 2015.</p><br>
    <img src="4.jpeg">
          
    </div>
 
<div class="video"><center><hr><a name="b"></a>  <h2><i>Najnovije u svijetu Formule 1</i></h2><iframe width="800" height="500" src="https://www.youtube.com/embed/pyrOFKHHGcY?si=tWBci9sJOboXw4jH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center> </div>
      <hr> 

<div class="tablica">	   
	<?php
$jsonFile = 'quotes.json';
$jsonData = file_get_contents($jsonFile);
$quotes = json_decode($jsonData, true);


$quotesPerPage = 5;
$totalQuotes = 0;
foreach ($quotes as $authorQuotes) {
    $totalQuotes += count($authorQuotes['quotes']);
}

$totalPages = ceil($totalQuotes / $quotesPerPage);
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$startIndex = ($currentPage - 1) * $quotesPerPage;
$endIndex = $startIndex + $quotesPerPage - 1;

?>
    <h1 class="mb-4">F1 Citati</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Autor</th>
                <th>Citat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $quoteCount = 0;
            $displayCount = 0;
            foreach ($quotes as $authorQuotes) {
                foreach ($authorQuotes['quotes'] as $quote) {
                    if ($quoteCount >= $startIndex && $quoteCount <= $endIndex) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($authorQuotes['author']) . "</td>";
                        echo "<td>" . htmlspecialchars($quote) . "</td>";
                        echo "</tr>";
                        $displayCount++;
                    }
                    $quoteCount++;
                    if ($displayCount >= $quotesPerPage) break;
                }
                if ($displayCount >= $quotesPerPage) break;
            }
            ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php if ($currentPage > 1): ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $currentPage - 1; ?>">Previous</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php if ($i == $currentPage) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <?php if ($currentPage < $totalPages): ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $currentPage + 1; ?>">Next</a></li>
            <?php endif; ?>
        </ul>
    </nav>

  </div>
  



<footer>
  <p>Autor: Valentino Tomic, 2024.</p>
  <p><a href="mailto:valentino.tomic2@gmail.com">Email</a></p> <!-- link na email --> 
  <p><a href="tel:+386953791632">Telefon</a></p> <!-- link na telefon --> 
</footer>
</main>
</body>
</html>
