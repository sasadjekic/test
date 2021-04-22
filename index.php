<!DOCTYPE html>
<?php

class Artical {

    private $id;
    private $name;
    private $desc;
    private $img;

    public function __get($nazivPolja) {  // nazivPolja se odnosi na dohvatanje svih vrednosti
        return $this->$nazivPolja;      // koje imamo u klasi
    }

    public function __construct($id, $name, $desc, $img) {

        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->img = $img;
    }

}

function getAllArticals() { //
    $konekcija = mysqli_connect(
            "localhost", "root", "", "citrus");
    $sql = "select * from articles";
    $rezultat = mysqli_query($konekcija, $sql);  //ILI  $rezultat = $konekcija->query($sql); kao objekat

    $niz = [];
    while ($red = $rezultat->fetch_array()) {
        $niz[] = new Artical($red['id'],
                $red['name'],
                $red['desc'],
                $red['img']);
    }
    return $niz;
}

$rezultat = getAllArticals();
/* var_dump($rezultat);

  echo $rezultat[0]->{'id'};
  echo $rezultat[0]->{'name'};
  echo $rezultat[0]->{'desc'};
  echo $rezultat[0]->{'img'};
 */
?>


<html lang="sr">
    <head>

        <title>Citrus commerce</title>
        <meta http-equiv="Content-Type"
              content="text/html;
              charset=utf-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Sasa Djekic">
        <meta name="description" content="Citrus company">
        <meta name="keywords" content="Citrus commerce, citrus, fruit, sell, import">
        <meta name="keywords" content="Citrus commerce, citrus, fruit, sell, import">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
              crossorigin="anonymous">
    </head>

    <body>


        <nav class="navbar navbar-expand-md navbar-dark bg-dark py-3">
            <a class="navbar-brand" href="#"><i class="far fa-lemon mr-2 d-none d-sm-inline"></i>Citrus Commerce</a>


            <div class="collapse navbar-collapse" >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <form class="form-inline ml-auto">

                    <div class="input-group-append">
                        <button class="btn btn-success" type="button">Login</button>
                    </div>
                </form>
            </div>

        </form>
    </div>
</nav>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-5">Poštovani kupci!</h1>
        <p class="lead">Dobrodošli na prezentaciju naše firme <b>Citrus Commerce</b> na kojoj možete saznati sve o nama i
            proizvodima iz našeg asortimana! </p>

    </div>
</div>

<div class="container mb-3">
    <h1 class="display-1 text-center">Citrus Commerce</h1>
    <div class="row">
        <?php
        $i = 0;
        foreach ($rezultat as $el) {
            ?>

            <div class = "col-xl-4 col-sm-6 mt-4">
                <div class = "card h-100">
                    <img class = "card-img-top" src = "images/<?php echo $rezultat[$i]->{'img'}; ?>" alt = "Pomorandza">
                    <div class = "card-body">
                        <h5 class = "card-title"><?php echo $rezultat[$i]->{'name'};
            ?></h5>
                        <p class="card-text"><?php echo $rezultat[$i]->{'desc'}; ?> </p>
                        <p class="card-text"><small class="text-muted">Na lageru</small></p>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
</div>


<!--  Sekcija sa proizvodima koja nije potreban nakon sto je to prebaceno u PHP blok
<div class="container mb-3">
    <h1 class="display-1 text-center">Citrus Commerce</h1>
    <div class="row">
        <div class="col-xl-4 col-sm-6 mt-4">
            <div class="card h-100">
                <img class="card-img-top" src="images/orange.jpg" alt="Pomorandza">
                <div class="card-body">
                    <h5 class="card-title">Pomorandža</h5>
                    <p class="card-text">Narandža ili pomorandža je hibrid citrusa. Nastala je
                        ukrštanjem pomela (Citrus maxima) i mandarine (Citrus reticulata). </p>
                    <p class="card-text"><small class="text-muted">Na lageru</small></p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mt-4">
            <div class="card h-100">
                <img class="card-img-top" src="images/grape.jpg" alt="Grejpfrut">

                <div class="card-body">
                    <h5 class="card-title">Grejpfrut</h5>
                    <p class="card-text">Grejpfrut ili grejp (lat. Citrus × paradisi) je suptropska biljka,            koja je hibrid citrusa, a uzgaja se zbog ploda. Grejpfrut je zimzeleno drvo.
                        Cvetovi su beli, petočlani, a plod je hesperidijum. Zemlja porekla ove biljke je Barbados.</p>
                    <p class="card-text"><small class="text-muted">Na lageru</small></p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mt-4">
            <div class="card h-100">
                <img class="card-img-top" src="images/limon.jpg" alt="Limun">

                <div class="card-body">
                    <h5 class="card-title">Limun</h5>
                    <p class="card-text">Limun (lat. Citrus x limon) je drvo iz roda Citrus (porodica rutvice (Rutaceae))
                        i njegov plod. Rezultat je davnog ukrštanja po svoj prilici pomela i citrona, ali već
                        vekovima uspeva kao samostalno drvo koje se razmnožava reznicama ili kalemljenjem.</p>
                    <p class="card-text"><small class="text-muted">Za tri nedelje</small></p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mt-4">
            <div class="card h-100">
                <img class="card-img-top" src="images/kumkvat.jpg" alt="Kumkvat">

                <div class="card-body">
                    <h5 class="card-title">Kumkvat</h5>
                    <p class="card-text">Kumkvat (lat. Fortunella, Citrus japonica) je naziv za nekoliko
                        malih voćki citrusa (rod Citrus). Plod kumkvata, hesperidijum, podseća na pomorandžu,
                        ali je mnogo manji i tvrđi. Sličan je veličini veće maslinke.
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Nema trenutno na lageru</small></p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mt-4">
            <div class="card h-100">
                <img class="card-img-top" src="images/pomelo.jpg" alt="Pomelo">

                <div class="card-body">
                    <h5 class="card-title">Pomelo</h5>
                    <p class="card-text">Pomelo je neobičan član porodice južnih voćki, on je
                        pritom posebna vrsta, ne hibrid. Neki ga nazivaju tajlandskim ili kineskim grejpfrutom.
                        Pomelo vodi poreklo iz jugoistočne Azije.</p>
                    <p class="card-text"><small class="text-muted">Na lageru</small></p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mt-4">
            <div class="card h-100">
                <img class="card-img-top" src="images/lime.jpg" alt="Limeta">

                <div class="card-body">
                    <h5 class="card-title">Limeta</h5>
                    <p class="card-text">Limeta, u prodavnicama često i lajm (engl. lime), naziv je za nekoliko
                        hibrida citrusa (rod Citrus) kojima su zreli plodovi zelene boje.
                        Plod limete, hesperidijum, je manji od ploda limuna, a podjednako je bogat vitaminom C.</p>
                    <p class="card-text"><small class="text-muted">Na lageru sledeće nedelje</small></p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mt-4">
            <div class="card h-100">
                <img class="card-img-top" src="images/tangerine.jpg" alt="Tangerine">

                <div class="card-body">
                    <h5 class="card-title">Tangerine</h5>
                    <p class="card-text">Tangerine spada u grupu citrusnog voćanarandžaste boje
                        koja se sastoji od hibria manarine sa nekim doprinosom pomela.
                        Naziv je prvi put koriščćen za voće koje dolazi iz Tangera u Maroku,
                        opisano kao sorta mandarine</p>
                    <p class="card-text"><small class="text-muted">Na lageru</small></p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mt-4">
            <div class="card h-100">
                <img class="card-img-top" src="images/grapewhite.jpg" alt="Grejp beli">

                <div class="card-body">
                    <h5 class="card-title">Grejpfrut beli</h5>
                    <p class="card-text">Grejpfrut ili grejp (lat. Citrus × paradisi) je suptropska biljka,
                        koja je hibrid citrusa, a uzgaja se zbog ploda. Grejpfrut je zimzeleno drvo.
                        Cvetovi su beli, petočlani, a plod je hesperidijum. Zemlja porekla ove biljke je Barbados.</p>
                    <p class="card-text"><small class="text-muted">Na lageru</small></p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mt-4">
            <div class="card h-100">
                <img class="card-img-top" src="images/mandarine.jpg" alt="Mandarina">

                <div class="card-body">
                    <h5 class="card-title">Mandarina</h5>
                    <p class="card-text">Mandarina (lat. Citrus reticulata) je nisko drvo iz porodice rutvice
                        (Rutaceae), a pripada rodu citrusa. To je zimzelena biljka koja može da naraste do 3 metra.
                        Ima šire listove od ostalih citrusa. Cvetovi beli, petočlani, a plod hesperidijum. </p>
                    <p class="card-text"><small class="text-muted">Na lageru</small></p>
                </div>
            </div>
        </div>
Kraj komentara - sekcije sa Proizvodima-->

</div>
</div>
<div class="container mb-5">

    <div class="container text-left bg-primary text-white py-3 mb-3">
        <h2 class="display-5">Drugi o nama...</h2>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between">An item <span class="text-muted">2018</span></li>
        <li class="list-group-item d-flex justify-content-between">A second item <span
                class="text-muted">2019</span></li>
        <li class="list-group-item d-flex justify-content-between">A third item <span class="text-muted">2019</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">A fourth item <span
                class="text-muted">2020</span></li>
        <li class="list-group-item d-flex justify-content-between">And a fifth one <span
                class="text-muted">2021</span></li>
    </ul>
</div>

<div class="container mb-5">
    <div class="container text-left bg-dark text-white py-3 mb-3">
        <h2 class="display-5">Ostavite komentar</h2>
    </div>
    <form>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="email" class="form-control" id="name" >
        </div>
        <div class="form-group">
            <label for="mail">Email address</label>
            <input type="email" class="form-control" id="mail" placeholder="name@example.com">
        </div>

        <div class="form-group">
            <label for="comment">Komentar</label>
            <textarea class="form-control" id="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="container border pt-3 bg-secondary mb-3">
    <footer>
        <nav class="nav nav-pills nav-fill flex-column flex-sm-row">
            <a class="nav-item nav-link text-white" href="#">Home</a>
            <a class="nav-item nav-link text-white" href="#">About Us</a>
            <a class="nav-item nav-link text-white" href="#">Contact</a>
        </nav>
        <p class="py-2 text-center">Copyright Citrus&copy;</p>
    </footer>
</div>


<?php
// put your code here
?>
</body>
</html>
