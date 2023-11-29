<?php
require_once('connessione.php');
require_once('Classi.php');


use Classi\Funzioni as FU;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use PhpMyAdmin\Sql;

$inviato = FU::richiestaHTTP("inviato");
$inviato = ($inviato == null || $inviato != 1) ? false : true;

if ($inviato) {
    $valido = 0;
    //recupero i dati
    $Nome = FU::richiestaHTTP("nome");
    $Cognome = FU::richiestaHTTP("cognome");
    $Email = FU::richiestaHTTP("email");
    $Cellulare = FU::richiestaHTTP("cellulare");
    $Testo = FU::richiestaHTTP("testo");

    $clsErrore = 'class="errore"';


    //valido dati
    if (($Nome != "") && (strlen($Nome) <= 25)) {
        $clsErroreNome = "";
    } else {
        $valido++;
        $clsErroreNome = $clsErrore;
        $Nome = "";
    }

    if (($Cognome != "") && FU::controllaRangeStringa($Cognome, 0, 25)) {
        $clsErroreCognome = "";
    } else {
        $valido++;
        $clsErroreCognome = $clsErrore;
        $Cognome = "";
    }

    if (($Email != "") && (strlen($Email) <= 50) && filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $clsErroreEmail = "";
    } else {
        $valido++;
        $clsErroreEmail = $clsErrore;
        $Email = "";
    }

    if (($Cellulare != "") && (strlen($Cellulare) <= 25)) {
        $clsErroreCellulare = "";
    } else {
        $valido++;
        $clsErroreCellulare = $clsErrore;
        $Cellulare = "";
    }

    if (($Testo != "") && (strlen($Testo) <= 100)) {
        $clsErroreTesto = "";
    } else {
        $valido++;
        $clsErroreTesto = $clsErrore;
        $Testo = "";
    }

    $inviato = ($valido == 0) ? true : false;
} else {
    $Nome = "";
    $Cognome = "";
    $Email = "";
    $Cellulare = "";
    $Testo = "";

    $clsErroreNome = "";
    $clsErroreCognome = "";
    $clsErroreEmail = "";
    $clsErroreCellulare = "";
    $clsErroreTesto = "";
}
$sql = "SELECT titolo FROM Titoli";
$query = $pdo->prepare($sql);
$query->execute();
$arrTitoli = [];
while ($riga = $query->fetch(PDO::FETCH_ASSOC)) {
    $arrTitoli[] = $riga["titolo"];
}
$sql = "SELECT testo FROM Dati";
$query = $pdo->prepare($sql);
$query->execute();
$arrTesto = [];
while ($riga = $query->fetch(PDO::FETCH_ASSOC)) {
    $arrTesto[] = $riga["testo"];
}
$primaDiv = '<div class="Presentazione"><div class="contatti"><img src="Foto&video/Foto.jpeg" alt="fotopersonale" title="fotopersonale" id="fotopersonale"></div><div class="pTesto"><h3>%s</h3><h1>%s</h1><p>%s</p></div></div>';
$secondaDiv = '<div class="container-reveal" id="status"><div class="Percorso"> <h2>%s</h2> <p>%s</p> <div class="bobba"><div class="insieme"><div class="counter" data-target="5"></div><span>Progetti</span></div><div class="insieme"><div class="counter" data-target="10"></div><span>Competenze</span></div><div class="insieme"><div class="counter" data-target="100"></div> <span>Impegno</span></div></div></div></div> ';
$terzaDiv = '<div class="container-reveal"><div class="Portfolio" id="portfolio"><h2>%s</h2>';
$quartaDiv = '<div class="container-reveal"> <div class="offresigenerale"><h2>%s</h2>';
//print_r($arrTitoli);
$primaDiv = sprintf($primaDiv, $arrTitoli[0], $arrTitoli[1], $arrTesto[7]);
$secondaDiv = sprintf($secondaDiv, $arrTitoli[2], $arrTesto[6]);
$terzaDiv = sprintf($terzaDiv, $arrTitoli[3]);
$quartaDiv = sprintf($quartaDiv, $arrTitoli[4]);



?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sito personale">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
var _iub = _iub || [];
_iub.csConfiguration = {"askConsentAtCookiePolicyUpdate":true,"floatingPreferencesButtonDisplay":"bottom-right","perPurposeConsent":true,"siteId":3243407,"whitelabel":false,"cookiePolicyId":17655099,"lang":"it", "banner":{ "acceptButtonDisplay":true,"backgroundOverlay":true,"closeButtonRejects":true,"customizeButtonDisplay":true,"explicitWithdrawal":true,"listPurposes":true,"position":"bottom" }};
</script>
<script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
    <link href="/css/style.min.css" rel="stylesheet" type="text/css">
    <title>Sito di Mattia</title>

    <script src="./script.js"></script>
</head>

<body>
    <div class="topnav">
        <a href="#home" class="active">Home</a>
        <div id="myLinks">
            <ul>
                <li><a href="#status">Status</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#form01">Contattami</a></li>
                <li><a href="Backend/Login.php">Backend</a></li>
            </ul>
        </div>
        <script>
            function myFunction() {
                var x = document.getElementById("myLinks");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>



    <?php
    echo $primaDiv;
    echo $secondaDiv;
    echo $terzaDiv;


    $sql = "SELECT classe, testo, urlimg FROM Lavori";
    $query = $pdo->prepare($sql);
    $query->execute();

    while ($riga = $query->fetch(PDO::FETCH_ASSOC)) {
        $str = '<div class="%s"><video src="Foto&video/%s" width="200px" controls preload></video><p>%s</p></div>';
        printf($str, $riga["classe"], $riga["urlimg"], $riga["testo"]);
    }
    echo "</div>";
    echo "</div>";
    echo $quartaDiv;

    $sql = "SELECT  classe, nome, urlimg FROM Portfolio";
    $query = $pdo->prepare($sql);
    $query->execute();

    echo '<div class="offresi" id="offresi"><ul>';
    while ($riga = $query->fetch(PDO::FETCH_ASSOC)) {
        $str = '<li><img src="Foto&video/%s" width="50px"><p>%s</p></li>';
        printf($str, $riga["urlimg"], $riga["nome"]);
    }
    echo '</ul></div>';
    echo "</div>";
    echo "</div>";
    ?>

    <?php

    if (!$inviato) {
    ?>
        <div class="contatti">
            <form id="form01" action="index.php?inviato=1" method="POST">
                <h2>Se vuoi informazioni, basta chiedere!</h2>
                <div class="input-group">
                    <label for="nome" <?php echo $clsErroreNome; ?>>Nome</label>
                    <input type="text" class="input" name="nome" id="Nome" require maxlenght="25" value="<?php echo $Nome; ?>" />

                    <label for="cognome" <?php echo $clsErroreCognome ?>>Cognome</label>
                    <input type="text" class="input" name="cognome" id="cognome" require maxlenght="25" value="<?php echo $Cognome; ?>" />

                    <label for="campotelefono" <?php echo $clsErroreCellulare; ?>>Cellulare</label>
                    <input type="tel" class="input" name="cellulare" id="Cellulare" value="<?php echo $Cellulare; ?>" />
                </div>
                <div class="input-group2">
                    <label for="email" <?php echo $clsErroreEmail; ?>>E-mail </label>
                    <input type="email" class="input" id="email" name="email" require maxlength="40" minlength="10" value="<?php echo $Email; ?>" />

                    <label for="testo" <?php echo $clsErroreTesto; ?>>Inserisci testo</label>
                    <textarea id="testo" class="input" name="testo" placeholder="Fammi una domanda" require maxlenght="100" value="<?php echo $Testo; ?>"></textarea>
                </div>
                    <div class="botton">
                        <button id="botton" type="reset">Reset</button>
                        <button id="botton" type="submit">Invio</button>
                    </div>
                </div>
        </div>
        </form>

        <footer>

            <ul>
                <li>E-mail: <a href="mailto:Matty_16_@hotmail.it">Matty_16_@htmail.it</a></li>
                <li>Cellulare: <a href="tel:3273138744 ">3273138744</a></li>
                <li><a href="https://instagram.com/mattysty?igshid=YmMyMTA2M2Y="><img src="Foto&video/logoInstagram.jpeg"></a></li>
                <li><a href="https://www.linkedin.com/in/mattia-cacciatore-6612a6266?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3Bcu4PnMrlSlOwWVEmcu1i7w%3D%3D"><img src="Foto&video/logoLinkedin.jpeg"></a></li>
                <li><a href="https://www.iubenda.com/privacy-policy/17655099">Privacy Policy</a></li>
                <li><a href="https://www.iubenda.com/privacy-policy/17655099/cookie-policy">Cookie Policy</a></li>
            </ul>

        </footer>

    <?php

    } else {
        $sql = "INSERT INTO contatti (nome , cognome, email, cellulare, testo) 
                VALUES ('" . $Nome . "','" . $Cognome . "','" . $Email . "','" . $Cellulare . "','" . $Testo . "')";

        $query = $pdo->prepare($sql);
        $query->execute();

        $str = "<strong>Nome:</strong> %s<br>" .
            "<strong>Cognome:</strong> %s<br>" .
            "<strong>Email:</strong> %s<br>" .
            "<strong>Cellulare:</strong> %s<br>" .
            "<strong>Testo:</strong> %s<br>";

        $str = sprintf($str, $Nome, $Cognome, $Email, $Cellulare, $Testo);
        echo "<div class='risposta'><h2> Grazie per avermi contattato  </h2> Ecco il riepilogo dei tuoi dati: <br>";
        echo $str;

        $str = str_replace('<br>', chr(10), $str);

        $rit = $str;

        if ($rit) {
            echo "<br> Modulo inviato correttamente <br> </div>";
        } else {
            echo "<br> Problema nell'invio dei dati <br>";
        }
    }
    ?>


</body>

</html>