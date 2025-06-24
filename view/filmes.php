<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes Populares</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Filmes Populares</h1>
    <div id="filmes-container">
        <?php if (!empty($filmes)): ?>
            <?php foreach ($filmes as $filme): ?>
                <div class="filme">
                    <h2><?php echo htmlspecialchars($filme['titulo']); ?></h2>
                    <img src="<?php echo htmlspecialchars($filme['poster']); ?>" alt="<?php echo htmlspecialchars($filme['titulo']); ?>">
                    <p><?php echo htmlspecialchars($filme['descricao']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum filme encontrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>