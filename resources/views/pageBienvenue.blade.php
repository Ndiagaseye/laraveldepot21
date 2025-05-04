<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de bienvenue</title>
    <style>
        /* Styles globaux */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: rgb(11, 1, 1);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            text-align: center;
        }

        /* Image de fond floue */
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('img/nat.jpeg') center/cover no-repeat;
            filter: blur(8px);
            z-index: -1;
        }

        /* Conteneur principal */
        .container {
            position: relative;
            max-width: 900px;
            padding: 20px;
        }

        h1 {
            font-size: 32px;
            font-weight: bold;
            white-space: nowrap; /* Empêche le retour à la ligne */
            overflow: hidden;
        }

        p {
            font-size: 18px;
            margin: 15px 0;
            line-height: 1.5;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Image de fond floue -->
    <div class="background"></div>

    <!-- Contenu centré -->
    <div class="container">
        <h1>Dalal akk diam si sioniou xaralé bi nio diaglel NATT KAT YI</h1>
        <p>
            Notre application vous permet de mieux gérer vos tontines de manière plus efficace et plus professionnelle.<br>
            Rejoignez-nous pour une meilleure gestion de vos tontines !
        </p>
        <form action="{{ route('connexion.conexion') }}" method="GET">
            <button type="submit">En savoir plus</button>
        </form>
    </div>

</body>
</html>
