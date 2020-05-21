<!DOCTYPE html>
<html lang="pl">
<head>
    <title>{$pageTitle}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<header>
    <div class="collapse bg-dark" id="navbarHeader">

    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong><?php echo htmlspecialchars($results['pageTitle']) ?></strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
<main class="container">
    <section class="jumbotron text-center">
        <div class="container">
            <h1>PHP MySQL</h1>
            <p class="lead text-muted">Prosty przykład strony wykonanej za pomocą PHP i MySQL</p>
        </div>
    </section>
