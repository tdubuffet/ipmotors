<head>
    <meta charset="UTF-8" />
    <title>Installation - IPMotors</title>
    <link rel="icon" type="image/x-icon" href="/ipmotors/web/favicon.ico" />
    <link rel="stylesheet" href="/ipmotors/web/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/ipmotors/web/css/bootwatch.min.css" />
</head>
<body>
    <div class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">IPMotors Installation</a>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="well sponsor home-well">
                    <h1><a href="install.php?install=true"><span class="glyphicon glyphicon-list-alt"></span> Installer IPMotors</a></h1>
                </div>
            </div>
        </div>

        <?php
        ini_set('max_execution_time', 300);

        if (isset($_GET['install']) && $_GET['install'] == 'true') {

            echo '<div class="row">
                    <div class="alert alert-dismissable alert-success">
                    <h4>Installation</h4>';

            
            if (exec('php app/console doctrine:schema:update --force')) {
                echo '<p>Tables ajoutées dans la base de données</p>';
            }
            if (exec('php composer.phar self-update')) {
                echo '<p>Mise à jour de Composer réalisée avec succès</p>';
            }
            if (exec('php composer.phar update --no-dev')) {
                echo '<p>Installation des modules avec succès</p>';
            }
            if (exec('php app/console doctrine:fixtures:load --append')) {
                echo '<p>Données démo mises en place.</p>';
            }
            echo '</div>
        </div>';
        } else {
            
           echo '
               <div class="row">
                    <div class="alert alert-dismissable alert-warning">
                        <h4>Préconisations</h4>
                        <p><span class="badge">1</span> Avoir PHP 5.3. au minimum,</p>
                        <p><span class="badge">2</span> Avoir un serveur MySQL 5.0.,</p>
                        <p><span class="badge">3</span> Avoir un serveur Apache ou NginX,</p>
                        <p><span class="badge">4</span> Configurer la variable d\'environnement PHP,</p>
                        <p><span class="badge">5</span> Avoir <a href="https://getcomposer.org/" target="_blank">Composer</a> sur le serveur,</p>
                        <p><span class="badge">5</span> Configurer le fichier parameters.yml</p>
                    </div>
                </div>' ;
        }
        ?>
    </div>
