
<!DOCTYPE html>
<html>
<head>
    <link href="styleMenuAdmin.css" rel="stylesheet" type="text/css">
</head>
<body>

<header>
</header>

<!--MENU - Administrateur-->

<div class="container_page_totale"> <!--horizontale-->
    <div class="container_half_page"> <!--verticale1-->

        <!--AJOUT DES CARTES-->

        <div class="element_interne">
            <div class="element_title">
                <h1>AJOUT DES CARTES</h1>
            </div>
            <div class="element_body">
                <table class="table_menu">
                    <tbody>
                    <tr>
                        <td><button class="button">IMPORTER</button></td>
                        <td><button class="button">MODIFIER INFOS</button><br/><span class="red_color"><?php ?> carte(s) en attente</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!--GESTION DES PROMOS-->

        <div class="element_interne">
            <div class="element_title">
                <h1>GESTION DES PROMOTIONS</h1>
            </div>
            <div class="element_body">
                <table class="table_menu">
                    <tbody>
                        <tr>
                            <td><button class="button">AJOUTER PROMOS</button></td>
                            <td><button class="button">VOIR PROMOS EN COURS</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container_half_page"> <!--verticale2-->

        <!--GESTION DES PRIX-->

        <div class="element_interne">
            <div class="element_title">
                <h1>GESTION DES PRIX</h1>
            </div>
            <div class="element_body">
                <table class="table_menu">
                    <tbody>
                        <tr>
                            <td><button class="button">FIXER PRIX MINIMUM</button></td>
                            <td><button class="button">MODIFIER PRIX CARTE<br/>(Hors Promo)</button><br/><span class="red_color"><?php ?> carte(s) en attente</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!--MISE EN PRODUCTION-->

        <div class="element_interne">
            <div class="element_title">
                <h1>MISE EN PRODUCTION</h1>
            </div>
            <div class="element_body">
                <table class="table_menu">
                    <tbody>
                        <tr>
                            <td><button class="button">MISE EN PRODUCTION</button></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<footer>
</footer>
</body>
</html>
